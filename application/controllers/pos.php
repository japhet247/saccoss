<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos extends MY_Controller {

	function __construct(){
		parent::__construct('view pos');
		$this->load->model('pos_m');
		$this->load->model('municipal_m');
	}

	function save(){
		has_function_access('add pos');
		$user_role = $this->user_m->role_id;
		$pos_id = $this->uri->segment(4);
		$this->load->model('pos_functions_m');
		$this->data['properties'] = $this->pos_functions_m->prepare_functions($this->pos_functions_m->get());
		$this->data['branches'] = $this->pos_m->get_branches();
		if($pos_id){
			$this->pos_m->data_status = FALSE;
			$pos = $this->pos_m->get($pos_id, TRUE);
			(!empty($pos)) || show_error('Page Not Found', '404');
			$title = 'Edit POS';
        	$page_title = 'Edit POS '. $pos['pos_name'];
        	$this->load->model('pos_assignment_m', 'assign_m');
        	$this->data['saved_functions'] = $this->assign_m->get_by(array('pos_id'=>$pos_id));
		}else{
			$title = 'Add POS';
			$pos = $this->pos_m->get_new();
			$page_title = 'Fill the Form Below';
		}
		if($this->form_validation->run('pos_form') == TRUE){
			if(!$pos_id){ 
				$this->pos_m->create_pos();
			}else{
			 	$this->pos_m->edit($pos_id);	
			}
			if($user_role == SADMIN){
				$this->data['message'] = ($pos_id) ? $this->pos_m->custom_msg('POS Successfully Updated') : $this->pos_m->custom_msg('POS Successfully added');
			}else{ 
				$this->set_redirect_msg($this->activity_msg); 
				redirect('en/activity/pending');
			}
		}else{
			$this->data['message'] = $this->pos_m->set_errors();	
		}
		
		$this->data['municipals'] = $this->municipal_m->prepare_municipals();
		$this->data['pos'] = $pos;
		$this->data['title'] = $title;
		$this->data['page_title'] = $page_title;
		$this->twig->display('forms/add_pos.html.twig', $this->data);
	}

	function all(){
		has_function_access('view pos');
		
		$groups = array();
		$muncipals = $this->municipal_m->get();
		foreach($muncipals as $r){
            $groups[] = array('link' => 'en/pos/load/'.$r['municipal_id'], 'value' => $r['municipal_name']);
        }
        $this->data['title'] = 'Muncipal POS';
        $this->data['groups'] = $groups;
        $this->data['hide_nav'] = TRUE;
        $this->twig->display('group.html.twig', $this->data);
	}

	function load($municipal_id){
		$pos = $this->pos_m->get_by(array('municipal_id'=>$municipal_id));
		$groups = array();
		if(!empty($pos)){
	        foreach($pos as $p){
	            $groups[] = array('link' => 'en/pos/view/'.$p['pos_id'], 'value' => $p['pos_name']);
	        }
		}else{
			$groups[] = array('link' => false, 'value' => 'No POS found');
		}

		$this->data['groups'] = $groups;
        $this->twig->display('list.html.twig',$this->data);
	}

	function view(){
		has_function_access('view pos');
		$pos_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$this->load->model('pos_functions_m');
		$this->load->model('pos_assignment_m');
		$data['properties'] = $this->pos_functions_m->prepare_functions($this->pos_functions_m->get_pos_functions($pos_id));
		$pop = FALSE;
		if(!$activity_id){
			$data['action_btns'] = TRUE;
			$data['editable'] = TRUE;
			$pos = $this->pos_m->get($pos_id, TRUE);
			$pos['authorised_by'] = ($pos['authorised_by']) ? $this->user_m->get_value($pos['authorised_by'], 'full_name') : "";
			$data['pos_status'] = ($this->my_api->pos_status($pos['device_imei']) == ONLINE_POS) ? 'online' : 'offline';
		}else{
			$pop = TRUE;
			//get the activity 
			$this->load->model('activity_m');
			$activity = $this->activity_m->get($activity_id, TRUE);
			(!empty($activity)) || show_error('Activity Not Found', 404);
			$this->pos_m->data_status = FALSE;
			$pos = $this->pos_m->get($pos_id, TRUE);
			if($activity['status'] == ACTIVE_DATA){
				$data['editable'] = TRUE;
				$pos['authorised_by'] = ($pos['authorised_by']) ? $this->user_m->get_value($pos['authorised_by'], 'full_name') : "";
			}elseif(($activity['status'] == REJECTED_DATA)){
				if($activity['created_by'] == $this->user_m->user_id) $data['editable'] = TRUE;
				$data['unauthorised'] = FALSE;
				$data['rejected'] = TRUE;
				$pos['authorised_by'] = ($pos['authorised_by']) ? $this->user_m->get_value($pos['authorised_by'], 'full_name') : "";
				$user['rejected_by'] = ($activity['rejected_by']) ? $this->user_m->get_value($activity['rejected_by'], 'full_name') : "";
				$user['rejected'] = $activity['rejected'];
			}else{
				$pos['authorised_by'] = ($pos['authorised_by']) ? $this->user_m->get_value($pos['authorised_by'], 'full_name') : "";
				$data['activity_id'] = $activity_id;
				$data['unauthorized'] = TRUE;
				if($activity['activity_key'] == ACTIVITY_EDIT){
					$data['activity_key'] = 'edit';
				}
			}
		}
		$pos['created_by'] = ($pos['created_by']) ? $this->user_m->get_value($pos['created_by'], 'full_name') : "";
		(!empty($pos)) || show_error('User Not Found', 404);
		$pos['municipal'] = $this->municipal_m->get_value($pos['municipal_id'], 'municipal_name');
		$data['pos'] = $pos;
		$data['data_content'] = 'includes/pos_profile';
		($pop) ? $this->twig->display('iframe.html.twig', $data) : $this->twig->display($data['data_content'].'.html.twig', $data);
	}

	function authorize(){
		$pos_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->pos_m->authorize($pos_id, $activity_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Authorization Successful';
	    	$data['message'] = 'POS Successful authorized';
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Authorization Failure';
	    	$data['message'] = 'POS authorization failed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

	function committ(){
		$pos_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->pos_m->committ($pos_id, $activity_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	//$data['close'] = TRUE;
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