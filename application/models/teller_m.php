<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teller_M extends MY_Model
{
	protected $_table_name = 'pos_teller';
	protected $_order_by = 'created desc';
	protected $_primary_key = 'teller_id';
	public $fields = array('full_name', 'email', 'mobile', 'address', 'teller_account', 'card_no' , 'municipal_id');
	protected $unique_keys = array('teller_account', 'card_no' , 'municipal_id');

	function __construct() {
		parent::__construct();
	}

	function create(){
		$this->load->model('activity_m');
		$this->db->trans_start();
		//save pos
		$posted = $this->get_posts();
		$posted['teller_code'] = time();
		$teller_id = $this->save($posted);
		$msg = '<strong>'.$this->user_m->full_name.'</strong> added a new POS Teller <strong>'.$posted['full_name'].'</strong>';	
		
		if($this->user_m->role_id == SADMIN){
			$this->authorize($teller_id); 
		}else{
			//log activity for notification
			$activity['message'] = $msg; 
			$activity['tb_name'] = $this->_table_name;
			$activity['activity_key'] = ACTIVITY_ADD;
			$activity['uri'] = 'teller/view';
			$activity['content_id'] = $teller_id;
			$activity['role_id'] = $this->user_m->role_id;
			$this->activity_m->save($activity);
		}
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return $teller_id;
	}

	function edit($teller_id){
		$this->load->model('activity_m');
		$this->load->model('edited_m');

		$posted = $this->get_posts();
		//get edited values for message logging
		$edited_teller = $this->get_edited($teller_id, $posted);
		if(($edited_teller)){
			$this->db->trans_start();
				$this->data_status = FALSE;
				$saved_teller = $this->get($teller_id, TRUE);
				$duplicate = false;
				//save activity first
				//create activity message
				$msg = '<strong>'.$this->user_m->full_name.'</strong> Edited POS Teller <strong>'.$saved_teller['full_name']. '</strong> - ';
				foreach($edited_teller as $key => $edited){
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

				foreach ($edited_teller as $key => $value) {
					if(in_array($key, $this->unique_keys)) $duplicate = true;
				}
				
				if($this->user_m->role_id == SADMIN){

					if($duplicate){
						$this->delete($teller_id);
						$posted['teller_code'] = $saved_teller['teller_code'];
						$teller_id  = $this->save($posted);
						$this->authorize($teller_id);
						$this->db->where('teller_account', $saved_teller['teller_account']);
						$this->db->update('teller_assignment', array('teller_account'=>$posted['teller_account']));
					}else{
						$this->save($posted, $teller_id);
					}

				}else{

					$activity['message'] = $msg; 
					$activity['tb_name'] = 'pos';
					$activity['activity_key'] = ACTIVITY_EDIT;
					$activity['uri'] = 'teller/view';
					$activity['content_id'] = $teller_id;
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
						$additionals = array('created_by'=>$this->user_m->user_id, 'status' => UNAUTHORISED_DATA, 'modified'=>$this->GT(), 'created'=>$this->GT(), 'duplicate'=>TRUE);
						foreach ($additionals as $key => $value) {
							$data['tb_column'] = $key;
							$data['tb_value'] = $value;
							$data['created_by'] = $this->user_m->user_id;
							$data['activity_id'] = $activity_id;
							$this->edited_m->save($data);
						}
					}
					
				}
			$this->db->trans_complete();
			$this->user_m->grab_trail_message($msg);
		}
	}

	function committ($teller_id, $activity_id){
    	$this->load->model('activity_m');
    	$this->load->model('edited_m');
    	$formatted = $this->get_posted_from_activity($activity_id);
    	if(empty($formatted)) return false;
    	$data['status'] = ACTIVE_DATA;
		$data['authorised_by'] = $this->user_m->user_id;
		$data['authorised'] = $this->GT();
		$unauthorised = $this->is_unauthorised($teller_id);
    	$this->db->trans_start();
    		(!$unauthorised) || $this->authorize($teller_id);
			if(isset($formatted['duplicate'])){
				$saved_teller = $this->get($teller_id, TRUE);
				$this->dual_control = false;
				$this->_timestamps = false;
				$this->delete($teller_id);
				unset($formatted['duplicate']);
				$formatted['teller_code'] = $saved_teller['teller_code'];
				$teller_id  = $this->save($formatted);
				$this->authorize($teller_id);
				$this->db->where('teller_account', $saved_teller['teller_account']);
				$this->db->update('teller_assignment', array('teller_account'=>$formatted['teller_account']));
			}else{
				unset($formatted['duplicate']);
				$this->save($formatted, $teller_id);
			}
			$msg = 'Authorized Activity -- <strong>'.$this->tb_value(array('activity_id'=>$activity_id), 'activity', 'message').'</strong>';
			$this->activity_m->save($data, $activity_id);
			$this->edited_m->delete(false, false, array('activity_id' => $activity_id));
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return true;
    }

    function get_posted_from_activity($activity_id){
    	$this->fields = array_merge($this->fields, array('created_by', 'created', 'modified', 'status', 'duplicate'));
    	return parent::get_posted_from_activity($activity_id);
    }

	function get_tellers($teller_id=false, $authorised=true, $where = false){
		$method = 'result_array';
		if($teller_id){
			$this->db->where('teller_id', $teller_id);
			$method = 'row_array';
		}
		if($authorised){
			$this->db->where($this->_table_name.'.status', ACTIVE_DATA);
		}
		if($where){
			$this->db->where($where);
		}
		$this->db->join('municipal', $this->_table_name.'.municipal_id = municipal.municipal_id');
		$this->db->select($this->_table_name.'.*, municipal_name');
		return $this->db->get($this->_table_name)->$method();
	}
}