<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Referal_M extends MY_Model
{
	
	protected $_table_name = 'referals';
	protected $_order_by = 'created desc';
	protected $_primary_key = 'referal_id';
	public $data_status = FALSE;
	protected $_timestamps = FALSE;
	public $fields = array();

	function __construct() {
		parent::__construct();
	}

	function get_referals($status = false, $referal_id = false, $limit = false){
		$method = 'result_array';
		if($status){
			$this->db->where('status', $status);
		}
		if($referal_id){
			$method = 'row_array';
			$this->db->where('referal_id', $referal_id);
		}
		if($this->user_m->role_id != SADMIN){
			$this->db->where('municipal_id', $this->user_m->municipal_id);
		}
		if($limit){
			$this->db->limit($limit);
		}
		$this->db->order_by($this->_order_by);
		return $this->db->get($this->_table_name)->$method();
	}

	function reject($referal_id, $comment){
		$data['status'] = REJECTED_REFERAL;
		$data['rejection_comment'] = $comment;
		$data['rejected'] = $this->GT();
		$data['rejected_by'] = $this->user_m->user_id;
		$referal = $this->get_referals(false, $referal_id);
		$msg = 'Rejected Referal <strong>'.$referal['narration'].'</strong> Credit Acc - <strong>'.$referal['credit_account'].'</strong>
		Debit Acc - <strong>'.$referal['debit_account'].'</strong> Amount - <strong>'.$referal['amount'].'</strong> Requested By - <strong>'.$referal['teller_name'].'</strong>';
		$this->user_m->grab_trail_message($msg);
		return $this->save($data, $referal_id);
	}

	function authorize($referal_id){
		$data['status'] = COMPLETED_REFERAL;
		$data['authorised'] = $this->GT();
		$data['authorised_by'] = $this->user_m->user_id;
		$referal = $this->get_referals(false, $referal_id);
		$msg = 'Authorized Referal <strong>'.$referal['narration'].'</strong> Credit Acc - <strong>'.$referal['credit_account'].'</strong>
		Debit Acc - <strong>'.$referal['debit_account'].'</strong> Amount - <strong>'.$referal['amount'].'</strong> Requested By - <strong>'.$referal['teller_name'].'</strong>';
		$this->user_m->grab_trail_message($msg);
		return $this->save($data, $referal_id);
	}

}