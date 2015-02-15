<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class User extends MY_Controller {
	public $filter_user_status = array(ACTIVE, AUTHORISED, BLOCKED);

	function __construct(){
		parent::__construct();
		$this->load->model('role_m');
	}

	function save(){
		has_function_access('add user');
		$user_id = $this->uri->segment(4);
		$this->load->model('municipal_m');
		$user_role	= $this->user_m->role_id;
		$this->data['roles'] = $this->role_m->get_roles();
		$this->data['municipals'] = $this->municipal_m->prepare_municipals();
		if($user_id){
			//editing data
			$this->data['title'] = 'Edit User';
			$this->data['user'] = $this->user_m->get_users($user_id, false);
		}else{
			//adding data
			$this->data['title'] = 'Add New System User';
			$this->data['user'] = $this->user_m->get_new();
		}
		if($this->form_validation->run('user_form') == TRUE){
			if(!$user_id){ 
				$this->user_m->create();
			}else{
			 	$this->user_m->edit($user_id);	
			}
			if($user_role == SADMIN) { 
				$msg = ($user_id) ? 'User Successful Updated' :'User Successful Added and Authorized';
				$this->set_redirect_msg($msg);
				redirect('en/user/all'); 
			}else{ 
				$this->set_redirect_msg($this->activity_msg); 
				redirect('en/activity/pending'); 
			}
			$this->session->set_userdata(array('msg_info'=>$msg));
		}else{
			$this->data['error'] = $this->user_m->set_errors();	
		}
        $this->data['page_title'] = 'Fill the Form Below';
        $this->twig->display('forms/add_system_user.html.twig', $this->data);
	}

	function all(){
		has_function_access('view user');
		$this->data['columns'] = $this->user_m->table_fields;
		$users_data = $this->user_m->get_users();
		$report_title = $this->user_m->set_report_title();
		
		if($_POST){
			//assuming user is filtering data
			$users_data = $this->user_m->get_users(false, true, false, true);
			$report_title = $this->user_m->set_report_title(true);

		}
		$this->data['report_title'] = $report_title; 
		$this->data['rows'] = $users_data;
		$this->data['action_btn'] = TRUE;
		$this->data['hide_nav'] = TRUE;
		$this->data['filter_link'] = 'en/user/filters/users';
		$this->data['title'] = 'System Users';
        $this->data['table_title'] = 'tb_users';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function view(){
		has_function_access('view user');
		$user_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$pop = TRUE;
		if($activity_id == 'display') {
			$activity_id = false; 
			$pop = FALSE;
		}
		if(!$activity_id){
			$data['action_btns'] = TRUE;
			$data['editable'] = TRUE;
			$user = $this->user_m->get_users($user_id, true);
			($user) || show_error('User Not Found', 404);
			$data['reset_url'] = 'en/user/confirm/user/reset/'.$user['user_id']; 
			if($user['user_status'] == ACTIVE){
				$data['block_url'] = 'en/user/confirm/user/block/'.$user['user_id']; 
			}else{
				$data['blocked'] = TRUE;
				$data['block_url'] = 'en/user/confirm/user/unblock/'.$user['user_id']; 
			} 
			if($user['role_id'] == CHEQUE_SIGNATORY){
				$this->load->model('signature_m');
				$signature = $this->signature_m->get_by(array('user_id' => $user['user_id']), TRUE);
				if(!empty($signature)){
					$data['signature'] = $signature;
				}
			}
			$user['authorised_by'] = ($user['authorised_by']) ? $this->user_m->get_value($user['authorised_by'], 'full_name') : "";
		}else{
			//get the activity 
			$this->load->model('activity_m');
			$activity = $this->activity_m->get($activity_id, TRUE);
			(!empty($activity)) || show_error('Activity Not Found', 404);
			$user = $this->user_m->get_users($user_id);
			($user) || $user = $this->user_m->get_users($user_id, false);
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
				}elseif($activity['activity_key'] == BLOCK_DATA){
					$data['activity_key'] = 'block';
				}
			}
		}
		$user['created_by'] = ($user['created_by']) ? $this->user_m->get_value($user['created_by'], 'full_name') : "";
		$data['user'] = $user;
		$data['data_content'] = 'includes/profile';
		($pop) ? $this->twig->display('iframe.html.twig', $data) : $this->twig->display($data['data_content'].'.html.twig', $data);
	}

	function authorize(){
		has_function_access('add user');
		$user_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->user_m->authorize($user_id, $activity_id);
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
	    	$data['message'] = 'User authorization failed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

	function committ(){
		has_function_access('edit user');
		$user_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->user_m->committ($user_id, $activity_id);
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

	function get_signatory(){
		$municipal_id = $this->input->post('municipal_id',true);
		$data['signatories'] = $this->user_m->get_by(array('municipal_id' => $municipal_id, 'role_id' => CHEQUE_SIGNATORY));
		$this->twig->display('includes/signatory.html.twig', $data);
	}

	function block($user_id){
		has_function_access('block user');
		$this->load->model('login_m');
		$reply = $this->login_m->save(array('status' => BLOCKED), $user_id);
		if($reply){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Success';
	    	$data['message'] = 'User Successful blocked';
	    	$msg = 'Blocked User <strong>'.$this->user_m->get_value($user_id,'full_name').'</strong>';
	    	$this->user_m->grab_trail_message($msg);
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Failure';
	    	$data['message'] = 'User could not be blocked';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

	function unblock($user_id){
		has_function_access('block user');
		$this->db->trans_start();
			$user = $this->user_m->get_users($user_id, true);
			if($user){
				$msg = '<strong>'.$this->user_m->full_name.'</strong> Unblocked user <strong>'.$user['full_name'].'</strong>';
				if($this->user_m->role_id == SADMIN){
					$this->load->model('login_m');
					$reply = $this->login_m->save(array('status' => ACTIVE), $user_id);
				}else{
					$this->load->model('activity_m');
					$activity['message'] = $msg; 
					$activity['tb_name'] = 'user';
					$activity['activity_key'] = BLOCK_DATA;
					$activity['uri'] = 'user/view';
					$activity['content_id'] = $user_id;
					$activity['role_id'] = $this->user_m->role_id;
					$reply = $this->activity_m->save($activity);
				}
				if($reply){
			    	$data['message_type'] = 'success';
			    	$data['close'] = TRUE;
			    	$data['reload'] = TRUE;
			    	$data['title'] = 'Success';
			    	$data['message'] = ($this->user_m->role_id == SADMIN) ? 'User Successful unblocked' : 'Activity Logged. User will be unblocked once this activity is authorized.';
		    		$this->user_m->grab_trail_message($msg);
		    	}else{
		    		$data['message_type'] = 'error';
			    	$data['close'] = TRUE;
			    	$data['title'] = 'Failure';
			    	$data['message'] = 'User could not be blocked';
		    	}
			}else{
				$data['message_type'] = 'error';
		    	$data['close'] = TRUE;
		    	$data['title'] = 'Failure';
		    	$data['message'] = 'User could not be found';
			}
		$this->db->trans_complete();
		$this->twig->display('message.html.twig', $data);
	}

	function unblock_committ(){
		has_function_access('block user');
		$user_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$this->load->model('login_m');
		$this->db->trans_start();
			$reply = $this->login_m->save(array('status' => ACTIVE), $user_id);
			if($reply){
				$this->load->model('activity_m');
				$this->activity_m->save(array('status' => ACTIVE_DATA, 'authorised_by' => $this->user_m->user_id, 'authorised' => $this->user_m->GT()), $activity_id);
		    	$data['message_type'] = 'success';
		    	$data['close'] = TRUE;
		    	$data['reload'] = TRUE;
		    	$data['title'] = 'Success';
		    	$data['message'] = 'User Successful unblocked';
		    	$msg = 'Authorised Activity -- <strong>'.$this->activity_m->get_value($activity_id, 'message').'</strong>';
		    	$this->user_m->grab_trail_message($msg);
	    	}else{
	    		$data['message_type'] = 'error';
		    	$data['close'] = TRUE;
		    	$data['title'] = 'Failure';
		    	$data['message'] = 'User could not be unblocked';
	    	}
	    $this->db->trans_complete();
    	$this->twig->display('message.html.twig', $data);
	}

	function reset($user_id){
		has_function_access('reset user');
		$this->db->trans_start();
			$user = $this->user_m->get_users($user_id, true);
			if($user){
				$msg = '<strong>'.$this->user_m->full_name.'</strong> Reset user <strong>'.$user['full_name'].'</strong>';
				if($this->user_m->role_id == SADMIN){
					$this->load->model('user_activation_m', 'activate');
					$reply = $this->activate->send_creds($user_id, true);
				}else{
					$this->load->model('activity_m');
					$activity['message'] = $msg; 
					$activity['tb_name'] = 'user';
					$activity['activity_key'] = RESET_USER;
					$activity['uri'] = 'user/view';
					$activity['content_id'] = $user_id;
					$activity['role_id'] = $this->user_m->role_id;
					$reply = $this->activity_m->save($activity);
				}
				if($reply){
			    	$data['message_type'] = 'success';
			    	$data['close'] = TRUE;
			    	//$data['reload'] = TRUE;
			    	$data['title'] = 'Success';
			    	$data['message'] = ($this->user_m->role_id == SADMIN) ? 'User Successful Reset' : 'Activity Logged. User will be reset once this activity is authorized.';
		    		$this->user_m->grab_trail_message($msg);
		    	}else{
		    		$data['message_type'] = 'error';
			    	$data['close'] = TRUE;
			    	$data['title'] = 'Failure';
			    	$data['message'] = 'User could not be Reset';
		    	}
			}else{
				$data['message_type'] = 'error';
		    	$data['close'] = TRUE;
		    	$data['title'] = 'Failure';
		    	$data['message'] = 'User could not be found';
			}
		$this->db->trans_complete();
		$this->twig->display('message.html.twig', $data);
	}

	function reset_committ(){
		has_function_access('reset user');
		$user_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$this->load->model('user_activation_m', 'activate');
		$this->db->trans_start();
			$reply = $this->activate->send_creds($user_id, true);
			if($reply){
				$this->load->model('activity_m');
				$this->activity_m->save(array('status' => ACTIVE_DATA, 'authorised_by' => $this->user_m->user_id, 'authorised' => $this->user_m->GT()), $activity_id);
		    	$data['message_type'] = 'success';
		    	$data['close'] = TRUE;
		    	//$data['reload'] = TRUE;
		    	$data['title'] = 'Success';
		    	$data['message'] = 'User Successful Reset';
		    	$msg = 'Authorised Activity -- <strong>'.$this->activity_m->get_value($activity_id, 'message').'</strong>';
	    		$this->user_m->grab_trail_message($msg);
	    	}else{
	    		$data['message_type'] = 'error';
		    	$data['close'] = TRUE;
		    	$data['title'] = 'Failure';
		    	$data['message'] = 'User could not be Reset';
	    	}
    	$this->db->trans_complete();
    	$this->twig->display('message.html.twig', $data);
	}

}