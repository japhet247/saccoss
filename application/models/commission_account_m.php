<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Commission_account_M extends MY_Model
{
	protected $_table_name = 'commission_accounts';
	protected $_order_by = 'created desc';
	protected $_primary_key = 'commission_id';
	public $fields = array('sortcode', 'account_no');

	function __construct() {
		parent::__construct();
	}

	function create(){
		$this->load->model('activity_m');
		$this->db->trans_start();
		//save pos
		$posted = $this->get_posts();
		$posted['account_code'] = time();
		$commission_id = $this->save($posted);
		$msg = '<strong>'.$this->user_m->full_name.'</strong> added a new Commission Account <strong>'.$posted['account_no'].'</strong> for branch <strong>'.$this->tb_value(array('sortcode'=>$posted['sortcode']), 'branch', 'branch_name').'</strong>';	
		
		if($this->user_m->role_id == SADMIN){
			$this->authorize($commission_id); 
		}else{
			//log activity for notification
			$activity['message'] = $msg; 
			$activity['tb_name'] = $this->_table_name;
			$activity['activity_key'] = COMMISSION_ACC_ADD;
			$activity['uri'] = 'activity/pending';
			$activity['content_id'] = $commission_id;
			$activity['role_id'] = $this->user_m->role_id;
			$this->activity_m->save($activity);
		}
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return $commission_id;
	}

	function get_accounts(){
		$this->db->from($this->_table_name);
		$this->db->join('branch', 'branch.sortcode = '.$this->_table_name.'.sortcode');
		$this->db->where($this->_table_name.'.status', ACTIVE_DATA);
		return $this->db->get()->result_array();
	}

	

}