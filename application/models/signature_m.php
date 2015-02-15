<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signature_M extends MY_Model
{
	public $_table_name = 'user_signature';
	protected $_primary_key = 'sign_id';
	protected $_order_by = 'created desc';
	public $fields = array('user_id');
	public $errors = false;

	function __construct(){
		parent::__construct();
	}

	function delete($sign_id = false, $user_id = false){
		if($sign_id){
			$this->db->where('sign_id', $sign_id);
		}elseif($user_id){
			$this->db->where('user_id', $user_id);
		}else{
			return false;
		}
		$sign = $this->db->get($this->_table_name)->row_array();
		if($sign){
			unlink(SIGN_ABSOLUTE_PATH.$sign['sign_file']);
			return parent::delete($sign['sign_id'], false);
		}else{
			return false;
		}
	}

	function create(){
		$config['overwrite'] = false;
        $config['allowed_types'] = 'png|jpeg|jpg';
        $config['max_size'] = 2000;
        $config['upload_path'] = './Files/Signatures';
        $config['encrypt_name'] = true;
        $this->load->library('upload', $config);
        if (!$this->upload->do_upload()) {
            $this->errors = $this->custom_msg($this->upload->display_errors(), 'danger'); 
            return false;    
        } else {
            $file = $this->upload->data();
            $save = $this->get_posts();
            $save['sign_file'] = $file['file_name'];

            $this->db->trans_start();
            	//delete if exits
            	$this->delete(false, $save['user_id']);
	            $saved = $this->save($save);
	            $msg = '<strong>'.$this->user_m->full_name.'</strong> added a new Signature for <strong>'.$this->user_m->get_value($save['user_id'], 'full_name').'</strong>';
	            
	            if($this->user_m->role_id == SADMIN){
	            	$this->authorize($saved);
	            }else{
	            	$this->load->model('activity_m');
	            	//log activity for notification
	      
					$activity['message'] = $msg; 
					$activity['tb_name'] = $this->_table_name;
					$activity['activity_key'] = ACTIVITY_ADD;
					$activity['uri'] = 'signature/view';
					$activity['content_id'] = $saved;
					$activity['role_id'] = $this->user_m->role_id;
					$this->activity_m->save($activity);
	            }
            $this->db->trans_complete();
            $this->user_m->grab_trail_message($msg);
            return true;
        }
	}



}