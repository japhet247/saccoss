<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_APIC extends CI_Controller 
{
    function __construct() {
		parent::__construct();
     
        if($this->my_api->check_incoming()){
            //Do nothing
        }else{
            echo UNKNOWN_REQUEST;
            exit();    
        }
	    
    }
    
    
}