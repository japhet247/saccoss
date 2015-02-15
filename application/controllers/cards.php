<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cards extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('cards_m');
		$this->load->model('vault_card_m', 'vault_m');
	}

	function save(){
		has_function_access('add vault cards');
		$this->data['supervisors'] = $this->user_m->get_users(false, true, array('user.role_id'=>SUPERVISOR));
		
		//adding data
		$this->data['title'] = 'Add New Vault Card';
		$this->data['card'] = $this->vault_m->get_new();
		if($this->form_validation->run('vault_card_form') == TRUE){

			$this->vault_m->create();

			if($this->user_m->role_id == SADMIN) { 
				$msg = 'Vault Card Successful Added and Authorized';
				$this->set_redirect_msg($msg);
				redirect('en/cards/all'); 
			}else{ 
				$msg = 'Vault Card Successful added and activity logged for authorization.';
				$this->set_redirect_msg($msg);
				redirect('en/activity/pending'); 
			}
			 
		}else{
			$this->data['error'] = $this->vault_m->set_errors();	
		}
        $this->data['page_title'] = 'Fill the Form Below';
        $this->twig->display('forms/add_vault_card.html.twig', $this->data);
	}

	function view(){
		has_function_access('view cards');
		$card_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		if(!$activity_id){
			$data['editable'] = TRUE;
			$card = $this->vault_m->get($card_id, true);
			($card) || show_error('Card Not Found', 404);
			$card['authorised_by'] = ($card['authorised_by']) ? $this->user_m->get_value($card['authorised_by'], 'full_name') : "";
		}else{
			//get the activity 
			$this->load->model('activity_m');
			$activity = $this->activity_m->get($activity_id, TRUE);
			(!empty($activity)) || show_error('Activity Not Found', 404);
			$this->vault_m->data_status = FALSE;
			$card = $this->vault_m->get($card_id, true);
			($card) || show_error('Card Not Found', 404);
			if($activity['status'] == ACTIVE_DATA){
				$card['authorised_by'] = ($card['authorised_by']) ? $this->user_m->get_value($card['authorised_by'], 'full_name') : "";
			}elseif(($activity['status'] == REJECTED_DATA)){
				$data['unauthorised'] = FALSE;
				$data['rejected'] = TRUE;
				$card['authorised_by'] = ($card['authorised_by']) ? $this->user_m->get_value($card['authorised_by'], 'full_name') : "";
				$card['rejected_by'] = ($activity['rejected_by']) ? $this->user_m->get_value($activity['rejected_by'], 'full_name') : "";
				$card['rejected'] = $activity['rejected'];
			}else{
				$card['authorised_by'] = ($card['authorised_by']) ? $this->user_m->get_value($card['authorised_by'], 'full_name') : "";
				$data['activity_id'] = $activity_id;
				$data['unauthorized'] = TRUE;
				if($activity['activity_key'] == ACTIVITY_EDIT){
					$data['activity_key'] = 'edit';
				}
			}
		}
		$card['created_by'] = ($card['created_by']) ? $this->user_m->get_value($card['created_by'], 'full_name') : "";
		$card['supervisor'] = $this->user_m->get_value($card['user_id'], 'full_name');
		$data['card'] = $card;
		$data['data_content'] = 'includes/card_profile';
		$this->twig->display('iframe.html.twig', $data);
	}

	function authorize(){
		has_function_access('add vault cards');
		$card_id = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$saved = $this->vault_m->authorize($card_id, $activity_id);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Authorization Successful';
	    	$data['message'] = 'Vault Account Successful authorized';
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Authorization Failure';
	    	$data['message'] = 'Vault Account authorization failed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

	function remove($card_id){
		has_function_access('remove vault cards');
		$card = $this->vault_m->get($card_id, TRUE);
		$saved = $this->vault_m->delete($card_id, false);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Success';
	    	$data['message'] = 'Vault Card Successful removed';
	    	$msg = 'Removed Vault Card No <strong>'.$card['card_no'].'</strong>';
	    	$this->user_m->grab_trail_message($msg);
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Failure';
	    	$data['message'] = 'Vault Card could not be removed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}

	function all(){
		has_function_access('view vault cards');
		$this->data['columns'] = array('full_name', 'account_no',  'card_no', 'created');
		$this->data['rows'] = $this->vault_m->get_cards();
		$this->data['action_btn'] = TRUE;
		//$this->data['hide_nav'] = TRUE;
		$this->data['title'] = 'All Vault Cards';
        $this->data['table_title'] = 'tb_vault_cards';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function blocked(){
		has_function_access('block cards');
		$this->data['columns'] = array('card_no', 'reg_date');
		$this->data['rows'] = $this->cards_m->get();
		$this->data['action_btn'] = TRUE;
		$this->data['title'] = 'Blocked Cards';
        $this->data['table_title'] = 'tb_blocked_cards';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function unblock($card_no){
		has_function_access('block cards');
		$card = $this->cards_m->get_by(array('card_no' => $card_no), TRUE);
		if($card){
			$msg = '<strong>'.$this->user_m->full_name.'</strong> Unblocked Card <strong>'.$card_no.'</strong>';
			if($this->user_m->role_id == SADMIN){
				$this->cards_m->delete($card['id'], false);
			}else{
				$this->load->model('activity_m');
				
				$activity['message'] = $msg; 
				$activity['tb_name'] = 'user';
				$activity['activity_key'] = UNBLOCK_CARD;
				$activity['uri'] = 'activity/pending';
				$activity['content_id'] = $card_no;
				$activity['role_id'] = $this->user_m->role_id;
				$reply = $this->activity_m->save($activity);
			}
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Success';
	    	$data['message'] = ($this->user_m->role_id == SADMIN) ? 'Card Successful unblocked' : 'Activity Logged. Card will be unblocked once this activity is authorized.';
			$this->user_m->grab_trail_message($msg);
		}else{
			$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Failure';
	    	$data['message'] = 'User could not be found';
		}
		
		$this->twig->display('message.html.twig', $data);
	}

	function unblock_committ(){
		has_function_access('block cards');
		$card_no = $this->uri->segment(4);
		$activity_id = $this->uri->segment(5);
		$card = $this->cards_m->get_by(array('card_no' => $card_no), TRUE);
		if($card){
			$this->cards_m->delete($card['id'], false);
			$this->load->model('activity_m');
			$this->activity_m->save(array('status' => ACTIVE_DATA, 'authorised_by' => $this->user_m->user_id, 'authorised' => $this->cards_m->GT()), $activity_id);
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Success';
	    	$data['message'] = 'Card Successful Unblocked';
	    	$msg = 'Authorized Activity -- <strong>'.$this->cards_m->tb_value(array('activity_id'=>$activity_id), 'activity', 'message').'</strong>';
    		$this->user_m->grab_trail_message($msg);
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Failure';
	    	$data['message'] = 'Card could not be unblocked';
    	}
    	$this->twig->display('message.html.twig', $data);
	}
}