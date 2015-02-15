<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Activity_M extends MY_Model
{
	
	protected $_table_name = 'activity';
	protected $_order_by = 'activity_id';
	protected $_primary_key = 'activity_id';
	public $data_status = FALSE;
	public $fields = array();

	function __construct() {
		parent::__construct();
	}

	function get_activity($status = false, $role_id = false, $activity_id = false, $count = false){
		$method = 'result_array';
		if($status){
			$this->db->where('status', $status);
			if($status == UNAUTHORISED_DATA){
				$this->db->where('created_by !=', $this->user_m->user_id);
			}else{
				$this->db->where('created_by', $this->user_m->user_id);
			}
		}
		if($role_id){
			$this->db->where('role_id', $role_id);
		}
		if($activity_id){
			$this->db->where('activity_id', $activity_id);
			$method = 'row_array';
		}
		if($count){
			$this->db->limit($count);
		}
		$this->db->order_by('modified desc');
		return $this->db->get($this->_table_name)->$method();
	}

	function reject($activity_id, $comment){
		$data['status'] = REJECTED_DATA;
		$data['comment'] = $comment;
		$data['rejected'] = $this->GT();
		$data['rejected_by'] = $this->user_m->user_id;
		$msg = 'Rejected Activity -- <strong>'.$this->tb_value(array('activity_id'=>$activity_id), 'activity', 'message').'</strong>';
		$this->user_m->grab_trail_message($msg);
		$this->save($data, $activity_id);
	}
}