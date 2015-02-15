<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login_m extends MY_Model
{
    
    protected $_table_name = 'user_credentials';
    protected $_primary_key = 'user_id';
    protected $_order_by = 'created desc';
    public $fields = array('password', 'confirm_password');

    function __construct(){
        parent::__construct();
        $this->data_status = FALSE;
        $this->dual_control = FALSE;
        $this->generate_id = FALSE;
    }

    function login($username, $password){
        $this->db->from($this->_table_name);
        $this->db->join('user_role', 'user_role.role_id = '.$this->_table_name. '.role_id');
        $this->db->select($this->_table_name.'.*, user_role.name AS role_name');
        $this->db->where(array('username' => $username, 'password' => sha1($password)));
        $user = $this->db->get()->first_row('array');
        return (!empty($user)) ? $user : false;
    }

    function create_creds($user_id, $username , $role_id){
        
        $hashed_pwd = $this->generate_pwd();
        $data = array('user_id' => $user_id,
                'username' => $username,
                'password' => sha1($hashed_pwd),
                'status' => AUTHORISED,
                'role_id' => $role_id,
            );
        (!$this->has_credentials($user_id)) ? $this->save($data) : $this->save($data, $user_id);
        return $hashed_pwd;
    }

    function has_credentials($user_id){
        $this->db->where('user_id', $user_id);
        $query = $this->db->get($this->_table_name)->first_row('array');
        return (!empty($query)) ? TRUE : FALSE;
    }

    function reset_password($user_id){

        $posted = $this->get_posts();
        $data = array('password' => sha1($posted['password']),
                        'status' => ACTIVE,
            );
        return ($user_id) ? $this->save($data, $user_id) : FALSE;

    }

    function generate_pwd(){
        return substr($this->generate_id(TRUE), 0, 8);
    }
}