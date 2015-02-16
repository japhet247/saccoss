<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {


    function __construct() {
		parent::__construct();
        //$this->load->model('user_m');
	}
    
    function index(){
            /*//clear expired attempts
            $this->load->model('login_attempt_m', 'attempt');
            $this->attempt->clear_expired();
            if($this->form_validation->run('login_form') == FALSE){
                $data['title'] = 'Login';
                $this->twig->display('login.html.twig', $data);
            }else{
                //check credentials
                //if failed log attempt
                //check number of attempts
                //if exceeded lock user
                //check user status
                $result = $this->user_m->login();
                $username =$this->input->post('username');
                if(!$result){
                    $this->attempt->set_attempt($username);
                    (!$this->attempt->has_exceded('', $username)) || show_error('Access Denied. Login Attempts exceeded', 403);
                    $data['title'] = 'Error';
                    $data['message'] = $this->user_m->custom_msg('Unknown username or password', 'danger');
                    $this->twig->display('login.html.twig', $data);
                }
                else{
                    if($result['status'] == BLOCKED){
                        show_error('Access Denied. Account Blocked', 403);
                    }elseif($result['status'] == AUTHORISED){
                        $this->load->model('user_activation_m', 'activate');
                        $key = $this->activate->get_value($result['user_id'], 'activation_key');
                        redirect('en/login/activate/'.$key);
                    }
                    $this->attempt->clear_expired($username);
                    $msg = 'Logged into the system';
                    $this->user_m->grab_trail_message($msg);
                    redirect('en/dashboard');  
                }
                
            }*/
			$this->load->view('welcome_message');
        
    }
    
    
    
    
    function activate(){
        $activation_key = $this->uri->segment(4);
        if($activation_key){
            $this->load->model('user_activation_m', 'activate');
            $key = $this->activate->is_valid_key($activation_key);
            if($key){
                $this->session->set_userdata(array('user_reset_id'=>$key['user_id']));
                $data['title'] = 'Password Reset';
                $this->twig->display('reset_password.html.twig', $data);
            }else{
                show_error('Access Denied.<br> Activation key expired or Invalid<br> Contact system admin for help.', 403);
            }
        }else show_error('Invalid Activation key', 403);
    }
    
    /*function reset(){
        $user_id = $this->session->userdata('user_reset_id');
        $this->load->model('user_activation_m', 'activate');
        if($user_id){
            $this->load->model('login_m');
            if($this->form_validation->run('pwd_reset_form') == true){
               if($this->login_m->reset_password($user_id)){
                    $this->session->sess_destroy();
                    
                   //force the log audit trail
                    
                    $trail_data = array(
                                            'user_id'=>$user_id,
                                            'section'=>$this->router->class,
                                            'action'=>$this->router->method,
                                            'registered'=>date('Y-m-d H:i:s'),
                                            'message' => $message,
                                            'uri'=>uri_string(),
                                            'ip'=>get_client_ip()
                                        );
                    $this->db->insert('audit_trail', $trail_data);
                    $this->activate->remove_key('user_id', $user_id);
                    $data['message'] = $this->login_m->custom_msg('Password Reset Success. Please Login');
                    $data['title'] = 'Success';
                    $this->twig->display('login.html.twig', $data);
               }else{
                    $data['message'] = $this->login_m->custom_msg('Password Reset Failure.','danger');
               }
               $this->session->unset_userdata('user_reset_id'); 
            }else{
               $data['message'] = $this->login_m->set_errors();
               $data['title'] = 'Error';
               $this->twig->display('reset_password.html.twig', $data);
            }
        }else{
            show_error('Access Denied',403);
        }
    }*/
    
    function forget(){
        $link = $this->uri->segment(4);
        
        if($link == 'password'){
            $data['form'] = true;
            $this->load->model('db/reset_password_m', 'reset');
            $this->reset->form = 'email_pwd_form';
            $fields = array('email');
            if($this->form_validation->run($this->reset->form) == TRUE){
                $save_data = $this->reset->array_from_post($fields);
                if($this->reset->check_email($save_data['email'])){
                    $msg = 'Further Details have been sent to your Email.';
                    $data['message']= $this->reset->custom_msg($msg, 'success');
                    $data['form'] = false;
                }else{
                    $msg = 'The email address is not Registered in our system.';
                    $data['message'] = $this->reset->custom_msg($msg, 'danger');
                }
            }else{
                $data['message'] = $this->reset->set_error($fields);
            }
            $this->load->view('email_reset_password', $data); 
        }else{
            show_404(site_url('login/forget/'.$link));
        }
    }
    
    function check_special_characters($value){
        $error = false;
        if( !preg_match("#[0-9]+#", $value) ) {
        	$error = "The %s  must include at least one number! ";
            
        }
        elseif( !preg_match("#[a-z]+#", $value) ) {
        	$error = "The %s  must include at least one letter! ";
            
        }
        
        elseif( !preg_match("#[A-Z]+#", $value) ) {
        	$error = "The %s  must include at least one CAPS! ";    
        }
        elseif( !preg_match("#\W+#", $value) ) {
        	$error = "The %s  must include at least one special character! ";
        }
        
        if($error){
            $this->form_validation->set_message('check_special_characters', $error);
            return false;
        }else{
            return true; 
        }
          
    }
    
    function lock_screen(){
        $this->load->view('lock');
    }
    
    function lock(){
        $this->session->unset_userdata('loggedin');
        $this->load->view('lock');
    }
    
    function get_last_link(){
        $this->session->set_userdata(array('last_link' => $this->input->post('last_link')));
    }
    
    function unlock(){
        $this->form_validation->set_rules('password', 'Password', 'callback__unlock_check');
	    $this->form_validation->set_error_delimiters('<div class="alert alert-danger"> <button type="button" class="close" data-dismiss="alert">x</button> <i class="fa fa-ban-circle"></i>', '</div>');
		if(!$this->session->userdata('user_id')){
            redirect('login');
        }else{
    		if($this->form_validation->run() == FALSE){
                $this->load->view('lock');
    		}else{
                $last_link = $this->session->userdata('last_link');
                $this->session->set_userdata(array('loggedin' => true));
                if($last_link){
                    redirect($last_link);
                }else{
                    redirect('dashboard');
                }
            } 
        }
    }
    
    function _unlock_check($password){
        
        if(!$this->sys_user->unlock($password)){
            $this->form_validation->set_message('_unlock_check', 'Wrong Password Try again');
            return false;
        }
        return true;
        
    }

    function generate_id(){
        echo $this->user_m->generate_id(true);
    }

    function shaone($str){
        echo sha1($str);
    }
    function time_now(){
        echo $this->user_m->GT();
    }

    function page_404(){
        show_error('Page Not Found', '404');
    }
    
    
}