<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_attempt_m extends MY_Model
{
    
    protected $_table_name = 'login_attempt';
    protected $_primary_key = 'id';
    protected $_order_by = 'id desc';

    function __construct(){
        parent::__construct();
        $this->data_status = FALSE;
        $this->_timestamps = FALSE;
        $this->dual_control = FALSE;
        $this->generate_id = FALSE;
    }
    
    function set_attempt(){
        $exp_time = date('Y-m-d H:i:s', strtotime('+1 hour'));
        $username = $this->input->post('username');
        $data = array(
                'ip_address'=>$this->input->ip_address(), 
                'username' => $username,
                'expiration_time' => $exp_time
                );
        $this->save($data);
        (!$this->has_exceded('', $username)) || $this->block($username);
    }
    
    function count_attempts($ip_address, $username){
        $this->db->where('ip_address', $ip_address);
        $this->db->or_where('username', $username);
        return $this->db->get($this->_table_name)->num_rows();
    }
    
    function has_exceded($ip_address,$username='', $limit = 3){
        
        return ($this->count_attempts($ip_address, $username) >= $limit) ? true : false; 
    }
     
    function clear_expired($username = false){
        if($username){
            $this->db->where('username', $username);
            $current_time = date('Y-m-d H:i:s', time());
            $this->db->or_where('expiration_time <=', $current_time);
            $this->db->delete($this->_table_name);
        }else{
            $current_time = date('Y-m-d H:i:s', time());
            $this->db->where('expiration_time <=', $current_time);
            $this->db->delete($this->_table_name);
        }
    }

    function block($username){
        $this->db->where('username', $username);
        $this->db->update('user_credentials', array('status' => BLOCKED));
    }

}