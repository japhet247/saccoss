<?php
class MY_Controller extends CI_Controller{

	public $data = array();
    public $activity_msg = 'Activity successful logged and awaiting authorization';
    
	function __construct ($controller=NULL){
		parent::__construct();
		// Login check
		$exception_uris = array(
			'login', 
			'dashboard/logout'
		);
		if (in_array(uri_string(), $exception_uris) == FALSE) {
			if ($this->user_m->loggedin() == FALSE) {
				redirect('login');
			}else{
                $this->get_notifications();
                $this->data['full_name'] = $this->user_m->full_name;
                $this->data['email'] = $this->user_m->full_name;
			     //Check permissions
                if (!$this->user_m->has_permission($controller)) show_error('Access Denied', 403 );  
			}
		}
        
        //$this->data['hide_nav'] = TRUE;
		
	}
    
    /** Functions for form validation **/
    
    public function check_unique($value,$table){
        //Get the table field and primary key
        $info = explode('.',$table);
        $id = $this->uri->segment(4); 
        $this->form_validation->set_message('check_unique', 'The %s field must contain a unique value');
        if ($id){
            $this->db->where($info[2].' <>',$id);
            $this->db->where($info[1], $value);
            $query = $this->db->get($info[0]);
            return $query->num_rows() === 0;
             
        }else{
            $this->db->where($info[1], $value);
            $query = $this->db->get($info[0]);
            return $query->num_rows() === 0;
        }
        
    }

    function check_unique_value($value, $table){
        $info = explode('.',$table);
        $id = $this->uri->segment(4); 
        $this->form_validation->set_message('check_unique_value', 'The %s field must contain a unique value');
        $status = ($info[0] == 'pos') ? 'data_status' : 'status';
        $this->db->where($status, ACTIVE_DATA);
        if ($id){
            $this->db->where($info[2].' <>',$id);
            $this->db->where($info[1], $value);
            $query = $this->db->get($info[0]);
            return $query->num_rows() === 0; 
        }else{
            $this->db->where($info[1], $value);
            $query = $this->db->get($info[0]);
            return $query->num_rows() === 0;
        }
    }
    
    function check_special_characters($value){
        $error = false;
        if($value == 1234567) {
        	$error = "The %s  must include at least one number!";

        }elseif( !preg_match("#[a-z]+#", $value) ) {
            
        	$error = "The %s  must include at least one letter!";
        }elseif( !preg_match("#[A-Z]+#", $value) ) {
            
        	$error = "The %s  must include at least one CAPS!";    
        }elseif( !preg_match("#\W+#", $value) ) {
            
        	$error = "The %s  must include at least one special character!";
        }
        
        if($error){
            $this->form_validation->set_message('check_special_characters', $error);
            return false;
        }else{
            return true; 
        }  
        
    }
    
    function check_mobile($mobile){
	// Checks if the mobile number is valid
		$mobile = trim($mobile);
        $this->form_validation->set_message('check_mobile', 'The %s field is not a valid mobile number');
		if (is_numeric($mobile)){

			if ((strlen($mobile) >= 9) && (strlen($mobile) <=13)){
			
				$f2_chars = substr($mobile,0,2);
				$f5_chars = substr($mobile,0,5);
				$f4_chars = substr($mobile,0,4);
				$f2_array = array('07','06');
				$f3_array = array('+2557','+2556');
				$f4_array = array('2557','2556');
				
				$len = strlen($mobile);
				
				if (($len == 10) && (in_array($f2_chars,$f2_array))){
					return $mobile;
				}elseif(($len == 13) && (in_array($f3_chars,$f3_array))){
					return '0'.substr($mobile,4,$len);
				}elseif(($len == 12) && (in_array($f4_chars,$f4_array))){
					return '0'.substr($mobile,3,$len);
				}else{
					return false;
				}    
				
			}else{
				return false;	
			}
		}else{
			return false;
		}
	
	}
    
    /** End of form validation functions **/
    
    function get_notifications(){
        $this->load->model('activity_m');
        $this->data['notifications'] = $this->activity_m->get_activity(UNAUTHORISED_DATA, $this->user_m->role_id);
    }

    function confirm(){
    	$controller = $this->uri->segment(4);
        $function = $this->uri->segment(5);
        $id = $this->uri->segment(6);
        $activity_id = $this->uri->segment(7);
    	$data['url'] = 'en/'.$controller.'/'.$function.'/'.$id .'/'.$activity_id;
    	$data['message_type'] = 'info';
    	$data['close'] = TRUE;
    	$data['title'] = 'Confirm';
    	$data['message'] = 'Are you sure you want to perform this action?';
    	$this->twig->display('message.html.twig', $data);
    }

    function set_redirect_msg($msg, $type=false){
        if($type){
            $this->session->set_flashdata(array('msg_info'=>$this->user_m->custom_msg($msg, $type)));
        }else{
            $this->session->set_flashdata(array('msg_info'=>$this->user_m->custom_msg($msg)));
        }
    }

    function filters($type){
        $data['s_date_r'] = date('Y-m-d', strtotime('first day of this month'));
        $data['e_date_r'] = date('Y-m-d', strtotime('last day of this month'));
        if($this->user_m->municipal_id){
            $data['is_municipal_user'] = TRUE;
        }
        switch ($type) {
            case 'ft':
                $this->load->model('municipal_m');
                $this->load->model('teller_m');
                $data['title'] = 'Fund Transfers Report Filters';
                $data['report_filter'] = 'ft';
                $data['filter_link'] = 'en/reports/get/ft';
                $data['txn_status'] = $this->filter_txn_status;
                $data['tellers'] = $this->teller_m->get_tellers();
                $data['narrations'] = $this->ft_narrations;
                $data['municipals'] = $this->municipal_m->get();
                break;
            case 'inquiries':
                $this->load->model('municipal_m');
                $this->load->model('teller_m');
                $data['title'] = 'Inquiries Transactions Filters';
                $data['report_filter'] = 'ft';
                $data['filter_link'] = 'en/reports/get/inquiries';
                $data['txn_status'] = $this->filter_txn_status;
                $data['tellers'] = $this->teller_m->get_tellers();
                $data['narrations'] = $this->inquiries_narrations;
                $data['municipals'] = $this->municipal_m->get();
                break;
            case 'bills':
                $this->load->model('municipal_m');
                $this->load->model('teller_m');
                $data['title'] = 'Bills Transactions Filters';
                $data['report_filter'] = 'ft';
                $data['filter_link'] = 'en/reports/get/bills';
                $data['txn_status'] = $this->filter_txn_status;
                $data['tellers'] = $this->teller_m->get_tellers();
                $data['narrations'] = $this->bills_narrations;
                $data['municipals'] = $this->municipal_m->get();
                break;
            case 'system_users':
                $this->load->model('municipal_m');
                $this->load->model('role_m');
                $data['title'] = 'System Users Report Filters';
                $data['report_filter'] = 'users';
                $data['filter_link'] = 'en/reports/get/users';
                $data['users_status'] = $this->filter_user_status;
                $data['roles'] = $this->role_m->get_roles();
                $data['municipals'] = $this->municipal_m->get();
                $data['checkers'] = $this->user_m->get_users(false, true, array('user.role_id'=> SYSTEM_ADMIN), false);
                $data['makers'] = $data['checkers'];
                break;
            case 'pos':
                $this->load->model('municipal_m');
                $data['title'] = 'Regeistered POS Report Filters';
                $data['report_filter'] = 'pos';
                $data['filter_link'] = 'en/reports/get/pos';
                $data['municipals'] = $this->municipal_m->get();
                $data['checkers'] = $this->user_m->get_users(false, true, array('user.role_id'=> CUSTOMER_ADMIN), false);
                $data['makers'] = $data['checkers'];
                break;
            case 'pos_assignment':
                $this->load->model('municipal_m');
                $data['title'] = 'POS Assignment Report Filters';
                $data['report_filter'] = 'pos_assignment';
                $data['filter_link'] = 'en/reports/get/pos_assignment';
                $data['municipals'] = $this->municipal_m->get();
                $data['makers'] = $this->user_m->get_users(false, true, array('user.role_id'=> SUPERVISOR), false);
                break;
            case 'summary_cheques':
                $this->load->model('municipal_m');
                $data['title'] = 'Cheques Filters';
                $data['report_filter'] = 'cheque';
                $data['filter_link'] = 'en/reports/get/summary_cheques';
                $data['cheque_status'] = $this->filter_cheque_status;
                $data['cheque_type'] = $this->filter_cheque_type;
                $data['municipals'] = $this->municipal_m->get();
                $data['summary_cheques'] = TRUE;
                $data['has_signatory'] = TRUE;
                $data['makers'] = $this->user_m->get_users(false, true, array('user.role_id'=> CHEQUE_MAKER), false);
                $data['signatories'] = $this->user_m->get_users(false, true, array('user.role_id'=> CHEQUE_SIGNATORY), false);
                break;
            case 'completed_cheques':
                $this->load->model('municipal_m');
                $data['title'] = 'Cheques Filters';
                $data['report_filter'] = 'cheque';
                $data['filter_link'] = 'en/reports/get/completed_cheques';
                $data['cheque_type'] = $this->filter_cheque_type;
                $data['municipals'] = $this->municipal_m->get();
                $data['has_signatory'] = TRUE;
                $data['makers'] = $this->user_m->get_users(false, true, array('user.role_id'=> CHEQUE_MAKER), false);
                $data['signatories'] = $this->user_m->get_users(false, true, array('user.role_id'=> CHEQUE_SIGNATORY), false);
                break;
            case 'pending_cheques':
                $this->load->model('municipal_m');
                $data['title'] = 'Cheques Filters';
                $data['report_filter'] = 'cheque';
                $data['filter_link'] = 'en/reports/get/pending_cheques';
                $data['cheque_type'] = $this->filter_cheque_type;
                $data['municipals'] = $this->municipal_m->get();
                $data['makers'] = $this->user_m->get_users(false, true, array('user.role_id'=> CHEQUE_MAKER), false);
                $data['signatories'] = $this->user_m->get_users(false, true, array('user.role_id'=> CHEQUE_SIGNATORY), false);
                break;
            case 'failed_cheques':
                $this->load->model('municipal_m');
                $data['title'] = 'Cheques Filters';
                $data['report_filter'] = 'cheque';
                $data['filter_link'] = 'en/reports/get/failed_cheques';
                $data['cheque_type'] = $this->filter_cheque_type;
                $data['municipals'] = $this->municipal_m->get();
                $data['makers'] = $this->user_m->get_users(false, true, array('user.role_id'=> CHEQUE_MAKER), false);
                $data['signatories'] = $this->user_m->get_users(false, true, array('user.role_id'=> CHEQUE_SIGNATORY), false);
                break;
            case 'users_audit':
                $data['title'] = 'System Users Audit Trail Report Filters';
                $data['report_filter'] = 'users_audit_trail';
                $data['filter_link'] = 'en/reports/get/users_audit_trail';
                $data['s_date_r'] = date('Y-m-d', strtotime('yesterday'));
                $data['e_date_r'] = date('Y-m-d');
                $data['users'] = $this->user_m->get_users(false, true, false, true);
                break;
            default:
                # code...
                break;
        }
        $data['close'] = TRUE;
        $this->twig->display('report_filters.html.twig', $data);
    }

}