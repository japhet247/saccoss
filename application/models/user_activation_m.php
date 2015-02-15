<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_activation_m extends MY_Model
{
    protected $_table_name = 'user_activation';
    protected $_primary_key = 'user_id';
    protected $_order_by = 'user_id desc';

    function __construct(){
        parent::__construct();
        $this->data_status = FALSE;
        $this->_timestamps = FALSE;
        $this->dual_control = FALSE;
        $this->generate_id = FALSE;
    }

    function generate_key($user_id){
        //remove activation key if exists
        $this->remove_key('user_id', $user_id);
        $expiration_date = date('Y-m-d H:i:s', strtotime("+1 day"));
        $activation_key = $this->generate_id();
        $data = array(
                    'user_id'=>$user_id,
                    'expiration_date'=>$expiration_date,
                    'activation_key'=>$activation_key
                );
        $this->save($data);
        return $activation_key;
    }
    
    function is_valid_key($key){
        $current_time = date('Y-m-d H:i:s',time());
        $this->db->where('activation_key', $key);
        $this->db->where('expiration_date >=', $current_time);
        $this->db->from($this->_table_name);
        $this->db->join('user_credentials', 'user_credentials.user_id = user_activation.user_id');
        $query = $this->db->get();
        $result = $query->first_row('array');
        return ($result) ? $result : false;
    }
    
    function remove_key($key, $value){
        
        $this->db->where($key,$value);  
        $this->db->delete('user_activation');
    }

    function send_creds($user_id, $resend=false){
        $this->load->model('email_m');
        $this->load->model('login_m');
        $user = $this->user_m->get($user_id, TRUE);
        $hashed = $this->login_m->create_creds($user_id, $user['email'], $user['role_id']);
        $this->generate_key($user_id);
        $this->email_m->receiver_email = $user['email'];
        $this->email_m->prepare_activation_msg($hashed, $resend);
        $this->email_m->sendEmail();
        return $hashed;
    }
}