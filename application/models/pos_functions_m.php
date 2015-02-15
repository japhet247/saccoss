<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pos_functions_M extends MY_Model
{
	protected $_table_name = 'pos_properties';
	protected $_primary_key = 'property_id';
	protected $_order_by = 'property_id';
	public $data_status = FALSE;

	function __construct(){
		parent::__construct();
	}

	function get_functions_group(){
		$this->db->select('property_group, property_id');
		$this->db->distinct();
		$this->db->order_by('property_id asc');
		return $this->db->get($this->_table_name)->result_array();
	}

	function prepare_functions($functions){
		$categories = $this->get_functions_group();
			$data = array();
			foreach($categories as $c){
				$temp = array();
				foreach($functions as $p){
					if($p['property_group'] == $c['property_group']){
						$temp[] = $p;
					}
				}
				$data[$c['property_group']] = $temp;
			}
			return $data;
	}

	function get_pos_functions($pos_id){
		$this->db->where('pos_id', $pos_id);
		$this->db->join($this->_table_name, $this->_table_name.'.property_id = pos_assignment.property_id');
		$this->db->order_by($this->_table_name.'.property_id');
		return $this->db->get('pos_assignment')->result_array();
	}
	

}