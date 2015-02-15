<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions_M extends MY_Model
{
	public $_table_name = 'transc_inquiries';
	protected $_primary_key = 'transc_id';
	protected $_order_by = 'reg_date desc';
	protected $normal_bills = array('DAWASCO', 'LUKU');
	private $normal_ft_fields = array('narration', 'debit_account', 'credit_account', 'amount', 'reg_date', 'pos_imei', 'municipal_name', 'status_description', 'txnID', 'reference_id');
	private $normal_bills_fields = array('narration', 'debit_account', 'customer_account', 'amount', 'reg_date', 'pos_imei', 'municipal_name', 'status_description', 'txnID', 'reference_id');
	public $data_status = FALSE;
	protected $fields = array();

	function __construct(){
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
		if($this->user_m->role_id != SADMIN){
			$this->db->where($this->_table_name.'.municipal_id', $this->user_m->municipal_id);
		}
		
		if (!count($this->db->ar_orderby)) {
			$this->db->order_by($this->_order_by);
		}
		return $this->db->get($this->_table_name)->$method();
	}

	function ft($archived=false){
		$table = ($archived) ? 'archived_transfer' : 'transc_transfer';
		$this->db->from($table);
		$this->db->join('municipal', 'municipal.municipal_id ='.$table.'.municipal_id');
		if($this->user_m->role_id != SADMIN){
			$this->db->where('municipal.municipal_id', $this->user_m->municipal_id);
		}
		$this->db->order_by($this->_order_by);
		return $this->db->get()->result_array();
	}

	function bills($archived=false){
		$table = ($archived) ? 'archived_bills' : 'transc_bills';
		$this->db->from($table);
		$this->db->join('municipal', 'municipal.municipal_id ='.$table.'.municipal_id');
		if($this->user_m->role_id != SADMIN){
			$this->db->where('municipal.municipal_id', $this->user_m->municipal_id);
		}
		$this->db->order_by($this->_order_by);
		return $this->db->get()->result_array();
	}

	function get_details($narration, $transc_id, $table = 'transc_transfer'){
		$this->set_fields($table);
		switch ($narration) {
			case SBTIS:
					$this->db->select(array('swift_code', 'amount', 'owner_account', 'owner_name', 'beneficiary_account', 'beneficiary_name', 'remittance', 'charge_details', 'file_status', 'file_name'));
					$this->db->where('transc_id', $transc_id);
					return $this->db->get('transc_tiss')->row_array();
				break;
			
			default:
					$this->db->select($this->fields);
					$this->db->from($table);
					$this->db->join('municipal', 'municipal.municipal_id = '.$table.'.municipal_id');
					$this->db->where('transc_id', $transc_id);
					return $this->db->get()->row_array();
				break;
		}
	}

	function set_fields($table){
		switch ($table) {
			case 'transc_bills':
				$this->fields = $this->normal_bills_fields;
				break;
			case 'archived_bills':
				$this->fields = $this->normal_bills_fields;
				break;
			case 'archived_transfer':
				$this->fields = $this->normal_ft_fields;
				break;
			default:
				$this->fields = $this->normal_ft_fields;
				break;
		}
	}
	
}