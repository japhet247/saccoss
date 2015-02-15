<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Stats_m extends MY_MODEL
{

	private $report_interval_date = '-10 days';
	private $report_interval_value = 10;
	private $report_dates = array();
	public $income_totals = array();
	public $trans_initials = array('AC','ST','DE','WD','BL','CH');
	public $trans_numbers = array();

	//Tables associated
	private $charges_tb = 'charges';


	function __construct() {
		parent::__construct();

	}

	function get($code){
		switch ($code) {
			case INCOME_CHARGES:
				$this->set_previous_dates();
				$this->income_charges();
				return $this->income_totals;
				break;
			
			default:
				return false;
				break;
		}
	}

	function set_previous_dates(){
		$j = 0;
		for($i=0;$i<$this->report_interval_value;$i++){
			$index = date('M_d', strtotime('-'.$i.' days'));
			$this->report_dates[$index] = date('Y-m-d', strtotime('-'.$i.' days'));
			$this->income_totals[$index] = 0;
			$j++;
		}
		
	}

	function income_charges(){
		//Pull the income charges of the last 10 days
		$date = date('Y-m-d', strtotime($this->report_interval_date));
		$this->db->where('reg_date >=',$date);
		$this->db->where('status',SUCCESSFUL_CHARGE);
		$data = $this->db->get($this->charges_tb)->result_array();
		
		foreach($data as $v){
			$selected_date = date('Y-m-d',strtotime($v['reg_date']));
			foreach ($this->report_dates as $key => $value) {
				if($value == $selected_date){
					$this->income_totals[$key] += $v['amount'];
				}
			}
		}
	}

	function transaction_numbers(){
		foreach($this->trans_initials as $v){
			//Get the p
		}
	}

	function get_transaction_total($code,$table){
		$date = date('Y-m-d', strtotime($this->report_interval_date));
		$this->db->where('reg_date >=',$date);
		$this->db->where('status',COMPLETED_TX);
		switch ($code) {
			case 'AC':
				$this->db->where('narration',TXACC);
				$this->db->or_where('narration',TXUBAC);
				return $total = $this->db->count_all_results($table);
				break;
			case 'ST':
				$this->db->where('narration',TXST);
				return $total = $this->db->count_all_results($table);
				break;
			case 'DE':
				$this->db->where('narration',SBDEP);
				return $total = $this->db->count_all_results($table);
				break;
			case 'WD':
				$this->db->where('narration',SBWD);
				return $total = $this->db->count_all_results($table);
				break;
			case 'BL':
				$this->db->where('narration','dawasco');
				return $total = $this->db->count_all_results($table);
				break;
			case 'CH':
				$this->db->where('narration',SBCHQW);
				return $total = $this->db->count_all_results($table);
				break;
			default:
				# code...
				break;
		}
	}
}