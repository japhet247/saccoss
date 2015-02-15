<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Municipal_M extends MY_Model
{
	
	protected $_table_name = 'municipal';
	protected $_order_by = 'created desc';
	protected $_primary_key = 'municipal_id';
	public $fields = array('municipal_name', 'region', 'sortcode', 'collection_account', 'address' ,'telephone', 'fax');

	function __construct() {
		parent::__construct();
	}

	function create(){
		$this->load->model('activity_m');
		$this->db->trans_start();
			$posted = $this->get_posts();
			$municipal_id = $this->save($posted);
			$msg = '<strong>'.$this->user_m->full_name.'</strong> added a new Municipal <strong>'.$posted['municipal_name'].'</strong>';
			if($this->user_m->role_id == SADMIN){
				$this->authorize($municipal_id);
			}else{
				//log activity for notification
				$activity['message'] = $msg; 
				$activity['tb_name'] = 'municipal';
				$activity['activity_key'] = ACTIVITY_ADD;
				$activity['uri'] = 'municipal/view';
				$activity['content_id'] = $municipal_id;
				$activity['role_id'] = $this->user_m->role_id;
				$this->activity_m->save($activity);
			}
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return $municipal_id;
	}

	function edit($municipal_id){
		$this->load->model('activity_m');
		$this->load->model('edited_m');
		$posted = $this->get_posts();
		$edited_municipal = $this->get_edited($municipal_id, $posted);
		if($edited_municipal){
			$this->db->trans_start();
			$this->data_status = FALSE;
			$municipal_name = $this->get_value($municipal_id, 'municipal_name');
			$msg = '<strong>'.$this->user_m->full_name.'</strong> Edited Municipal <strong>'.$municipal_name. '</strong> - ';
			
			foreach($edited_municipal as $key => $edited){
				$msg .= ' ['.$this->lang->line($key). '] ';
				if($key == 'region'){
					foreach ($edited as $k => $v) {
						$msg .= $k. ' <strong>' .$this->tb_value(array('option_id' => $v), 'form_options', 'descrption'). '</strong> '; 
					}
				}elseif($key == 'sortcode'){
					foreach ($edited as $k => $v) {
						$msg .= $k. ' <strong>' .$this->tb_value(array('sortcode' => $v), 'branch', 'branch_name'). '</strong> '; 
					}
				}
				else{
					foreach ($edited as $k => $v) {
						$msg .= $k. ' <strong>' .$v. '</strong> '; 
					}
				}
			}

			if($this->user_m->role_id == SADMIN){
				//save directly
				$this->save($posted, $municipal_id);	
			}else{
				$activity['message'] = $msg; 
				$activity['tb_name'] = 'municipal';
				$activity['activity_key'] = ACTIVITY_EDIT;
				$activity['uri'] = 'municipal/view';
				$activity['content_id'] = $municipal_id;
				$activity['role_id'] = $this->user_m->role_id;
				$activity_id = $this->activity_m->save($activity);

				foreach ($posted as $key => $value) {
					$data['tb_column'] = $key;
					$data['tb_value'] = $value;
					$data['created_by'] = $this->user_m->user_id;
					$data['activity_id'] = $activity_id;
					$this->edited_m->save($data);
				}
			}
			$this->db->trans_complete();
			$this->user_m->grab_trail_message($msg);
		}
	}

	function prepare_municipals(){
		$municipals = $this->get();
		$regions = $this->get_form_options(false, 'regions');
		$temp = array();
		foreach($regions as $r){
			foreach($municipals as $m){
				if($r['option_id'] == $m['region']) $temp[$r['descrption']][] = $m;
			}
		}
		return $temp;
	}

}