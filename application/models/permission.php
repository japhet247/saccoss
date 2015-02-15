<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Permission extends MY_Model
{
	protected $_table_name = 'permission';
	protected $_order_by = 'permission_id';
	public $data_status = FALSE;
	protected $_timestamps = FALSE;
	protected $dual_control = FALSE;
	protected $generate_id = FALSE;

	function __construct(){
		parent::__construct();
	}

}