<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assignment extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('teller_assignment_m', 'assign_m');
	}

	function index(){
		has_function_access('view pos assignment');
		$this->data['columns'] = array('full_name', 'account' , 'teller_limit', 'municipal_name',  'created');
		$this->data['hide_nav'] = TRUE;
		$this->data['rows'] = $this->assign_m->get_assignments();
		$this->data['title'] = 'POS Assignment';
		$this->data['action_btn'] = TRUE;
        $this->data['table_title'] = 'tb_pos_assignment';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function pos(){
		has_function_access('assign pos');
		$this->load->model('teller_m');
		$this->load->model('pos_m');
		$title = 'Assign POS';
		
		if($this->user_m->role_id == SADMIN){
			$this->data['terminals'] = $this->pos_m->get();
			$this->data['tellers'] = $this->teller_m->get();
		}else{
			$this->data['terminals'] = $this->pos_m->get_by(array('municipal_id'=>$this->user_m->municipal_id));
			$this->data['tellers'] = $this->teller_m->get_by(array('municipal_id'=>$this->user_m->municipal_id));
		}

		$this->data['assignment'] = $this->assign_m->get_new();

		if($this->form_validation->run('teller_assignment') == TRUE){
			$assign = $this->assign_m->get_posts();
			$assign['created'] = $this->assign_m->GT();
			$assign['created_by'] = $this->user_m->user_id;
			$this->assign_m->save($assign);
			$msg = 'POS Successful Assigned';
			$this->set_redirect_msg($msg); 
			$teller = $this->teller_m->get_by(array('teller_account' => $assign['teller_account']), TRUE);
			$msg = 'Assigned POS <strong>'.$this->assign_m->tb_value(array('pos_id'=>$assign['pos_id']), 'pos', 'pos_name').'</strong> 
			to <strong>'.$teller['full_name'].' - '.$assign['teller_account']. '</strong> with Limit <strong>'.$assign['teller_limit'].'</strong>';
			$this->user_m->grab_trail_message($msg);
			redirect('en/assignment');
		}else{
			$this->data['message'] = $this->assign_m->set_errors();
		}

		$page_title = 'Assign POS to Tellers';
		$this->data['title'] = $title;
		$this->data['page_title'] = $page_title;
		$this->twig->display('forms/pos_assignment.html.twig', $this->data);	
	}

	function remove($assign_id){
		has_function_access('remove pos assignment');
		$assignment = $this->assign_m->get($assign_id, TRUE);
		$saved = $this->assign_m->delete($assign_id, false);
		if($saved){
	    	$data['message_type'] = 'success';
	    	$data['close'] = TRUE;
	    	$data['reload'] = TRUE;
	    	$data['title'] = 'Success';
	    	$data['message'] = 'POS Assignment Successful removed';
	    	$msg  = 'Removed POS Assignment for POS <strong>'.$this->assign_m->tb_value(array('pos_id'=>$assignment['pos_id']), 'pos', 'pos_name').'</strong> 
	    	with teller Account <strong>'.$assignment['teller_account'].'</strong> Limit <strong>'.$assignment['teller_limit'].'</strong>';
    		$this->user_m->grab_trail_message($msg);
    	}else{
    		$data['message_type'] = 'error';
	    	$data['close'] = TRUE;
	    	$data['title'] = 'Failure';
	    	$data['message'] = 'POS Assignment could not be removed';
    	}
    	$this->twig->display('message.html.twig', $data);
	}



}