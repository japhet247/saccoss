<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Assign extends MY_Controller {

	function __construct(){
		parent::__construct();
		$this->load->model('teller_assignment_m', 'assign_m');
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
		}else{
			$this->data['message'] = $this->assign_m->set_errors();
		}

		$page_title = 'Assign POS to Tellers';
		$this->data['title'] = $title;
		$this->data['page_title'] = $page_title;
		$this->twig->display('forms/pos_assignment.html.twig', $this->data);	
	}

	function remove($assign_id){

	}

	function 

}