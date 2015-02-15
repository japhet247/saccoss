<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Vault_card_M extends MY_Model
{
	protected $_table_name = 'vault_cards';
	protected $_order_by = 'created desc';
	protected $_primary_key = 'card_id';
	public $fields = array('user_id', 'card_no', 'account_no');
	protected $unique_keys = array('user_id', 'card_no' , 'account_no');

	function __construct() {
		parent::__construct();
	}

	function create(){
		$this->load->model('activity_m');
		$this->db->trans_start();
		//save pos
		$posted = $this->get_posts();
		$posted['vault_code'] = time();
		$card_id = $this->save($posted);
		$msg = '<strong>'.$this->user_m->full_name.'</strong> added a new Vault Card <strong>'.$posted['card_no'].'</strong>';	
		
		if($this->user_m->role_id == SADMIN){
			$this->authorize($card_id); 
		}else{
			//log activity for notification
			$activity['message'] = $msg; 
			$activity['tb_name'] = $this->_table_name;
			$activity['activity_key'] = ACTIVITY_ADD;
			$activity['uri'] = 'cards/view';
			$activity['content_id'] = $card_id;
			$activity['role_id'] = $this->user_m->role_id;
			$this->activity_m->save($activity);
		}
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return $card_id;
	}

	function get_cards(){
		$this->db->from($this->_table_name);
		$this->db->join('user', 'user.user_id = '.$this->_table_name.'.user_id');
		$this->db->where($this->_table_name.'.status', ACTIVE_DATA);
		return $this->db->get()->result_array();
	}

	

}