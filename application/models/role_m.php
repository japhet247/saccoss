<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Role_M extends MY_Model
{
	protected $_table_name = 'user_role';
	protected $_primary_key = 'role_id';
	protected $_order_by = 'role_id';
	public $data_status = TRUE;
	public $fields = array('name', 'description', 'permission_ids');

	function __construct(){
		parent::__construct();
	}

	function create(){

		$this->load->model('activity_m');
		$this->load->model('permission_map_m', 'map_m');	

		$this->db->trans_start();
		//save profile/role
		$posted = $this->get_posts();
		$permission_ids = $posted['permission_ids'];
		unset($posted['permission_ids']);

		$role_id = $this->save($posted);

		//save permissions
		foreach($permission_ids as $p){
			$permission_map['role_id'] = $role_id;
			$permission_map['permission_id'] = $p;
			$this->map_m->save($permission_map);
		}

		$msg = '<strong>'.$this->user_m->full_name.'</strong> added a new profile <strong>'.$posted['name'].'</strong>';

		if($this->user_m->role_id == SADMIN){
			$this->authorize($role_id);
		}else{
			//log activity for notification
			$activity['message'] = $msg; 
			$activity['tb_name'] = 'user_role';
			$activity['activity_key'] = ACTIVITY_ADD;
			$activity['uri'] = 'role/view';
			$activity['content_id'] = $role_id;
			$activity['role_id'] = $this->user_m->role_id;
			$this->activity_m->save($activity);
		}
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return $role_id;
	}

	function edit($role_id){
		$this->load->model('activity_m');
		$this->load->model('edited_m');
		$this->load->model('permission_m');
		$this->load->model('permission_map_m', 'map_m');

		$posted = $this->get_posts();
		$permission_ids = $posted['permission_ids'];
		unset($posted['permission_ids']);
		//get edited values for message logging
		$edited_role = $this->get_edited($role_id, $posted);
		$edited_permissions = $this->map_m->get_edited($role_id, $permission_ids);
		if(($edited_role) || ($edited_permissions)){
			$this->db->trans_start();
				$this->data_status = $this->permission_m->data_status = FALSE;
				$saved_role = $this->get($role_id, TRUE);

				//save activity first
				//create activity message
				$msg = '<strong>'.$this->user_m->full_name.'</strong> Edited profile <strong>'.$saved_role['name']. '</strong> - ';
				if($edited_role){
					foreach($edited_role as $key => $edited){
						$msg .= ' ['.$this->lang->line($key). '] ';
						foreach ($edited as $k => $v) {
							$msg .= $k. ' <strong>' .$v. '</strong> '; 
						}
					}
				}

				if($edited_permissions){
					if($edited_permissions['added']) $msg .= ' Added '.count($edited_permissions['added']) .' new permisssions';
					if($edited_permissions['removed']) $msg .= ' Removed '.count($edited_permissions['removed']) .' permisssions';
				}
				if($this->user_m->role_id == SADMIN){
					//save directly
					$this->save($posted, $role_id);
					//update permissions
					$this->map_m->delete(false, false, array('role_id' => $role_id));
					foreach($permission_ids as $p){
						$permission_map['role_id'] = $role_id;
						$permission_map['permission_id'] = $p;
						$this->map_m->save($permission_map);
					}

				}else{

					$activity['message'] = $msg; 
					$activity['tb_name'] = 'user_role';
					$activity['activity_key'] = ACTIVITY_EDIT;
					$activity['uri'] = 'role/view';
					$activity['content_id'] = $role_id;
					$activity['role_id'] = $this->user_m->role_id;
					$activity_id = $this->activity_m->save($activity);

					foreach ($posted as $key => $value) {
						$data['tb_column'] = $key;
						$data['tb_value'] = $value;
						$data['created_by'] = $this->user_m->user_id;
						$data['activity_id'] = $activity_id;
						$this->edited_m->save($data);
					}
					
					foreach ($permission_ids as $p) {
						$data['tb_column'] = 'permission_id';
						$data['tb_value'] = $p;
						$data['created_by'] = $this->user_m->user_id;
						$data['activity_id'] = $activity_id;
						$this->edited_m->save($data);
					}
					
				}
			$this->db->trans_complete();
			$this->user_m->grab_trail_message($msg);
		}
	}

	function get_edited($id, $posted){
		unset($this->fields[2]);
		return parent::get_edited($id, $posted);
	}

	function prepare_edited($id, $activity_id){
		$this->load->model('permission_map_m', 'map_m');
		$this->load->model('permission_m');
    	$posted = $this->get_posted_from_activity($activity_id);
    	$edited_perms = $this->map_m->get_edited($id, $posted['permission_ids']);
    	$changes = array();
    	$edited_role = $this->get_edited($id, $posted['role']);
    	if($edited_role){
	    	foreach ($edited_role as $key => $value) {
	    		foreach($value as $k => $v){
	    			if($k == 'To') $changes[$key] = $v;
	    		}
	    	}
    	}
    	if($edited_perms){
	    	$temp = array();
	    	foreach($edited_perms as $key => $value){
	    		$temp2 = array();
	    		foreach ($value as $v) {
	    			$temp2[] = $this->permission_m->get_value($v, 'permission');	
	    		}
	    		(empty($temp2)) || $temp[$key] = $temp2;
	    	}
	    	$changes['permissions'] = $temp;
    	}
    	return $changes;
    }

    function committ($id, $activity_id){
    	$this->load->model('activity_m');
    	$this->load->model('edited_m');
    	$this->load->model('permission_map_m', 'map_m');
    	unset($this->fields['permission_ids']);
    	$formatted = $this->get_posted_from_activity($activity_id);
    	$data['status'] = ACTIVE_DATA;
		$data['authorised_by'] = $this->user_m->user_id;
		$data['authorised'] = $this->GT();
    	$this->db->trans_start();
	    	$result = $this->save($formatted['role'], $id);
	    	//update permissions
			$this->map_m->delete(false, false, array('role_id' => $id));
			foreach($formatted['permission_ids'] as $p){
				$permission_map['role_id'] = $id;
				$permission_map['permission_id'] = $p;
				$this->map_m->save($permission_map);
			}
			$msg = 'Authorized Activity -- <strong>'.$this->tb_value(array('activity_id'=>$activity_id), 'activity', 'message').'</strong>';
			$this->activity_m->save($data, $activity_id);
			$this->edited_m->delete(false, false, array('activity_id' => $activity_id));
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return $result;
    }

    function get_posted_from_activity($activity_id){
    	$this->load->model('edited_m');
    	$edited = $this->edited_m->get_by(array('activity_id' => $activity_id));
    	unset($this->fields[2]);
    	$fields = $this->fields;
    	$role = array();
    	foreach($fields as $field){
    		foreach($edited as $e){
    			if($field == $e['tb_column']) $role[$field] = $e['tb_value'];
    		}
    	}
    	$permission_ids = array();
    	foreach($edited as $e){
    		if($e['tb_column'] == 'permission_id') $permission_ids[] = $e['tb_value'];
    	}
    	return array('role' => $role, 'permission_ids' => $permission_ids);
    }

    function get_roles(){
    	return $this->role_m->get_by(array('name != ' => 'SADMIN', 'role_id != ' => $this->user_m->role_id ));
    }

	function get_new(){
		$role = array();
		$role['role_id'] = '';
		$role['name'] = '';
		$role['description'] = '';
		return $role;
	}

}
