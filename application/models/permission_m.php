<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission_M extends MY_Model
{
	protected $_table_name = 'permission';
	protected $_primary_key = 'permission_id';
	protected $_order_by = 'permission_id';
	protected $permission_map = 'permission_map';

	function __construct(){
		parent::__construct();
		$this->data_status = FALSE;
	}

	function get_permissions($role_id = false , $attr = false){
		if($role_id){
			$this->db->where('role_id', $role_id);
			$this->db->join($this->_table_name, $this->_table_name.'.permission_id = '.$this->permission_map.'.permission_id');
			if($attr){
				$this->db->select($attr);
			}else{
				$this->db->select($this->_table_name.'.permission_id, permission, category');
			}
			$query = $this->db->get($this->permission_map);
			$permissions = $query->result_array();
		}else{
			$permissions = $this->get();
		}
		return $permissions;
	}

	function prepare_permission($permissions){
		$categories = $this->get_permission_category();
			$data = array();
			foreach($categories as $c){
				$temp = array();
				foreach($permissions as $p){
					if($p['category'] == $c['category']){
						$temp[] = $p;
					}
				}
				$data[$c['category']] = $temp;
			}
			return $data;
	}

	function get_permission_category(){
		$this->db->select('category, permission_id');
		$this->db->distinct();
		$this->db->order_by('permission_id asc');
		return $this->db->get($this->_table_name)->result_array();
	}


}