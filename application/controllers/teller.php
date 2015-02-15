<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teller extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('teller_m');
	}

	function save(){
		has_function_access('add pos teller');
		$teller_id = $this->uri->segment(4);
		$this->load->model('municipal_m');
		$this->data['municipals'] = $this->municipal_m->prepare_municipals();
		if($teller_id){
			//editing data
			$this->data['title'] = 'Edit POS Teller';
			$this->data['user'] = $this->teller_m->get($teller_id, false);
		}else{
			//adding data
			$this->data['title'] = 'Add New POS Teller';
			$this->data['user'] = $this->teller_m->get_new();
		}
		if($this->form_validation->run('teller_form') == TRUE){
			if(!$teller_id){ 
				$this->teller_m->create();
			}else{
			 	$this->teller_m->edit($teller_id);	
			}
			if($this->user_m->role_id == SADMIN) { 
				$msg = ($teller_id) ? 'Teller Successful edited' : 'Teller Successful Added and Authorized';
				$this->set_redirect_msg($msg);
				redirect('en/teller/all'); 
			}else{ 
				$msg = ($teller_id) ? 'Teller Successful edited and Activity logged for authorization' : 'Teller Successful added and activity logged for authorization.';
				$this->set_redirect_msg($msg);
				redirect('en/activity/pending'); 
			}
			 
		}else{
			$this->data['error'] = $this->teller_m->set_errors();	
		}
        $this->data['page_title'] = 'Fill the Form Below';
        $this->twig->display('forms/add_pos_teller.html.twig', $this->data);
	}

	function all(){
		has_function_access('view pos teller');
		$this->data['columns'] = array('full_name', 'email', 'teller_account', 'card_no', 'municipal_name');
		$this->data['rows'] = $this->teller_m->get_tellers();
		$this->data['action_btn'] = TRUE;
		$this->data['hide_nav'] = TRUE;
		$this->data['title'] = 'All POS Tellers';
        $this->data['table_title'] = 'tb_tellers';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function view(){
		has_function_access('view pos teller');
		$teller_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$data['pos_teller'] = TRUE;
		$pop = TRUE;
		if(!$activity_id){
			$data['editable'] = TRUE;
			$user = $this->teller_m->get_tellers($teller_id, true);
			($user) || show_error('User Not Found', 404);
			$user['authorised_by'] = ($user['authorised_by']) ? $this->user_m->get_value($user['authorised_by'], 'full_name') : "";
		}else{
			//get the activity 
			$this->load->model('activity_m');
			$activity = $this->activity_m->get($activity_id, TRUE);
			(!empty($activity)) || show_error('Activity Not Found', 404);
			$user = $this->teller_m->get_tellers($teller_id, false);
			($user) || show_error('User Not Found', 404);
			if($activity['status'] == ACTIVE_DATA){
				$user['authorised_by'] = ($user['authorised_by']) ? $this->user_m->get_value($user['authorised_by'], 'full_name') : "";
			}elseif(($activity['status'] == REJECTED_DATA)){
				if($activity['created_by'] == $this->user_m->user_id) $data['editable'] = TRUE;
				$data['unauthorised'] = FALSE;
				$data['rejected'] = TRUE;
				$user['authorised_by'] = ($user['authorised_by']) ? $this->user_m->get_value($user['authorised_by'], 'full_name') : "";
				$user['rejected_by'] = ($activity['rejected_by']) ? $this->user_m->get_value($activity['rejected_by'], 'full_name') : "";
				$user['rejected'] = $activity['rejected'];
			}else{
				$user['authorised_by'] = ($user['authorised_by']) ? $this->user_m->get_value($user['authorised_by'], 'full_name') : "";
				$data['activity_id'] = $activity_id;
				$data['unauthorized'] = TRUE;
				if($activity['activity_key'] == ACTIVITY_EDIT){
					$data['activity_key'] = 'edit';
				}
			}
		}
		$user['created_by'] = ($user['created_by']) ? $this->user_m->get_value($user['created_by'], 'full_name') : "";
		$user['profile'] = 'POS TELLER';
		$data['user'] = $user;
		$data['data_content'] = 'includes/profile';
		($pop) ? $this->twig->display('iframe.html.twig', $data) : $this->twig->display($data['data_content'].'.html.twig', $data);
	}

	function authorize(){
		has_function_access('add pos teller');
		$teller_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->teller_m->authorize($teller_id, $activity_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Authorization Successful';
	    	$data['message'] = 'Teller Successful authorized';
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Authorization Failure';
	    	$data['message'] = 'Teller authorization failed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

	function committ(){
		has_function_access('edit pos teller');
		$teller_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->teller_m->committ($teller_id, $activity_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Authorization Successful';
	    	$data['message'] = 'Changes Successful authorized';
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Authorization Failure';
	    	$data['message'] = 'Changes authorization failed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

}