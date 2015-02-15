<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role extends MY_Controller {

	function __construct(){
		parent::__construct('view profile');
		$this->load->model('role_m');
		$this->load->model('permission_m');
		$this->load->model('permission_map_m', 'map_m');
	}

	function save(){
		has_function_access('add profile');
		$user_role = $this->user_m->role_id;
		$role_id = $this->uri->segment(4);

		if($role_id){
			//get role and associated permissions
			$this->role_m->data_status = FALSE;
			$role = $this->role_m->get($role_id, TRUE);
			(!empty($role)) || show_error('Page Not Found', '404');
			$this->data['role'] = $role;
			$this->data['title'] = 'Edit Sytem User Profile';
        	$this->data['page_title'] = 'Edit '. $role['name'];
        	$this->data['edit'] = TRUE;
        	$this->data['saved_permissions'] =  $this->permission_m->get_permissions($role_id);
		}else{
			$this->data['role'] = $this->role_m->get_new();
			$this->data['title'] = 'Add New System User Profile';
        	$this->data['page_title'] = 'Fill the Form Below';
		}

		if($this->form_validation->run('profile_form') == TRUE){
			if(!$role_id){ 
				$this->role_m->create();
			}else{
			 	$this->role_m->edit($role_id);	
			}
			($user_role == SADMIN) ? redirect('en/role/all') : redirect('en/activity/pending');
		}else{
			$this->data['error'] = $this->role_m->set_errors();	
		}
		$all_perms = $this->permission_m->get_permissions();
		$permissions = $this->permission_m->prepare_permission($all_perms);
		$this->data['permissions'] = $permissions;
        $this->twig->display('forms/add_profile.html.twig', $this->data);
	}

	function all(){
		has_function_access('view profile');
		$this->data['columns'] = array('name', 'description');
		$this->data['rows'] = $this->role_m->get();
		$this->data['action_btn'] = TRUE;
		$this->data['title'] = 'System User Profiles';
        $this->data['table_title'] = 'tb_user_profiles';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function view(){
		has_function_access('view profile');
		$this->load->model('activity_m');
		$this->role_m->data_status = FALSE;
		$role_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$role = $this->role_m->get($role_id, TRUE);
		(!empty($role)) || show_error('Page Not Found', 404 );
		$activity = $this->activity_m->get($activity_id, TRUE);
		if($activity_id){
			if(($activity['status'] == REJECTED_DATA) && ($activity['created_by'] == $this->user_m->user_id)){ 
				$this->data['editable'] = TRUE;
			}elseif(($activity['status'] == ACTIVE_DATA)){
				$this->data['editable'] = TRUE;
			}
			else{
				$this->data['unauthorized'] = TRUE;
				$this->data['activity_id'] = $activity['activity_id'];
				if($activity['activity_key'] == ACTIVITY_EDIT){
					$this->data['activity_key'] = 'edit';
					$this->data['changes'] = $this->role_m->prepare_edited($role_id, $activity_id);
				}
			}
		}elseif($role['status'] == ACTIVE_DATA){
			$this->data['editable'] = TRUE;
		}
		else{
			$this->data['unauthorized'] = FALSE;
		}

		$this->data['role'] = $role;
		$user_perms = $this->permission_m->get_permissions($role_id);
		$this->data['permissions'] = $this->permission_m->prepare_permission($user_perms);
		$this->data['data_content'] = 'user_role';
		$this->twig->display('iframe.html.twig', $this->data);
	}


	function authorize(){
		has_function_access('add profile');
		$role_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->role_m->authorize($role_id, $activity_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Authorization Successful';
	    	$data['message'] = 'Profile Successful authorized';
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Authorization Failure';
	    	$data['message'] = 'Profile authorization failed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

	function committ(){
		has_function_access('edit profile');
		$role_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->role_m->committ($role_id, $activity_id);
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

	function disable($role_id){
		has_function_access('disable profile');
		$role_name = $this->role_m->get_value($role_id, 'name');
		$saved = $this->role_m->delete($role_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Profile Successful disabled';
	    	$data['message'] = 'Profile Successful disabled';
	    	$msg = 'Disabled User Profile <strong>'.$role_name.'</strong>';
	    	$this->user_m->grab_trail_message($msg);
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Profile could not be disabled';
	    	$data['message'] = 'Profile could not be disabled';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

}