<?php
class Dashboard_m extends CI_Model {

	public $dashboard;
	public $config_data;
	public $tabs;

	function __construct(){
		parent::__construct();
		$this->config->load('dashboard'); 
		$this->config_data = $this->config->item($this->user_m->role_id);
	}

	function set_values(){
		$tabs = $this->config_data['tabs'];
		if($tabs){
			foreach ($tabs as $key => $tab) {
				$method = $tab['value'];
				$tab['value'] = $this->$method();
				$tabs[$key]	= $tab;
			}
		}else{
			$tabs = false;
		}
		if(!isset($this->config_data['dashboard_links'])) $this->config_data['dashboard_links'] = false;
		$this->config_data['tabs'] = $tabs;
	}

	function get_dashboard(){
		$this->set_values();
		return $this->config_data;
	}

	function count_pos(){
		return count($this->db->get_where('pos', array('data_status'=>ACTIVE_DATA))->result_array());
	}

	function count_cheques(){
		return count($this->db->get('cheques')->result_array()); 
	}

	function today_transactions(){
		$bills = count($this->db->get('transc_bills')->result_array()); 
		$inquiries = count($this->db->get('transc_inquiries')->result_array());
		$ft = count($this->db->get('transc_transfer')->result_array());
		return $bills + $inquiries + $ft;
	}

	function count_authorized_activity(){
		$this->load->model('activity_m');
		return count($this->activity_m->get_activity(ACTIVE_DATA, $this->user_m->role_id));
	}

	function count_pending_activity(){
		$this->load->model('activity_m');
		return count($this->activity_m->get_activity(UNAUTHORISED_DATA, $this->user_m->role_id));
	}

	function count_failed_activity(){
		$this->load->model('activity_m');
		return count($this->activity_m->get_activity(REJECTED_DATA, $this->user_m->role_id));
	}

	function count_approved_cheques(){
		$this->load->model('cheque_m');
		return count($this->cheque_m->approved_cheques());
	}

	function count_pending_cheques(){
		$this->load->model('cheque_m');
		return count($this->cheque_m->pending_cheques());
	}

	function count_failed_cheques(){
		$this->load->model('cheque_m');
		return count($this->cheque_m->rejected_cheques());
	}

	function get_charges(){
		$this->load->model('stats_m');
		$result = $this->stats_m->get(INCOME_CHARGES);
		$result = array_reverse($result);
		$data = $ticks = array();
		$i = 1;
		foreach ($result as $k => $v) {
			$data[] = array($i, $v);
			$k = str_replace('_', ' ', $k);
			$ticks[] = array($i, $k);
			$i++;
		}
		return array('data'=>json_encode($data), 'ticks' => json_encode($ticks));
	}



}