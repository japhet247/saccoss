<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Signatory_map_M extends MY_Model
{
	protected $_table_name = 'map_signatories';
	protected $_primary_key = 'id';
	protected $_order_by = 'id';

	function __construct(){
		parent::__construct();
	}

	function authorize($account){
		if($account){
			//delete older
			$this->delete(false, false, array('municipal_account' => $account, 'status' => ACTIVE_DATA));
			$this->db->set(array('status' => ACTIVE_DATA));
			$this->db->where('municipal_account', $account);
			$this->db->update($this->_table_name);
		}
	}

	function get_edited($acc, $posted, $category=CATEGORY_A){
		if($acc){
			$this->data_status = FALSE;
			$current = $this->get_by(array('municipal_account'=>$acc, 'category' => $category));

			$temp = array();
			foreach($current as $c){
				$temp[] = $c['user_id'];
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