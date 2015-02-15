<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signature extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('signature_m');
	}

	function save(){
        has_function_access('add signature');
        
        if($this->form_validation->run('add_signature_form') == TRUE){
        	if($this->signature_m->create()){
        		$msg = ($this->user_m->role_id == SADMIN) ? 'Signature Successful Added': $this->activity_msg;
        		$this->set_redirect_msg($msg);
        		redirect('en/user/all');
        	}else{
        		$this->data['message'] = $this->signature_m->errors;
        	}
        }else{
            $this->data['message'] = $this->signature_m->set_errors();   
        }
        $this->data['signatories'] = $this->user_m->get_users(false, true, array('user.role_id'=>CHEQUE_SIGNATORY));
        $this->data['title'] = 'Add Signature';
        $this->data['page_title'] = 'Fill the Form Below';
        $this->twig->display('forms/add_signature.html.twig', $this->data);
    }

    function view(){
		has_function_access('add signature');
		$sign_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		
		//get the activity 
		$this->load->model('activity_m');
		$activity = $this->activity_m->get($activity_id, TRUE);
		(!empty($activity)) || show_error('Activity Not Found', 404);
		$this->signature_m->data_status = FALSE;
		$sign = $this->signature_m->get($sign_id, TRUE);
		if($activity['status'] == ACTIVE_DATA){
			$sign['authorised_by'] = ($sign['authorised_by']) ? $this->user_m->get_value($sign['authorised_by'], 'full_name') : "";
		}elseif($activity['status'] == REJECTED_DATA){
			
			$data['unauthorised'] = FALSE;
			$data['rejected'] = TRUE;
			$sign['authorised_by'] = ($sign['authorised_by']) ? $this->user_m->get_value($sign['authorised_by'], 'full_name') : "";
			$sign['rejected_by'] = ($activity['rejected_by']) ? $this->user_m->get_value($activity['rejected_by'], 'full_name') : "";
			$sign['rejected'] = $activity['rejected'];
		}else{
			$sign['authorised_by'] = ($sign['authorised_by']) ? $this->user_m->get_value($sign['authorised_by'], 'full_name') : "";
			$data['unauthorized'] = TRUE;
		}
		$data['activity_id'] = $activity_id;
		$sign['created_by'] = ($sign['created_by']) ? $this->user_m->get_value($sign['created_by'], 'full_name') : "";
		
		$data['sign'] = $sign;
		$data['data_content'] = 'includes/image';
		$this->twig->display('iframe.html.twig', $data);
	}

	function authorize(){
		has_function_access('add signature');
		$sign_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->signature_m->authorize($sign_id, $activity_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Authorization Successful';
	    	$data['message'] = 'Signature Successful authorized';
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Authorization Failure';
	    	$data['message'] = 'Signature authorization failed';
    	}
    	$this->twig->display('message.html.twig', $data);
	} 

}