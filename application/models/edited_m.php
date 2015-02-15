<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Edited_M extends MY_Model
{
	protected $_table_name = 'edited';
	protected $_primary_key = 'edited_id';
	protected $_order_by = 'edited_id desc';

	function __construct(){
		parent::__construct();
		$this->data_status = FALSE;
		$this->_timestamps = FALSE;
		$this->dual_control = FALSE;
		$this->generate_id = FALSE;
	}

	function commit($activity_id, $author_id){
		//committ edited
	}
}