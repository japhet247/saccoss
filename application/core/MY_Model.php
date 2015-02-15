<?php

class MY_Model extends CI_Model {
	
	protected $_table_name = '';
	protected $_primary_key = 'id';
	protected $_order_by = '';
	public $rules = array();
	protected $_timestamps = TRUE;
	protected $fields;
	public $data_status = TRUE;
	protected $dual_control = TRUE;
	protected $generate_id = TRUE;
    public $filters;

	function __construct() {
		parent::__construct();
	}
	
	public function get($id = NULL, $single = FALSE){

		if($this->data_status){
			$this->db->where('status', ACTIVE_DATA);
		}

		if ($id != NULL) {
			$this->db->where($this->_primary_key, $id);
			$method = 'row_array';
		}
		elseif($single == TRUE) {
			$method = 'row_array';
		}
		else {
			$method = 'result_array';
		}
		
		if (!count($this->db->ar_orderby)) {
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->_table_name)->$method();
	}
	
	public function get_by($where, $single = FALSE){
		$this->db->where($where);
		return $this->get(NULL, $single);
	}
	
	public function save($data, $id = NULL){
		
		// Set additional data before posting
		if ($this->_timestamps == TRUE) {
			$now = date('Y-m-d H:i:s');
			$id || $data['created'] = $now;
			$data['modified'] = $now;
		}
		// Insert
		if ($id === NULL) {
			if($this->dual_control) {
				$data['created_by'] = $this->user_m->user_id;
				$data['status'] = UNAUTHORISED_DATA;
			}
			if($this->generate_id) $data[$this->_primary_key] = $this->generate_id() ;
			$this->db->set($data);
			$this->db->insert($this->_table_name);
			$id = ($this->generate_id) ? $data[$this->_primary_key] : $this->db->insert_id();
		}
		// Update
		else {
			$this->db->set($data);
			$this->db->where($this->_primary_key, $id);
			$this->db->update($this->_table_name);
		}
		
		return $id;
	}

	public function authorize($id, $activity_id = false){
		$data['status'] = ACTIVE_DATA;
		$data['authorised_by'] = $this->user_m->user_id;
		$data['authorised'] = $this->GT();
		$this->db->trans_start();
		if($activity_id){
            $msg = 'Authorized Activity -- <strong>'.$this->tb_value(array('activity_id'=>$activity_id), 'activity', 'message').'</strong>';
			$this->db->where('activity_id', $activity_id);
			$this->db->update('activity', $data);
            $this->user_m->grab_trail_message($msg);
		}

		$id = $this->save($data, $id);
		$this->db->trans_complete();
		return $id;
	}


	public function delete($id, $soft=TRUE, $where=FALSE){
	   if ((!$id) && (!$where)) {
			return FALSE;
		}

	   if($soft){
            if($where){
                $this->db->where($where);
                $this->db->update($this->_table_name, array('status' => INACTIVE_DATA));
            }else{
	           $this->save(array('status' => INACTIVE_DATA),$id);
            }   
	   }else{
            ($where) ? $this->db->where($where) : $this->db->where($this->_primary_key, $id);
			//$this->db->limit(1);
			$this->db->delete($this->_table_name);
        }
        return $id;
	}

    function get_posts($filters = false){

    	$fields = ($filters) ? $this->filter_fields : $this->fields;
        $data =array();
        foreach($fields as $field){
            if($this->input->post($field)){
                $data[$field] =$this->input->post($field);
            }
        }
        return $data;
    }
    
    function set_errors(){
    	$fields = array_reverse($this->fields);
        $this->form_validation->set_error_delimiters('<div class="alert alert-danger">
                                                    <button type="button" class="close" style="margin-top:-5px" data-dismiss="alert"><span style="font-size:14px">x</span></button>',
            '</div>');
            $error = "";
        foreach($fields as $field){
            if(form_error($field) != ''){
                $error = form_error($field);
            }   
        }
        return $error;
    }
    
    function GT(){
        return date('Y-m-d H:i:s');
    }
    
    /** Functions for Generating IDs **/
    
    function get_random_chars($chars=10){
         $letters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
         return substr(str_shuffle($letters), 0, $chars);
    }
    
    function generate_id($user=false){

        $random_no = mt_rand();
        $date = new DateTime();
        $timestamp = $date->getTimestamp();
        
        if($user){
           return $this->get_random_chars().$random_no.sha1($timestamp); 
        }
        return $random_no.sha1($timestamp);
        
    }

    /** End of ID generators **/

    function get_edited($id, $posted){
    	if($id){
    		$this->data_status = FALSE;
            $current = $this->get($id, TRUE);
            $fields = $this->fields;
            $data = array();
            foreach($fields as $field){
                if($current[$field] <> $posted[$field]){
                    $data[$field] = array('from'=>$current[$field], 'To'=>$posted[$field]);
                }
            }
            return (empty($data)) ? false : $data;
        }else{
            return false;
        }
    }
    
    function prepare_edited($id, $activity_id){
    	$formatted = $this->get_posted_from_activity($activity_id);
    	$changes = array();
    	$prepared = $this->get_edited($id, $formatted);
    	foreach ($prepared as $key => $value) {
    		foreach($value as $k => $v){
    			if($k == 'To') $changes[$key] = $v;
    		}
    	}
    	return $changes;
    }

    function get_posted_from_activity($activity_id){
    	$edited = $this->db->get_where('edited', array('activity_id' => $activity_id))->result_array();
    	$fields = $this->fields;
    	$formatted = array();
    	foreach($fields as $field){
    		foreach($edited as $e){
    			if($field == $e['tb_column']) $formatted[$field] = $e['tb_value'];
    		}
    	}
    	return $formatted;
    }

    function get_value($id, $attr){
    	$result = $this->get($id, TRUE);
    	return ($result) ? $result[$attr] : FALSE;
    }

    function committ($id, $activity_id){
    	$this->load->model('activity_m');
    	$this->load->model('edited_m');
    	$posted = $this->get_posted_from_activity($activity_id);
    	$data['status'] = ACTIVE_DATA;
		$data['authorised_by'] = $this->user_m->user_id;
		$data['authorised'] = $this->GT();
    	$this->db->trans_start();
    		$result = $this->save($posted, $id);
    		$this->activity_m->save($data, $activity_id);
            $msg = 'Authorized Activity -- <strong>'.$this->tb_value(array('activity_id'=>$activity_id), 'activity', 'message').'</strong>';
    		$this->edited_m->delete(false, false, array('activity_id' => $activity_id));
    	$this->db->trans_complete();
        $this->user_m->grab_trail_message($msg);
    	return true;
    }

    function get_new(){
    	$fields = $this->fields;
    	$temp = array();
    	foreach ($fields as $field) {
    		$temp[$field] = '';
    	}
    	return $temp;
    }

    function get_form_options($option_id=false, $option_group=false, $description=false){
    	if($option_group){
    		$this->db->where('option_group', $option_group);
    		$method = 'result_array';
    	}
    	if($description){
    		$this->db->where('description', $description);
    		$method = 'row_array';
    	}
    	if($option_id){
    		$this->db->where('option_id', $option_id);
    		$method = 'row_array';
    	}

    	return $this->db->get('form_options')->$method();
    }

    public function custom_msg($msg="No information",$class="success"){
        return '<div class="alert alert-'.$class.'"> <button type="button" class="close" data-dismiss="alert">x</button> '.$msg.'</div>';
    }

    function tb_value($id, $table, $attr){
        $this->db->where($id);
        $result = $this->db->get($table)->row_array();
        return ($result) ? $result[$attr] : FALSE;
    }

    function get_branches($sortcode=false){
        $this->db->order_by('branch_name');
        if($sortcode){
            $this->db->where('sortcode', $sortcode);
            $result = $this->db->get('branch')->row_array();
            return ($result) ? $result['branch_name'] : FALSE;
        }
        return $this->db->get('branch')->result_array();
    }

    function filter_data($filters){
        if($filters['s_date_r'] == ''){
            $filters['s_date_r'] = date('Y-m-d', strtotime('first day of this month'));
        }
        if($filters['e_date_r'] == ''){
            $filters['e_date_r'] = date('Y-m-d', strtotime('last day of this month'));
        }
        foreach ($filters as $key => $value) {
            if($key == 's_date_r'){
                $this->db->where($this->_table_name.'.created >=', $value);
            }elseif($key == 'e_date_r'){
                $this->db->where($this->_table_name.'.created <=', $value);
            }elseif($value != 'all'){
                $this->db->where($this->_table_name.'.'.$key, $value);
            }
        }
    }

    function set_report_title($filtered=false){
        $report_name = $this->report_name;
        if($filtered){
            $filters = $this->get_posts(true);
            
            foreach ($filters as $key => $value) {
               if($key == 's_date_r'){
                   $report_name .= ' from '.$this->to_grn($value); 
               }elseif($key == 'e_date_r'){
                    $report_name .= ' to '.$this->to_grn($value);
               }elseif($value != 'all'){
                    $report_name .= ' - '.strtoupper($this->lang->line($key)). ' : ';
                    $report_name .= $this->to_grn($this->get_report_id_value($key, $value));
               }
            }
            return $report_name;  
        }
        return $report_name.' as of '.$this->to_grn(date('Y-m-d'));
    }

    function to_grn($element){
        return '<span style="color:green;">'.$element.'</span>';
    }

    function get_report_id_value($field, $value){
        switch ($field) {
            case 'municipal_id':
                return $this->tb_value(array('municipal_id'=>$value), 'municipal', 'municipal_name');
                break;
            case 'role_id':
                return $this->tb_value(array('role_id'=>$value), 'user_role', 'name');
                break;
            default:
                return $value;
                break;
        }
    }

    function is_unauthorised($id){
        $this->data_status = false;
        $result = $this->get($id, TRUE);
        return (!empty($result) && ($result['status'] == UNAUTHORISED_DATA)) ? true : false;
    }

    function save_trail($msg){
        $data['message'] = $msg;
        $data['ip'] = get_client_ip();
        $data['registered'] = $this->GT();
        $data['user_id'] = $this->user_m->user_id;
        $this->db->insert('audit_trail', $data);
    }
      
}