<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Teller_assignment_m extends MY_Model
{
    protected $_table_name = 'teller_assignment';
    protected $_primary_key = 'assignment_id';
    protected $_order_by = 'created desc';
    public $fields = array('teller_account', 'pos_id', 'teller_limit');

    function __construct(){
        parent::__construct();
        $this->data_status = FALSE;
        $this->_timestamps = FALSE;
        $this->dual_control = FALSE;
    }

    function get_assignments(){
        $this->db->from($this->_table_name);
        $this->db->join('pos', 'pos.pos_id = '.$this->_table_name.'.pos_id');
        $this->db->join('pos_teller', 'pos_teller.teller_account = '.$this->_table_name.'.teller_account');
        $this->db->join('municipal', 'municipal.municipal_id = pos.municipal_id');
        $this->db->select($this->_table_name.'.*, '.$this->_table_name.'.teller_account AS account, '.$this->_table_name.'.created AS assigned,municipal_name, full_name, pos_name, device_imei');
        $this->db->where('pos_teller.status', ACTIVE_DATA);
        $this->db->where('municipal.status', ACTIVE_DATA);
        if($this->user_m->role_id != SADMIN){
            $this->db->where('municipal.municipal_id', $this->user_m->municipal_id);
        }
        return $this->db->get()->result_array();
    }

}