<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos_assignment_M extends MY_Model
{
	protected $_table_name = 'pos_assignment';
	protected $_primary_key = 'assign_id';
	protected $_order_by = 'assign_id';
	protected $generate_id = FALSE;

	function __construct(){
		parent::__construct();
	}

	function _authorize($pos_id){
		if($pos_id){
			//delete older
			$this->delete(false, false, array('status' => ACTIVE_DATA));
			$this->db->set(array('status' => ACTIVE_DATA));
			$this->db->where('pos_id', $pos_id);
			$this->db->update($this->_table_name);
		}
	}

	function authorize($pos_id){
		if($pos_id){
			$this->db->set(array('status' => ACTIVE_DATA));
			$this->db->where('pos_id', $pos_id);
			$this->db->update($this->_table_name);
			return true;
		}
		return false;
	}

	function get_edited($id, $posted){
		if($id){
			$this->data_status = FALSE;
			$current = $this->get_by(array('pos_id'=>$id));

			$temp = array();
			foreach($current as $c){
				$temp[] = $c['property_id'];
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