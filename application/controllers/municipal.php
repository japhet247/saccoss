<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Municipal extends MY_Controller {

	function __construct(){
		parent::__construct('view municipal');
		$this->load->model('municipal_m');
	}

	function save(){
		has_function_access('add municipal');
		$municipal_id = $this->uri->segment(4);
		$user_role	= $this->user_m->role_id;
		$this->data['branches'] = $this->municipal_m->get_branches();
		if($municipal_id){
			//populate data for editing
			$this->data['title'] = 'Edit Municipal';
			$this->municipal_m->data_status = FALSE;
			$this->data['municipal'] = $this->municipal_m->get($municipal_id, TRUE);
		}else{
			$this->data['title'] = 'Add New Municipal';
			$this->data['municipal'] = $this->municipal_m->get_new();
		}

		if($this->form_validation->run('municipal_form') == TRUE){
			if($municipal_id){
				$this->municipal_m->edit($municipal_id);
			}else{
				$this->municipal_m->create();
			}
			if($user_role == SADMIN) {
				$this->data['message'] = ($municipal_id) ? $this->municipal_m->custom_msg('Municipal successful Updated') : $this->municipal_m->custom_msg('Municipal successful Added');
			}else{
				$this->set_redirect_msg($this->activity_msg); 
				redirect('en/activity/pending');
			}
		}else{
			$this->data['message'] = $this->municipal_m->set_errors();	
		}
		
		$this->data['regions'] = $this->municipal_m->get_form_options(false, 'regions');
        $this->data['page_title'] = 'Fill the Form Below';
        $this->twig->display('forms/add_municipal.html.twig', $this->data);
	}

	function all(){
		has_function_access('view municipal');
		$this->data['hide_nav'] = TRUE;
		$groups = array();
		$regions = $this->municipal_m->get_form_options(false, 'regions');
		foreach($regions as $r){
            $groups[] = array('link' => 'en/municipal/region/'.$r['option_id'], 'value' => $r['descrption']);
        }
        $this->data['title'] = 'Municipals';
        $this->data['groups'] = $groups;

        $this->twig->display('group.html.twig', $this->data);
	}

	function region($region){
		$municipals = $this->municipal_m->get_by(array('region'=>$region));
		$groups = array();
		if(!empty($municipals)){
	        foreach($municipals as $m){
	            $groups[] = array('link' => 'en/municipal/view/'.$m['municipal_id'], 'value' => $m['municipal_name']);
	        }
		}else{
			$groups[] = array('link' => false, 'value' => 'No Municipal found');
		}

		$this->data['groups'] = $groups;
        $this->twig->display('list.html.twig',$this->data);
	}

	function view(){
		has_function_access('view municipal');
		$municipal_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$pop = FALSE;
		if(!$activity_id){
			$data['editable'] = TRUE;
			$municipal = $this->municipal_m->get($municipal_id, TRUE);
			$municipal['authorised_by'] = ($municipal['authorised_by']) ? $this->user_m->get_value($municipal['authorised_by'], 'full_name') : "";
			$this->load->model('municipal_account_m', 'account_m');
			$accounts = $this->account_m->prepare_accounts($municipal_id);

			if($accounts){
				$data['has_account'] = TRUE;
				$data['table_title'] = 'municipal_accounts';
				$data['columns'] = array('account', 'category_a', 'category_b');
				$data['rows'] = $this->account_m->format_display($accounts);
				$data['action_btn'] = TRUE;
			}
		}else{
			$pop = TRUE;
			//get the activity 
			$this->load->model('activity_m');
			$activity = $this->activity_m->get($activity_id, TRUE);
			(!empty($activity)) || show_error('Activity Not Found', 404);
			$this->municipal_m->data_status = FALSE;
			$municipal = $this->municipal_m->get($municipal_id, TRUE);
			if($activity['status'] == ACTIVE_DATA){
				$data['editable'] = TRUE;
				$municipal['authorised_by'] = ($municipal['authorised_by']) ? $this->user_m->get_value($municipal['authorised_by'], 'full_name') : "";
			}elseif($activity['status'] == REJECTED_DATA){
				if($activity['created_by'] == $this->user_m->user_id) $data['editable'] = TRUE;
				$data['unauthorised'] = FALSE;
				$data['rejected'] = TRUE;
				$municipal['authorised_by'] = ($municipal['authorised_by']) ? $this->user_m->get_value($municipal['authorised_by'], 'full_name') : "";
				$user['rejected_by'] = ($activity['rejected_by']) ? $this->user_m->get_value($activity['rejected_by'], 'full_name') : "";
				$user['rejected'] = $activity['rejected'];
			}else{
				$municipal['authorised_by'] = ($municipal['authorised_by']) ? $this->user_m->get_value($municipal['authorised_by'], 'full_name') : "";
				$data['activity_id'] = $activity_id;
				$data['unauthorized'] = TRUE;
				if($activity['activity_key'] == ACTIVITY_EDIT){
					$data['activity_key'] = 'edit';
				}
			}
		}
		$municipal['created_by'] = ($municipal['created_by']) ? $this->user_m->get_value($municipal['created_by'], 'full_name') : "";
		(!empty($municipal)) || show_error('Municipal Not Found', 404);
		$municipal['branch_name'] = ($municipal['sortcode']) ? $this->municipal_m->get_branches($municipal['sortcode']) : 'NOT ASSIGNED';
		$data['municipal'] = $municipal;
		$data['data_content'] = 'includes/municipal_profile';
		($pop) ? $this->twig->display('iframe.html.twig', $data) : $this->twig->display($data['data_content'].'.html.twig', $data);
	}

	function authorize(){
		has_function_access('add municipal');
		$municipal_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->municipal_m->authorize($municipal_id, $activity_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Authorization Successful';
	    	$data['message'] = 'User Successful authorized';
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Authorization Failure';
	    	$data['message'] = 'Userauthorization failed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

	function committ(){
		has_function_access('edit municipal');
		$municipal_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->municipal_m->committ($municipal_id, $activity_id);
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

	function users(){
		has_function_access('view municipal user');
		$groups = array();
		$municipals = $this->municipal_m->get();
		foreach($municipals as $r){
            $groups[] = array('link' => 'en/municipal/load_users/'.$r['municipal_id'], 'value' => $r['municipal_name']);
        }
        $this->data['title'] = 'Municipal Users';
        $this->data['groups'] = $groups;

        $this->twig->display('group.html.twig', $this->data);
	}

	function load_users($municipal_id){
		$users = $this->user_m->get_by(array('municipal_id'=>$municipal_id));
		$groups = array();
		if(!empty($users)){
	        foreach($users as $u){
	            $groups[] = array('link' => 'en/user/view/'.$u['user_id'].'/display', 'value' => $u['full_name']);
	        }
		}else{
			$groups[] = array('link' => false, 'value' => 'No user found');
		}

		$this->data['groups'] = $groups;
        $this->twig->display('list.html.twig',$this->data);
	}

	
}