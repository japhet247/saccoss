<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transactions extends MY_Controller {

	function __construct(){
		parent::__construct('view transactions');
		$this->load->model('transactions_m');
	}

	function inquiries(){
		$this->data['columns'] = array('narration', 'account_no' , 'pos_imei', 'reg_date', 'txnID' ,'status_description');
		$this->data['rows'] = $this->transactions_m->get();
		$this->data['hide_nav'] = TRUE;
		$this->data['title'] = 'Inquiries Transactions';
        $this->data['table_title'] = 'tb_transc_inquiries';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function ft(){
		$this->data['columns'] = array('narration', 'debit_account' , 'credit_account',  'amount', 'municipal_name', 'reg_date', 'txnID' ,'status_description');
		$this->data['hide_nav'] = TRUE;
		$this->data['rows'] = $this->transactions_m->ft();
		$this->data['title'] = 'Fund Transfer Transactions';
        $this->data['table_title'] = 'transc_transfer';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function bills(){
		$this->data['columns'] = array('narration', 'debit_account' , 'customer_account',  'amount', 'municipal_name', 'reg_date', 'txnID' ,'status_description');
		$this->data['hide_nav'] = TRUE;
		$this->data['rows'] = $this->transactions_m->bills();
		$this->data['title'] = 'Bills Payment';
        $this->data['table_title'] = 'transc_bills';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function view(){
		$narration = $this->uri->segment(4);
		$transc_id = $this->uri->segment(5);
		$table = $this->uri->segment(6);
		$data['title'] = 'Transactions Details';
		$data['close'] = TRUE;
		$data['tb_title'] = 'Transactions details';
		$data['table_data'] = $this->transactions_m->get_details($narration, $transc_id, $table);
		$this->twig->display('transc_details.html.twig', $data);
	}

}