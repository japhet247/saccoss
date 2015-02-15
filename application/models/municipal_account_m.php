<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Municipal_account_M extends MY_Model
{
	protected $_table_name = 'municipal_accounts';
	protected $_order_by = 'created desc';
	protected $_primary_key = 'account_id';
	public $fields = array('municipal_id', 'account', 'account_name', 'category_a', 'category_b');
	protected $unique_keys = array('municipal_id', 'account');

	function __construct() {
		parent::__construct();
	}

	function create_account(){
		$this->load->model('activity_m');
		$this->load->model('signatory_map_m', 'signatory_m');
		$this->db->trans_start();
		//save profile/role
		$posted = $this->get_posts();
		$category_a = $posted['category_a'];
		$category_b = $posted['category_b'];

		unset($posted['category_a']);
		unset($posted['category_b']);
		$account_id = $this->save($posted);
		foreach($category_a as $a){
			$map['municipal_account'] = $posted['account'];
			$map['user_id'] = $a;
			$map['category'] = CATEGORY_A;
			$this->signatory_m->save($map);
		}
		foreach($category_b as $b){
			$map['municipal_account'] = $posted['account'];
			$map['user_id'] = $b;
			$map['category'] = CATEGORY_B;
			$this->signatory_m->save($map);
		}
		$msg = '<strong>'.$this->user_m->full_name.'</strong> added a new Municipal Account <strong>'.$posted['account_name'].'</strong> for Municipal <strong>'.$this->tb_value(array('municipal_id'=>$posted['municipal_id']), 'municipal', 'municipal_name').'</strong>';	

		if($this->user_m->role_id == SADMIN){
			parent::authorize($account_id);
			$this->signatory_m->authorize($posted['account']);
		}else{
			//log activity for notification
			$activity['message'] = $msg; 
			$activity['tb_name'] = $this->_table_name;
			$activity['activity_key'] = ACTIVITY_ADD;
			$activity['uri'] = 'account/view';
			$activity['content_id'] = $account_id;
			$activity['role_id'] = $this->user_m->role_id;
			$this->activity_m->save($activity);
		}
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return $account_id;
	}

	function edit($account_id){
		$this->load->model('activity_m');
		$this->load->model('edited_m');
		$this->load->model('signatory_map_m', 'signatory_m');

		$posted = $this->get_posts();
		$category_a = $posted['category_a'];
		$category_b = $posted['category_b'];

		unset($posted['category_a']);
		unset($posted['category_b']);
		unset($this->fields[3]);
		unset($this->fields[4]);
		$this->data_status = FALSE;
		$saved_acc = $this->get($account_id, TRUE);
		//get edited values for message logging
		$edited_account = $this->get_edited($account_id, $posted);
		$edited_signs_a = $this->signatory_m->get_edited($saved_acc['account'], $category_a);
		$edited_signs_b = $this->signatory_m->get_edited($saved_acc['account'], $category_b, CATEGORY_B);
		if(($edited_account) || ($edited_signs_a) || ($edited_signs_b)){
			$this->db->trans_start();
				$duplicate = false;
				//save activity first
				//create activity message
				$msg = '<strong>'.$this->user_m->full_name.'</strong> Edited Municipal Account <strong>'.$saved_acc['account_name']. '</strong> - ';
				if($edited_account){
					foreach($edited_account as $key => $edited){
						$msg .= ' ['.$this->lang->line($key). '] ';
						if($key == 'municipal_id'){
							foreach ($edited as $k => $v) {
								$msg .= $k. ' <strong>' .$this->tb_value(array('municipal_id' => $v), 'municipal', 'municipal_name'). '</strong> '; 
							}
						}else{
							foreach ($edited as $k => $v) {
								$msg .= $k. ' <strong>' .$v. '</strong> '; 
							}
						}
					}

					foreach ($edited_account as $key => $value) {
						if(in_array($key, $this->unique_keys)) $duplicate = true;
					}
				}

				if($edited_signs_a){
					if($edited_signs_a['added']){ 
						$msg .= ' Added '.count($edited_signs_a['added']) .' CATEGORY A Signatories: <strong>';
						foreach($edited_signs_a['added'] as $added){
							$msg .= $this->user_m->get_value($added, 'full_name').', ';
						}
						$msg .= '</strong>';
					}
					if($edited_signs_a['removed']){ 
						$msg .= ' Removed '.count($edited_signs_a['removed']) .' CATEGORY A Signatories: <strong>';
						foreach($edited_signs_a['removed'] as $removed){
							$msg .= $this->user_m->get_value($removed, 'full_name').', ';
						}
						$msg .= '</strong>';
					}
				}

				if($edited_signs_b){
					if($edited_signs_b['added']){ 
						$msg .= ' Added '.count($edited_signs_b['added']) .' CATEGORY B Signatories: <strong>';
						foreach($edited_signs_b['added'] as $added){
							$msg .= $this->user_m->get_value($added, 'full_name').', ';
						}
						$msg .= '</strong>';
					}
					if($edited_signs_b['removed']){ 
						$msg .= ' Removed '.count($edited_signs_b['removed']) .' CATEGORY B Signatories: <strong>';
						foreach($edited_signs_b['removed'] as $removed){
							$msg .= $this->user_m->get_value($removed, 'full_name').', ';
						}
						$msg .= '</strong>';
					}
				}
				
				if($this->user_m->role_id == SADMIN){

					$this->signatory_m->delete(false, false, array('municipal_account' => $saved_acc['account']));

					if($duplicate){
						$this->delete($account_id);
						$account_id  = $this->save($posted);
						parent::authorize($account_id);
					}else{
						$this->save($posted, $account_id);
					}

					foreach($category_a as $a){
						$map['municipal_account'] = $posted['account'];
						$map['user_id'] = $a;
						$map['category'] = CATEGORY_A;
						$this->signatory_m->save($map);
					}
					foreach($category_b as $b){
						$map['municipal_account'] = $posted['account'];
						$map['user_id'] = $b;
						$map['category'] = CATEGORY_B;
						$this->signatory_m->save($map);
					}
					$this->signatory_m->authorize($posted['account']);

				}else{

					$activity['message'] = $msg; 
					$activity['tb_name'] = $this->_table_name;
					$activity['activity_key'] = ACTIVITY_EDIT;
					$activity['uri'] = 'account/view';
					$activity['content_id'] = $account_id;
					$activity['role_id'] = $this->user_m->role_id;
					$activity_id = $this->activity_m->save($activity);

					foreach ($posted as $key => $value) {
						$data['tb_column'] = $key;
						$data['tb_value'] = $value;
						$data['created_by'] = $this->user_m->user_id;
						$data['activity_id'] = $activity_id;
						$this->edited_m->save($data);
					}
					if($duplicate){
						$additionals = array('created_by'=>$this->user_m->user_id, 'status' => UNAUTHORISED_DATA, 'modified'=>$this->GT(), 'created'=>$this->GT(), 'duplicate'=>TRUE);
						foreach ($additionals as $key => $value) {
							$data['tb_column'] = $key;
							$data['tb_value'] = $value;
							$data['created_by'] = $this->user_m->user_id;
							$data['activity_id'] = $activity_id;
							$this->edited_m->save($data);
						}
					}
					
					foreach ($category_a as $a) {
						$data['tb_column'] = 'category_a';
						$data['tb_value'] = $a;
						$data['created_by'] = $this->user_m->user_id;
						$data['activity_id'] = $activity_id;
						$this->edited_m->save($data);
					}

					foreach ($category_b as $b) {
						$data['tb_column'] = 'category_b';
						$data['tb_value'] = $b;
						$data['created_by'] = $this->user_m->user_id;
						$data['activity_id'] = $activity_id;
						$this->edited_m->save($data);
					}
					
				}
			$this->db->trans_complete();
			$this->user_m->grab_trail_message($msg);
		}
	}

	public function authorize($id, $activity_id = false){
		$this->load->model('signatory_map_m', 'signatory_m');
		$this->db->trans_start();
			parent::authorize($id, $activity_id);
			$this->data_status = FALSE;
			$account = $this->account_m->get($id, TRUE);
			$this->signatory_m->authorize($account['account']);
		$this->db->trans_complete();
		return $id;
	}

	function committ($account_id, $activity_id){
		$this->load->model('activity_m');
    	$this->load->model('edited_m');
    	$this->load->model('signatory_map_m', 'signatory_m');
    	unset($this->fields[3]);
		unset($this->fields[4]);
    	$formatted = $this->get_posted_from_activity($activity_id);
    	if(empty($formatted)) return false;
    	$this->data_status = FALSE;
		$saved_acc = $this->get($account_id, TRUE);
    	$data['status'] = ACTIVE_DATA;
		$data['authorised_by'] = $this->user_m->user_id;
		$data['authorised'] = $this->GT();
    	$this->db->trans_start();
	    		
			$this->signatory_m->delete(false, false, array('municipal_account' => $saved_acc['account']));

			if(isset($formatted['account']['duplicate'])){
				$this->dual_control = false;
				$this->_timestamps = false;
				$this->delete($account_id);
				unset($formatted['account']['duplicate']);
				$account_id  = $this->save($formatted['account']);
				parent::authorize($account_id);
			}else{
				unset($formatted['account']['duplicate']);
				$this->save($formatted['account'], $account_id);
			}

			foreach($formatted['category_a'] as $a){
				$map['municipal_account'] = $formatted['account']['account'];
				$map['user_id'] = $a;
				$map['category'] = CATEGORY_A;
				$this->signatory_m->save($map);
			}
			foreach($formatted['category_b'] as $b){
				$map['municipal_account'] = $formatted['account']['account'];
				$map['user_id'] = $b;
				$map['category'] = CATEGORY_B;
				$this->signatory_m->save($map);
			}

			$this->signatory_m->authorize($formatted['account']['account']);
			$this->activity_m->save($data, $activity_id);
			$this->edited_m->delete(false, false, array('activity_id' => $activity_id));
			$msg = 'Authorized Activity -- <strong>'.$this->activity_m->get_value($activity_id, 'message').'</strong>';
		$this->db->trans_complete();
		$this->user_m->grab_trail_message($msg);
		return true;
    }

    function get_posted_from_activity($activity_id){
    	$this->load->model('edited_m');
    	$edited = $this->edited_m->get_by(array('activity_id' => $activity_id));
    	unset($this->fields[3]);
		unset($this->fields[4]);
    	$fields = array_merge($this->fields, array('created_by', 'created', 'modified', 'status', 'duplicate'));
    	$account = array();
    	foreach($fields as $field){
    		foreach($edited as $e){
    			if($field == $e['tb_column']) $account[$field] = $e['tb_value'];
    		}
    	}
    	$category_a = array();
    	foreach($edited as $e){
    		if($e['tb_column'] == 'category_a') $category_a[] = $e['tb_value'];
    	}
    	$category_b = array();
    	foreach($edited as $e){
    		if($e['tb_column'] == 'category_b') $category_b[] = $e['tb_value'];
    	}
    	return array('account' => $account, 'category_a' => $category_a, 'category_b' => $category_b);
    }

	function prepare_accounts($municipal_id=TRUE, $status=TRUE, $account_id = FALSE){
		if($municipal_id){
			$this->db->from($this->_table_name);
			if($status){
				$this->db->where($this->_table_name.'.status' , ACTIVE_DATA);
			}
			$this->db->where('municipal.status' , ACTIVE_DATA);
			$this->db->join('municipal', 'municipal.municipal_id = '.$this->_table_name.'.municipal_id');
			$this->db->where($this->_table_name.'.municipal_id' , $municipal_id);
			$accounts = $this->db->get()->result_array();
		}else{
			$accounts = $this->db->get_where($this->_table_name, array('account_id'=>$account_id))->result_array();
		}
		$this->db->from('user');
		$this->db->join('map_signatories', 'user.user_id = map_signatories.user_id');
		if($status){
			$this->db->where('map_signatories.status' , ACTIVE_DATA);
		}
		$signatories = $this->db->get()->result_array();
		return $this->set_signatory($accounts, $signatories);
	}

	function set_signatory($accounts, $signatories){
		$data = array();
		foreach($accounts as $acc){
			$temp = array();
			$temp['account'] = $acc;
			foreach($signatories as $sign){
				if($acc['account'] == $sign['municipal_account']){
					if($sign['category'] == CATEGORY_A){
						$temp['category_a'][] = $sign;
					}
					if($sign['category'] == CATEGORY_B){
						$temp['category_b'][] = $sign;
					}
				}
			}
			$data[] = $temp;
		}
		return $data;
	}

	function format_display($accounts){
		$data = $result  = array();
		foreach($accounts as $acc){
			foreach($acc as $k => $v){
				if($k == 'account'){
					$data['account'] = $v['account_name']. '<br>'.$v['account'];
					$data['account_id'] = $v['account_id'];
				}elseif($k == 'category_a'){
					$cat_a = '';
					foreach ($v as $a) {
						$cat_a .= $a['full_name']. '<br>';
					}
					$data['category_a'] = $cat_a;
				}elseif($k == 'category_b'){
					$cat_b = '';
					foreach ($v as $b) {
						$cat_b .= $b['full_name']. '<br>';
					}
					$data['category_b'] = $cat_b;
				}
			}
			$result[] = $data;
		}
		return $result;
	}

}