<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Account extends MY_Controller {

	function __construct(){
		parent::__construct('view municipal account');
		$this->load->model('municipal_account_m', 'account_m');
	}

	function save(){
		has_function_access('add municipal account');
		$user_role = $this->user_m->role_id;
		$account_id = $this->uri->segment(4);
		if($account_id){
			$this->account_m->data_status = FALSE;
			$account = $this->account_m->get($account_id, TRUE);
			(!empty($account)) || show_error('Page Not Found', '404');
			$title = 'Edit Municipal Account';
        	$page_title = 'Edit '. $account['account_name'];
        	$this->data['signatories'] = $this->user_m->get_users(false,true,array('user.municipal_id' => $account['municipal_id'], 'user_role.role_id' => CHEQUE_SIGNATORY));
        	$this->load->model('signatory_map_m', 'sign_m');
        	$this->data['saved_signatories'] = $this->sign_m->get_by(array('municipal_account' => $account['account']));
		}else{
			$title = 'Add Municipal Account';
			$account = $this->account_m->get_new();
			$page_title = 'Fill the Form Below';
		}
		if($this->form_validation->run('municipal_account_form') == TRUE){
			if(!$account_id){ 
				$this->account_m->create_account();
			}else{
			 	$this->account_m->edit($account_id);	
			}
			if($user_role == SADMIN){
				$this->data['message'] = ($account_id) ? $this->account_m->custom_msg('Municipal Account Successfully Updated') : $this->account_m->custom_msg('Municipal Account Successfully added');
			}else{
                $this->set_redirect_msg($this->activity_msg); 
				redirect('en/activity/pending');
			}
		}else{
			$this->data['message'] = $this->account_m->set_errors();	
		}
		$this->load->model('municipal_m');
		$this->data['municipals'] = $this->municipal_m->prepare_municipals();
		$this->data['account'] = $account;
		$this->data['title'] = $title;
		$this->data['page_title'] = $page_title;
		$this->twig->display('forms/add_municipal_acc.html.twig', $this->data);
	}

	function view(){
		has_function_access('view municipal');
		$account_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		
		$accounts = $this->account_m->prepare_accounts(false,false, $account_id);

		if($accounts){
			$data['table_title'] = 'municipal_accounts';
			$data['columns'] = array('account', 'category_a', 'category_b');
			$data['rows'] = $this->account_m->format_display($accounts);
			$data['tb_static'] = TRUE;
		}else{
			show_error('Municipal Account Not Found', 404);
		}
		//get the activity 
		$this->load->model('activity_m');
		$activity = $this->activity_m->get($activity_id, TRUE);
		(!empty($activity)) || show_error('Activity Not Found', 404);
		$this->account_m->data_status = FALSE;
		$account = $this->account_m->get($account_id, TRUE);
		if($activity['status'] == ACTIVE_DATA){
			$data['editable'] = TRUE;
			$account['authorised_by'] = ($account['authorised_by']) ? $this->user_m->get_value($account['authorised_by'], 'full_name') : "";
		}elseif($activity['status'] == REJECTED_DATA){
			if($activity['created_by'] == $this->user_m->user_id) $data['editable'] = TRUE;
			$data['unauthorised'] = FALSE;
			$data['rejected'] = TRUE;
			$account['authorised_by'] = ($account['authorised_by']) ? $this->user_m->get_value($account['authorised_by'], 'full_name') : "";
			$user['rejected_by'] = ($activity['rejected_by']) ? $this->user_m->get_value($activity['rejected_by'], 'full_name') : "";
			$user['rejected'] = $activity['rejected'];
		}else{
			$account['authorised_by'] = ($account['authorised_by']) ? $this->user_m->get_value($account['authorised_by'], 'full_name') : "";
			$data['activity_id'] = $activity_id;
			$data['unauthorized'] = TRUE;
			if($activity['activity_key'] == ACTIVITY_EDIT){
				$data['activity_key'] = 'edit';
			}
		}
		
		$account['created_by'] = ($account['created_by']) ? $this->user_m->get_value($account['created_by'], 'full_name') : "";
		
		$data['account'] = $account;
		$data['data_content'] = 'includes/municipal_account';
		$this->twig->display('iframe.html.twig', $data);
	}

	function authorize(){
		$account_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->account_m->authorize($account_id, $activity_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Authorization Successful';
	    	$data['message'] = 'Municipal Account Successful authorized';
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Authorization Failure';
	    	$data['message'] = 'Municipal Account authorization failed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

	function committ(){
		$account_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->account_m->committ($account_id, $activity_id);
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

	public function check_unique_account($value,$table){
        $id = $this->uri->segment(4); 
        $this->form_validation->set_message('check_unique_account', 'The %s field must contain a unique value');
        if ($id){
        	$municipal_id = $this->input->post('municipal_id', TRUE);
            $this->db->where('municipal_id <>',$municipal_id);
            $this->db->where('account', $value);
            $query = $this->db->get('municipal_accounts');
            if($query->num_rows() === 0){
            
	        	$account = $this->input->post('account', TRUE);
	        	$saved_account = $this->account_m->get_value($id, 'account');
	        	if($account <> $saved_account){
	        		$this->db->where('account', $account);
	        		$this->db->where('status', ACTIVE_DATA);
	        		$query = $this->db->get('municipal_accounts');
	        		return ($query->num_rows() === 0);
	        	}
	        	return true;
            }
            return false;
        }else{
            $this->db->where('account', $value);
            $query = $this->db->get('municipal_accounts');
            return $query->num_rows() === 0;
        }
        
    }
}