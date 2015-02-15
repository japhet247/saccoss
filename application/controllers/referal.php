<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Referal extends MY_Controller {

	public $role_id;

	function __construct(){
		parent::__construct('view referals');
		$this->load->model('referal_m');
		$this->role_id = $this->user_m->role_id;
	}

	function reject_form(){
		has_function_access('reject referal');
		$referal_id = $this->uri->segment(4);
		$data['url'] = 'en/referal/reject/'.$referal_id;
		$data['title'] = 'Provide Rejection reason';
		$this->twig->display('forms/reject_form.html.twig' , $data);
	}

	function reject(){
		has_function_access('reject referal');
		$referal_id = $this->uri->segment(4);
		if($this->form_validation->run('reject_form') == TRUE){
			$comment = $this->input->post('comment');
			$this->referal_m->reject($referal_id, $comment);
			$data['title'] = 'Referal successfully rejected';
			$data['message_type'] = 'success';
			$data['message'] = $data['title'];
			//$data['close'] = TRUE;
			$data['reload'] = TRUE;
			$this->twig->display('message.html.twig', $data);
		}else{
			$data['title'] = 'Referal Rejection failure';
			$data['url'] = 'en/referal/reject/'.$referal_id;
			$data['error'] = $this->referal_m->custom_msg(form_error('comment'), 'danger');
			$this->twig->display('forms/reject_form.html.twig' , $data);
		}
	}

	function authorize($referal_id){
		has_function_access('view authorized referals');
		$saved = $this->referal_m->authorize($referal_id);
		if($saved){
			$data['title'] = 'Referal successfully Authorized';
			$data['message_type'] = 'success';
			$data['message'] = $data['title'];
			//$data['close'] = TRUE;
			$data['reload'] = TRUE;
		}else{
			$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Authorization Failure';
	    	$data['message'] = 'Changes authorization failed';
		}
		$this->twig->display('message.html.twig', $data);
	}

	function authorized(){
		has_function_access('view authorized referals');
		$this->data['columns'] = array('narration', 'credit_account' , 'debit_account', 'amount', 'teller_name', 'created');
		$this->data['rows'] = $this->referal_m->get_referals(COMPLETED_REFERAL);
		$this->data['hide_nav'] = TRUE;
		$this->data['title'] = 'Pending Referals';
        $this->data['table_title'] = 'tb_authorized_referals';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function pending(){
		has_function_access('view pending referals');
		$this->data['columns'] = array('narration', 'credit_account' , 'debit_account', 'amount', 'teller_name', 'created');
		$this->data['rows'] = $this->referal_m->get_referals(PENDING_REFERAL);
		$this->data['action_btn'] = TRUE;
		$this->data['hide_nav'] = TRUE;
		$this->data['title'] = 'Pending Referals';
        $this->data['table_title'] = 'tb_pending_referals';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function rejected(){
		has_function_access('view pending referals');
		$this->data['columns'] = array('narration', 'credit_account' , 'debit_account', 'amount', 'teller_name', 'created');
		$this->data['rows'] = $this->referal_m->get_referals(REJECTED_REFERAL);
		$this->data['action_btn'] = TRUE;
		$this->data['hide_nav'] = TRUE;
		$this->data['title'] = 'Pending Referals';
        $this->data['table_title'] = 'tb_rejected_referals';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function view($referal_id){
		$referal = $this->referal_m->get_referals(false, $referal_id);
		($referal) || show_error('Referal Not Found', 404);
		if($referal['credit_account']){
			$credit_account = $this->my_api->ub(array('subcode'=>UBACC, 'account_no'=>$referal['credit_account']));
			
			$referal['credit_account'] = ($credit_account) ? $credit_account : false; 
		}
		if($referal['debit_account']){
			$debit_account = $this->my_api->ub(array('subcode'=>UBACC, 'account_no'=>$referal['debit_account']));
		
			$referal['debit_account'] = ($debit_account) ? $debit_account : false; 
		}
		$referal['authorised_by'] = ($referal['authorised_by']) ? $this->user_m->get_value($referal['authorised_by'], 'full_name') : false;
		$data['referal'] = $referal;
		$data['data_content'] = 'includes/referal_details';
		$this->twig->display('iframe.html.twig', $data);
	}
}