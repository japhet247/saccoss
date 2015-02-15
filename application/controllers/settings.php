<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Settings extends MY_Controller {

	function __construct(){
		parent::__construct('view system settings');
		$this->load->model('settings_m');
	}

	function index(){
		$this->data['settings'] = $this->settings_m->prepare_settings($this->settings_m->get());
		$this->data['title'] = 'TMS Settings';
		$this->data['page_title'] = 'System Settings';
		$this->twig->display('settings.html.twig', $this->data);
	}

	function edit(){
		$value = $this->uri->segment(5);
		$name = $this->uri->segment(4);
		$data['title'] = 'Edit '.$this->lang->line($name);
		$data['name'] = $name;
		$data['value'] = rawurldecode($value);
		$data['url'] = 'en/settings/edit/'.$name. '/'.$value;
		if($this->form_validation->run($name) == TRUE){
			//save changes
			$posted_value = $this->input->post($name);
			$this->db->trans_start();
			if($posted_value <> $data['value']){
				$msg = '<strong>'.$this->user_m->full_name. '</strong> Edited <strong>'.$this->lang->line($name).'</strong> from <strong>'.$data['value']. '</strong> To <strong>'.$posted_value.'</strong>';
				if($this->user_m->role_id == SADMIN){
					$this->settings_m->save(array('setting_value'=>$posted_value), $name);
					$data['message_type'] = 'success';
			    	$data['close'] = TRUE;
			    	$data['reload'] = TRUE;
			    	$data['title'] = 'Success';
			    	$data['message'] = 'Changes successfully saved.';
			    	$this->twig->display('message.html.twig', $data);
				}else{
					//log activity
					$this->load->model('activity_m');
					$this->load->model('edited_m');
					$activity['message'] = $msg; 
					$activity['tb_name'] = 'tms_settings';
					$activity['activity_key'] = SETTINGS_EDIT;
					$activity['uri'] = 'activity/pending';
					$activity['content_id'] = $name;
					$activity['role_id'] = $this->user_m->role_id;
					$activity_id = $this->activity_m->save($activity);
					$edata['tb_column'] = 'setting_value';
					$edata['tb_value'] = $posted_value;
					$edata['created_by'] = $this->user_m->user_id;
					$edata['activity_id'] = $activity_id;
					$this->edited_m->save($edata);

					$data['message_type'] = 'success';
			    	$data['close'] = TRUE;
			    	$data['reload'] = TRUE;
			    	$data['title'] = 'Success';
			    	$data['message'] = 'Changes successfully logged. Changes will be committed once authorised.';
			    	$this->twig->display('message.html.twig', $data);
					
				}
				$this->user_m->grab_trail_message($msg);
			}else{
				$data['error'] = $this->settings_m->custom_msg('No changes Made', 'danger');
				$this->twig->display('forms/setting.html.twig', $data);
			}
			$this->db->trans_complete();
		}else{
			$error = form_error($name);
			(!$error) || $data['error'] = $this->settings_m->custom_msg($error, 'danger');
			$this->twig->display('forms/setting.html.twig', $data);
		}
	}

	function committ(){
		has_function_access('edit system settings');
		$activity_id = $this->uri->segment(5);
		$saved = $this->settings_m->committ($activity_id);
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