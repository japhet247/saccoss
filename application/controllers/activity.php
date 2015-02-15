<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Activity extends MY_Controller {

	public $role_id;

	function __construct(){
		parent::__construct();
		$this->load->model('activity_m');
		$this->role_id = $this->user_m->role_id;
	}

	function reject_form(){
		$activity_id = $this->uri->segment(4);
		$data['url'] = 'en/activity/reject/'.$activity_id;
		$data['title'] = 'Provide Rejection reason';
		$this->twig->display('forms/reject_form.html.twig' , $data);
	}

	function reject(){
		$activity_id = $this->uri->segment(4);
		if($this->form_validation->run('reject_form') == TRUE){
			$comment = $this->input->post('comment');
			$this->activity_m->reject($activity_id, $comment);
			$data['title'] = 'Activity successfully rejected';
			$data['message_type'] = 'success';
			$data['message'] = $data['title'];
			$data['close'] = TRUE;
			$data['reload'] = TRUE;
			$this->twig->display('message.html.twig', $data);
		}else{
			$data['title'] = 'Activity Rejection failure';
			$data['url'] = 'en/activity/reject/'.$activity_id;
			$data['error'] = $this->activity_m->custom_msg(form_error('comment'), 'danger');
			$this->twig->display('forms/reject_form.html.twig' , $data);
		}
	}

	function authorized(){
		//get a list of all authorized activites
		$this->data['columns'] = array('authorised_by', 'message','created', 'authorised');
		$temp = $this->activity_m->get_activity(ACTIVE_DATA, $this->role_id);
		$i = 0;
		foreach($temp as $t){
			$t['authorised_by'] = ($t['authorised_by']) ? $this->user_m->get_value($t['authorised_by'], 'full_name') : "";
			$temp[$i] = $t;
			$i++;
		}
		$this->data['rows'] = $temp;
		$this->data['action_btn'] = TRUE;
		$this->data['hide_nav'] = TRUE;
		$this->data['title'] = 'Authorized ctivities';
        $this->data['table_title'] = 'tb_authorized_activities';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function pending(){
		//get all pending activities
		$this->data['columns'] = array('created_by', 'message','created');
		$temp = $this->activity_m->get_activity(UNAUTHORISED_DATA, $this->role_id);
		$i = 0;
		foreach($temp as $t){
			$t['created_by'] = ($t['created_by']) ? $this->user_m->get_value($t['created_by'], 'full_name') : "";
			$temp[$i] = $t;
			$i++;
		}
		$this->data['rows'] = $temp;
		$this->data['action_btn'] = TRUE;
		$this->data['hide_nav'] = TRUE;
		$this->data['title'] = 'Pending activities';
        $this->data['table_title'] = 'tb_pending_activities';
        $this->twig->display('site_table.html.twig', $this->data);
	}

	function failed(){
		//get all failed activities
		$this->data['columns'] = array('rejected_by', 'message','created', 'rejected');
		$temp = $this->activity_m->get_activity(REJECTED_DATA, $this->role_id);
		$i = 0;
		foreach($temp as $t){
			$t['rejected_by'] = ($t['rejected_by']) ? $this->user_m->get_value($t['rejected_by'], 'full_name') : "";
			$temp[$i] = $t;
			$i++;
		}
		$this->data['rows'] = $temp;
		$this->data['action_btn'] = TRUE;
		$this->data['hide_nav'] = TRUE;
		$this->data['title'] = 'Failed ctivities';
        $this->data['table_title'] = 'tb_failed_activities';
        $this->twig->display('site_table.html.twig', $this->data);
	}
}
