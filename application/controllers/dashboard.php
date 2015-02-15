<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends MY_Controller {


    function __construct() {
		parent::__construct('view dashboard');
	}
    
    function logout(){
        $msg = 'Logged Out of the system';
        $data = array(
                'message' => $msg,
                'user_id' => $this->user_m->user_id,
                'ip'=> get_client_ip(),
                'registered' => date('Y-m-d H:i:s')
            );
        $this->db->insert('audit_trail', $data);
        $this->session->sess_destroy();
        redirect('/');
    }
    
    function index(){
        $this->load->model('dashboard_m');
        $dashboard = $this->dashboard_m->get_dashboard();
        $this->data['tabs'] = $dashboard['tabs'];
        $this->data['dashboard_links'] = $dashboard['dashboard_links'];
        $this->data['title'] = 'dashboard';
        $this->data['page_title'] = 'Welcome , '.$this->user_m->full_name;
        $this->twig->display('dashboard.html.twig', $this->data);
    }

    function change_password(){
        if($this->form_validation->run('change_pwd_form') == FALSE){

        }else{
            $this->data['message'] = $this->user_m->set_change_pwd_errors();
        }
        $this->data['title'] = 'Change Password';
        $this->data['page_title'] = 'Change Password';
        $this->twig->display('forms/change_pwd.html.twig', $this->data);
    }

    function statistics(){
        $this->load->model('dashboard_m');
        $this->data['title'] = 'System Stats';
        $this->data['line']= $this->dashboard_m->get_charges();
        $this->twig->display('statistics.html.twig', $this->data);
    }

}