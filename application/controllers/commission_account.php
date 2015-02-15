<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Commission_account extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('commission_account_m', 'account_m');
	}

	function save(){
		has_function_access('add commission account');
		$this->data['branches'] = $this->account_m->get_branches();
		//adding data
		$this->data['title'] = 'Add New commission Account';
		$this->data['account'] = $this->account_m->get_new();
		if($this->form_validation->run('commission_account_form') == TRUE){

			$this->account_m->create();

			if($this->user_m->role_id == SADMIN) { 
				$msg = 'Commission Account Successful Added and Authorized';
				$this->set_redirect_msg($msg);
				redirect('en/commission_account/all'); 
			}else{ 
				$msg = 'Commission Account Successful added and activity logged for authorization.';
				$this->set_redirect_msg($msg);
				redirect('en/activity/pending'); 
			}
			 
		}else{
			$this->data['error'] = $this->account_m->set_errors();	
		}
        $this->data['page_title'] = 'Fill the Form Below';
        $this->twig->display('forms/add_commission_account.html.twig', $this->data);
	}

	function authorize(){
		has_function_access('add commission account');
		$commission_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->account_m->authorize($commission_id, $activity_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Authorization Successful';
	    	$data['message'] = 'Commission Account Successful authorized';
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Authorization Failure';
	    	$data['message'] = 'Commission Account authorization failed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

	function remove($commission_id){
		has_function_access('remove commission account');
		$account = $this->account_m->get($commission_id, TRUE);
		$saved = $this->account_m->delete($commission_id, false);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Success';
	    	$data['message'] = 'Commission Account Successful removed';
	    	$msg = 'Removed commission Account no <strong>'.$account['account_no'].'</strong>';
	    	$this->user_m->grab_trail_message($msg);
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Failure';
	    	$data['message'] = 'Commission Account could not be removed';
    	}

    	$this->twig->display('message.html.twig', $data);
	}

	function all(){
		has_function_access('view commission account');
		$this->data['columns'] = array('branch_name', 'account_no', 'created');
		$this->data['rows'] = $this->account_m->get_accounts();
		$this->data['action_btn'] = TRUE;
		$this->data['title'] = 'All Commission Accounts';
        $this->data['table_title'] = 'tb_commission_accounts';
        $this->twig->display('site_table.html.twig', $this->data);
	}
}