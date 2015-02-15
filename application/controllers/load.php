<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Load extends MY_Controller {


    function __construct() {
		parent::__construct();
	}
    
    function index(){
        $this->load->model('permission');
        $data = array(
        		array('permission'=>'authorize cheque', 'category'=>'municipal'),
                array('permission'=>'reject cheque', 'category'=>'municipal'),
        	);
        foreach($data as $d){
       		//$this->permission->save($d);
   		}
    }

    function table($tb){
    	dump($this->db->field_data($tb));
    }

    function time_stamp(){
        echo time();
    }


}