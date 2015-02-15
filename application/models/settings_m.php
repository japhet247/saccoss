<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Settings_M extends MY_Model
{
	protected $_table_name = 'tms_settings';
	protected $_order_by = 'created desc';
	protected $_primary_key = 'settings_id';
	public $fields = array('setting_value');

	function __construct() {
		parent::__construct();
		$this->data_status = FALSE;
	}

	function get_setting_group(){
		$this->db->select('setting_group, settings_id');
		$this->db->distinct();
		$this->db->order_by('settings_id asc');
		return $this->db->get($this->_table_name)->result_array();
	}

	function prepare_settings($settings){
		$categories = $this->get_setting_group();
			$data = array();
			foreach($categories as $c){
				$temp = array();
				foreach($settings as $p){
					if($p['setting_group'] == $c['setting_group']){
						$temp[] = $p;
					}
				}
				$data[$c['setting_group']] = $temp;
			}
			return $data;
	}

	function save($data,$key){
		$this->db->where('setting_key', $key);
		$this->db->update($this->_table_name, $data);
	}

	function committ($activity_id){
		//get data
		$this->db->from('activity');
		$this->db->join('edited', 'activity.activity_id = edited.activity_id');
		$this->db->where('activity.activity_id', $activity_id);
		$result = $this->db->get()->row_array();
		if($result){
			$data['status'] = ACTIVE_DATA;
			$data['authorised_by'] = $this->user_m->user_id;
			$data['authorised'] = $this->GT();
			$this->load->model('activity_m');
			$this->load->model('edited_m');
			$this->db->trans_start();
				$this->save(array('setting_value'=> $result['tb_value']), $result['content_id']);
				$this->activity_m->save($data, $activity_id);
				$this->edited_m->delete(false, false, array('activity_id' => $activity_id));
				$msg = 'Authorized activity -- <strong>'.$this->activity_m->get_value($activity_id, 'message').'</strong>';
				$this->user_m->grab_trail_message($msg);
			$this->db->trans_complete();
			return true;
		}else{
			return false;
		}
	}

}