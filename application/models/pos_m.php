<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pos_M extends MY_Model
{
	protected $_table_name = 'pos';
	protected $_order_by = 'created desc';
	protected $_primary_key = 'pos_id';
	public $fields = array('pos_name', 'device_imei', 'serial_no', 'municipal_id', 'property_ids');
	protected $unique_keys = array('device_imei', 'serial_no', 'municipal_id');

	function __construct() {
		parent::__construct();
	}

	function create_pos(){
		$this->load->model('activity_m');
		$this->load->model('pos_assignment_m', 'functions_m');
		$this->db->trans_start();
		//save pos
		$posted = $this->get_posts();
		$property_ids = $posted['property_ids'];
		unset($posted['property_ids']);
		unset($this->fields[5]);
		$pos_id = $this->save($posted);
		foreach($property_ids as $p){
			$map['property_id'] = $p;
			$map['pos_id'] = $pos_id;
			$map['device_imei'] = $posted['device_imei'];
			$this->functions_m->save($map);
		}
		$msg = '<strong>'.$this->user_m->full_name.'</strong> added a new POS <strong>'.$posted['pos_name'].'</strong>';	
		
		if($this->user_m->role_id == SADMIN){
			$this->authorize($pos_id); 
		}else{
			//log activity for notification
			$activity['message'] = $msg; 
			$activity['tb_name'] = 'pos';
			$activity['activity_key'] = ACTIVITY_ADD;
			$activity['uri'] = 'pos/view';
			$activity['content_id'] = $pos_id;
			$activity['role_id'] = $this->user_m->role_id;
			$this->activity_m->save($activity);
		}
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return $pos_id;
		
	}

	function edit($pos_id){
		$this->load->model('activity_m');
		$this->load->model('edited_m');
		$this->load->model('pos_assignment_m', 'functions_m');

		$posted = $this->get_posts();
		$property_ids = $posted['property_ids'];
		unset($posted['property_ids']);
		unset($this->fields[4]);
		//get edited values for message logging
		$edited_pos = $this->get_edited($pos_id, $posted);
		$edited_properties = $this->functions_m->get_edited($pos_id, $property_ids);
		if(($edited_pos) || ($edited_properties)){
			$this->db->trans_start();
				$this->data_status = FALSE;
				$saved_pos = $this->get($pos_id, TRUE);
				$duplicate = false;
				//save activity first
				//create activity message
				$msg = '<strong>'.$this->user_m->full_name.'</strong> Edited POS <strong>'.$saved_pos['pos_name']. '</strong> - ';
				if($edited_pos){
					foreach($edited_pos as $key => $edited){
						$msg .= ' ['.$this->lang->line($key). '] ';
						if($key == 'municipal_id'){
							foreach ($edited as $k => $v) {
								$msg .= $k. ' <strong>' .$this->tb_value(array('municipal_id' => $v), 'municipal', 'municipal_name'). '</strong> '; 
							}
						}else{
							foreach ($edited as $k => $v) {
								$msg .= $k. ' <strong>' .$v. '</strong> '; 
							}
						}
					}

					foreach ($edited_pos as $key => $value) {
						if(in_array($key, $this->unique_keys)) $duplicate = true;
					}
				}

				if($edited_properties){
					if($edited_properties['added']){ 
						$msg .= ' Added '.count($edited_properties['added']) .' new Functions: <strong>';
						foreach($edited_properties['added'] as $added){
							$msg .= $this->tb_value(array('property_id' => $added), 'pos_properties', 'property_value').', ';
						}
						$msg .= '</strong>';
					}
					if($edited_properties['removed']){ 
						$msg .= ' Removed '.count($edited_properties['removed']) .' Functions: <strong>';
						foreach($edited_properties['removed'] as $removed){
							$msg .= $this->tb_value(array('property_id' => $removed), 'pos_properties', 'property_value').', ';
						}
						$msg .= '</strong>';
					}
				}
				
				if($this->user_m->role_id == SADMIN){

					$this->functions_m->delete(false, false, array('pos_id' => $pos_id));

					if($duplicate){
						$old_id = $pos_id;
						$this->delete($pos_id);
						$pos_id  = $this->save($posted);
						$this->authorize($pos_id);
						$this->db->where('pos_id', $old_id);
						$this->db->update('teller_assignment', array('pos_id'=>$pos_id));
					}else{
						$this->save($posted, $pos_id);
					}

					foreach($property_ids as $p){
						$map['property_id'] = $p;
						$map['pos_id'] = $pos_id;
						$map['device_imei'] = $posted['device_imei'];
						$this->functions_m->save($map);
					}
					$this->functions_m->authorize($pos_id);

				}else{

					$activity['message'] = $msg; 
					$activity['tb_name'] = 'pos';
					$activity['activity_key'] = ACTIVITY_EDIT;
					$activity['uri'] = 'pos/view';
					$activity['content_id'] = $pos_id;
					$activity['role_id'] = $this->user_m->role_id;
					$activity_id = $this->activity_m->save($activity);

					foreach ($posted as $key => $value) {
						$data['tb_column'] = $key;
						$data['tb_value'] = $value;
						$data['created_by'] = $this->user_m->user_id;
						$data['activity_id'] = $activity_id;
						$this->edited_m->save($data);
					}
					if($duplicate){
						$additionals = array('created_by'=>$this->user_m->user_id,'data_status'=>UNAUTHORISED_DATA, 'status' => UNAUTHORISED_DATA, 'modified'=>$this->GT(), 'created'=>$this->GT(), 'duplicate'=>TRUE);
						foreach ($additionals as $key => $value) {
							$data['tb_column'] = $key;
							$data['tb_value'] = $value;
							$data['created_by'] = $this->user_m->user_id;
							$data['activity_id'] = $activity_id;
							$this->edited_m->save($data);
						}
					}
					
					foreach ($property_ids as $p) {
						$data['tb_column'] = 'property_id';
						$data['tb_value'] = $p;
						$data['created_by'] = $this->user_m->user_id;
						$data['activity_id'] = $activity_id;
						$this->edited_m->save($data);
					}
					
				}
			$this->db->trans_complete();
			$this->user_m->grab_trail_message($msg);
		}
	}

	public function get($id = NULL, $single = FALSE){

		if($this->data_status){
			$this->db->where('data_status', ACTIVE_DATA);
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

	public function authorize($id, $activity_id = false){
		$this->load->model('pos_assignment_m', 'functions_m');
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
		$data['status'] = ACTIVE_POS;
		$data['data_status'] = ACTIVE_DATA;
		$id = $this->save($data, $id);
		$this->functions_m->authorize($id);
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
                $this->db->update($this->_table_name, array('status' => INACTIVE_POS, 'data_status' => INACTIVE_DATA));
            }else{
	           $this->save(array('status' => INACTIVE_POS, 'data_status' => INACTIVE_DATA),$id);
            }   
	   }else{
            ($where) ? $this->db->where($where) : $this->db->where($this->_primary_key, $id);
			//$this->db->limit(1);
			$this->db->delete($this->_table_name);
        }
	}

	function get_posted_from_activity($activity_id){
    	$this->load->model('edited_m');
    	$edited = $this->edited_m->get_by(array('activity_id' => $activity_id));
    	unset($this->fields[5]);
    	$fields = array_merge($this->fields, array('created_by', 'created', 'modified', 'status', 'data_status', 'duplicate'));
    	$pos = array();
    	foreach($fields as $field){
    		foreach($edited as $e){
    			if($field == $e['tb_column']) $pos[$field] = $e['tb_value'];
    		}
    	}
    	$property_ids = array();
    	foreach($edited as $e){
    		if($e['tb_column'] == 'property_id') $property_ids[] = $e['tb_value'];
    	}
    	return array('pos' => $pos, 'property_ids' => $property_ids);
    }

    function committ($pos_id, $activity_id){
    	$this->load->model('activity_m');
    	$this->load->model('edited_m');
    	$this->load->model('pos_assignment_m', 'functions_m');
    	unset($this->fields[5]);
    	$formatted = $this->get_posted_from_activity($activity_id);
    	if(empty($formatted)) return false;
    	$data['status'] = ACTIVE_DATA;
		$data['authorised_by'] = $this->user_m->user_id;
		$data['authorised'] = $this->GT();
		$unauthorised = $this->is_unauthorised($pos_id);
    	$this->db->trans_start();
	    	(!$unauthorised) || $this->authorize($pos_id);	
			$this->functions_m->delete(false, false, array('pos_id' => $pos_id));

			if(isset($formatted['pos']['duplicate'])){
				$old_id = $pos_id;
				$this->dual_control = false;
				$this->_timestamps = false;
				$this->delete($pos_id);
				unset($formatted['pos']['duplicate']);
				$pos_id  = $this->save($formatted['pos']);
				$this->authorize($pos_id);
				$this->db->where('pos_id', $old_id);
				$this->db->update('teller_assignment', array('pos_id'=>$pos_id));
			}else{
				unset($formatted['pos']['duplicate']);
				$this->save($formatted['pos'], $pos_id);
			}

			foreach($formatted['property_ids'] as $p){
				$map['property_id'] = $p;
				$map['pos_id'] = $pos_id;
				$map['device_imei'] = $formatted['pos']['device_imei'];
				$this->functions_m->save($map);
			}
			$this->functions_m->authorize($pos_id);
			$msg = 'Authorized Activity -- <strong>'.$this->tb_value(array('activity_id'=>$activity_id), 'activity', 'message').'</strong>';
			$this->activity_m->save($data, $activity_id);
			$this->edited_m->delete(false, false, array('activity_id' => $activity_id));
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return true;
    }

    function is_unauthorised($id){
		$this->data_status = false;
		$result = $this->get($id, TRUE);
		return (!empty($result) && ($result['data_status'] == UNAUTHORISED_DATA)) ? true : false;
	}

}