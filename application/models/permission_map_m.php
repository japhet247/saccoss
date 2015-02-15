<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission_map_M extends MY_Model
{
	protected $_table_name = 'permission_map';
	protected $_primary_key = 'map_id';
	protected $_order_by = 'map_id';
	public $data_status = FALSE;
	protected $_timestamps = FALSE;
	protected $dual_control = FALSE;
	protected $generate_id = FALSE;

	function __construct(){
		parent::__construct();
	}

	function get_edited($id, $posted){
		if($id){
			$this->load->model('permission_m');
			$this->permission_m->data_status = FALSE;
			$current = $this->permission_m->get_permissions($id);

			$temp = array();
			foreach($current as $c){
				$temp[] = $c['permission_id'];
			}
			$current = $temp;
			//check for removed permissions
			foreach($temp as $key => $c){
				if(in_array($c, $posted)) unset($temp[$key]);
			}
			$removed = $temp;
			$temp = $posted;
			//check for added permissions
			foreach($temp as $key => $value){
				if(in_array($value, $current)) unset($temp[$key]);
			}
			$added = $temp;
			if(empty($removed) && (empty($added))) return false;

			return array('added' => $added, 'removed' => $removed);
		}else{
			return false;
		}
	}

}