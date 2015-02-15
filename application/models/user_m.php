<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User_M extends MY_Model
{
	
	protected $_table_name = 'user';
	protected $_order_by = 'full_name';
	protected $_primary_key = 'user_id';
	public $user_id;
	public $user_role;
	public $role_id;
	public $full_name;
	public $email;
	public $mobile;
	public $municipal_id;
	public $filter_fields = array('s_date_r', 'e_date_r', 'role_id', 'municipal_id', 'user_status');
	public $table_fields = array('full_name', 'email' , 'profile', 'municipal_name', 'user_status');
	public $fields = array('full_name', 'email', 'mobile', 'address', 'role_id' , 'municipal_id');
	public $report_name = 'System Users';
	function __construct() {
		parent::__construct();
		$this->user_id = $this->session->userdata('user_id');
		$this->user_role = $this->session->userdata('user_role');
		$this->full_name = $this->session->userdata('full_name');
		$this->email = $this->session->userdata('email');
		$this->role_id = $this->session->userdata('role_id');
		$this->municipal_id = $this->session->userdata('municipal_id');
	}

	function login(){
		$this->load->model('login_m');
		$this->load->model('permission_m');
		$username = $this->input->post('username');
		$password = $this->input->post('password');
		$result = $this->login_m->login($username, $password);
		if($result){
			//now check the user status
			if($result['status'] == ACTIVE){
				//get user details for loggin 
				$user = $this->get($result['user_id'], TRUE);
				//check if is sadmin
				if($result['role_id'] == SADMIN){
					// do nothing
				}else{
					//get permissions
					$permissions = array();
					$perms = $this->permission_m->get_permissions($result['role_id'], 'permission');
					foreach ($perms as $p) {
						$permissions[] = $p['permission'];
					}
				}
				//create session
				$session = array(
							'full_name' => $user['full_name'],
							'email' => $user['email'],
							'user_id' => $user['user_id'],
							'user_role' => $result['role_name'],
							'role_id' => $result['role_id'],
							'loggedin' => TRUE,
							'municipal_id' => $user['municipal_id'],
					);
				
				# Set the session for first data
            	$this->session->set_userdata($session);                
            	if ($permissions) $this->session->set_userdata('permissions', $permissions);  
			}
			return $result;
		}else{
			return false;
		}
	}

	function create(){
		$this->load->model('activity_m');
		$this->db->trans_start();
			$posted = $this->get_posts();
			$user_id = $this->save($posted);
			$msg = '<strong>'.$this->user_m->full_name.'</strong> added a new User <strong>'.$posted['full_name'].'</strong>';
			if($this->user_m->role_id == SADMIN){
				$this->authorize($user_id);
			}else{
				//log activity for notification
				$activity['message'] = $msg; 
				$activity['tb_name'] = 'user';
				$activity['activity_key'] = ACTIVITY_ADD;
				$activity['uri'] = 'user/view';
				$activity['content_id'] = $user_id;
				$activity['role_id'] = $this->user_m->role_id;
				$this->activity_m->save($activity);
			}
		$this->db->trans_complete();
		$this->grab_trail_message($msg);
		return $user_id;
	}

	function edit($user_id){
		$this->load->model('activity_m');
		$this->load->model('edited_m');
		$posted = $this->get_posts();
		$edited_user = $this->get_edited($user_id, $posted);
		if($edited_user){
			$this->db->trans_start();
			$this->data_status = FALSE;
			$full_name = $this->get_value($user_id, 'full_name');
			$msg = '<strong>'.$this->user_m->full_name.'</strong> Edited User <strong>'.$full_name. '</strong> - ';
			
			foreach($edited_user as $key => $edited){
				$msg .= ' ['.$this->lang->line($key). '] ';
				if($key == 'municipal_id'){
					foreach ($edited as $k => $v) {
						$msg .= $k. ' <strong>' .$this->tb_value(array('municipal_id' => $v), 'municipal', 'municipal_name'). '</strong> '; 
					}
				}elseif($key == 'role_id'){
					foreach ($edited as $k => $v) {
						$msg .= $k. ' <strong>' .$this->tb_value(array('role_id' => $v), 'user_role', 'name'). '</strong> '; 
					}
				}else{
					foreach ($edited as $k => $v) {
						$msg .= $k. ' <strong>' .$v. '</strong> '; 
					}
				}
			}

			if($this->user_m->role_id == SADMIN){
				//save directly
				$this->save($posted, $user_id);
				$this->load->model('login_m');
				$this->login_m->save(array('username' => $posted['email']), $user_id);	
			}else{
				$activity['message'] = $msg; 
				$activity['tb_name'] = 'municipal';
				$activity['activity_key'] = ACTIVITY_EDIT;
				$activity['uri'] = 'user/view';
				$activity['content_id'] = $user_id;
				$activity['role_id'] = $this->user_m->role_id;
				$activity_id = $this->activity_m->save($activity);

				foreach ($posted as $key => $value) {
					$data['tb_column'] = $key;
					$data['tb_value'] = $value;
					$data['created_by'] = $this->user_m->user_id;
					$data['activity_id'] = $activity_id;
					$this->edited_m->save($data);
				}
			}
			$this->db->trans_complete();
			$this->grab_trail_message($msg);
		}
	}
	
	public function authorize($user_id, $activity_id=false){
		//authorize creation of users
		($activity_id) ? parent::authorize($user_id, $activity_id) : parent::authorize($user_id);
		//run other authorisation activities
		$this->load->model('user_activation_m', 'activate');
		
		return $this->activate->send_creds($user_id);
	}

	public function commit($id, $activity_id){
		//commit edited value
		$this->load->model('activity_m');
    	$this->load->model('edited_m');
    	$this->load->model('login_m');
    	$posted = $this->get_posted_from_activity($activity_id);
    	$data['status'] = ACTIVE_DATA;
		$data['authorised_by'] = $this->user_m->user_id;
		$data['authorised'] = $this->GT();
		$msg = 'Authorized Activity -- <strong>'.$this->tb_value(array('activity_id'=>$activity_id), 'activity', 'message').'</strong>';
		//check if user was unauthorised
		$unauthorised = $this->is_unauthorised($id);
    	$this->db->trans_start();
    		(!$unauthorised) || $this->authorize($id);
    		$result = $this->save($posted, $id);
    		$this->activity_m->save($data, $activity_id);
    		$this->edited_m->delete(false, false, array('activity_id' => $activity_id));
    		$this->login_m-save(array('username' => $posted['email']), $id);
    	$this->db->trans_complete();
    	$this->user_m->grab_trail_message($msg);

	}

	function is_unauthorised($id){
		$this->data_status = false;
		$result = $this->get($id, TRUE);
		return (!empty($result) && ($result['status'] == UNAUTHORISED_DATA)) ? true : false;
	}

	# Begin of Functions for permissions 
    

	function has_permission($module_id,$user_id=false){
		//if no module_id is null, allow access
		if($module_id==null){
			return true;
		}
        if ($this->isAdmin()) return true;
		if (!$user_id) $user_id = $this->session->userdata('user_id');
		if ($user_id){
            $permissions = $this->session->userdata('permissions');
            if ($permissions){
                if (in_array($module_id , $permissions)) {
                    return true;
                }
    		}
        }
		return false;
	}

	function has_function_access($module_id){
        if ($this->has_permission($module_id)){
          // Do nothing   
        }else{
          //redirect
          show_error('Access Denied', 403);  
        }
    }

    # End of permissions functions


	#login functions

	function isAdmin(){
        $user_role = $this->session->userdata('role_id');
        if ($user_role == SADMIN){
            return $user_role;
        }
        return false;
    }
    
    public function loggedin (){
		return (bool) $this->session->userdata('loggedin');
	}
    
    function logout(){
		$this->session->sess_destroy();
		redirect('/');
	}
	# end login functions

	function generate_id(){
		return parent::generate_id(TRUE);
	}

	function get_users($user_id=false, $authorised=true, $where = false, $filters=false){
		$this->db->from($this->_table_name);
		$this->db->join('user_role', 'user_role.role_id = '.$this->_table_name.'.role_id');
		$this->db->join('municipal', $this->_table_name.'.municipal_id = municipal.municipal_id', 'left');
		if($authorised){
			$this->db->join('user_credentials', 'user_credentials.user_id = '.$this->_table_name.'.user_id');
			$this->db->select($this->_table_name.'.*, user_role.name AS profile, user_credentials.status AS user_status, municipal_name');
		}else{
			$this->db->select($this->_table_name.'.*, user_role.name AS profile, municipal_name');
		}
		if(!$filters){
			$this->db->where(array('user_role.role_id !=' => SADMIN, 'user_role.role_id != '=> $this->role_id));
		}
		if($where){
			$this->db->where($where);
		}

		$this->db->order_by('created desc');
		if($user_id){
			$this->db->where($this->_table_name.'.user_id', $user_id);
			return $this->db->get()->first_row('array');
		}else{
			return $this->db->get()->result_array();
		}
	}

	function filter_users(){

	}

	function set_change_pwd_errors(){
		$this->fields = array('old_password', 'new_password', 'confirm_password');
		return $this->set_errors();
	}

	function grab_trail_message($message){
        $this->session->set_userdata('trail_message', $message);
    }
	

	
}