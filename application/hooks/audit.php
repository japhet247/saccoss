<?php if(!defined('BASEPATH')) exit('No direct script access allowed');
class Audit {
    public function trail($params) {
        // We need an instance of CI as we will be using some CI classes
        $CI =& get_instance();
 
        // Start off with the session stuff we know
        $data = array();
        $data['user_id'] = $CI->session->userdata('user_id');
        $controller = $CI->router->class;
 
        if(in_array($controller, $params)){
            return;
        }
        
        // Lastly, we need to know when this is happening
        $data['registered'] = date('Y-m-d H:i:s');
     
        // set the message
        $message = $CI->session->userdata('trail_message');
        $data['message'] = (isset($message)) ? $message : '0';
        
        $data['ip'] = get_client_ip();
 
        // And write it to the database
        if($data['message'] != '0'){
            $CI->db->insert('audit_trail', $data);
            $CI->session->unset_userdata('trail_message');
        }
        
    }
}