<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Cards_m extends MY_Model
{
    protected $_table_name = 'blocked_cards';
    protected $_primary_key = 'id';
    protected $_order_by = 'reg_date desc';

    function __construct(){
        parent::__construct();
        $this->data_status = FALSE;
        $this->_timestamps = FALSE;
        $this->dual_control = FALSE;
        $this->generate_id = FALSE;
    }
    
}