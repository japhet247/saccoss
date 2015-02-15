<?php
class Sms extends CI_Model
{
    
    public $c_msg = false;
    
    function __construct() {
		parent::__construct();
	}
    
    // This is for quick testing
    function send($dest,$msg = false){
        $msg = ($this->c_msg) ? $this->c_msg : $msg;
		$dest = check_mobile($dest);
        if($dest){
            $DB1 = $this->load->database('sms', TRUE);
            $data = array(
                        'phone'=>$dest,
                        'sender'=> 'POS_TMS',
                        'text'=> $msg
                        );
            if($DB1->insert('proxytable',$data))
                return 1;
        }	
        return 0;
    }
    
    
    function prepare_message($type='deposit',$data){
        
        if ($type == 'municipal'){
            $this->c_msg = 'Ndugu mteja '.$data['full_name'].' malipo yako ya Manispaa ya '.$data['municipal'].' ya TSH'.$data['amount'].' kwa ajili ya '.$data['service'].' yamekamilika REF:'.$data['referenceID'];                           
        }elseif($type == 'tra'){
            $this->c_msg = 'Ndugu Mteja '.$data['full_name'].' malipo yako ya TRA Control No. '.$data['control_no'].' ya TSH'.$data['amount'].' yamekamilika REF:'.$data['reference_number'];
        }elseif($type == 'normal_tis'){
            $this->c_msg = 'Ndugu Mteja '.$data['full_name'].' umefanikiwa kuhamisha TSH'.$data['amount'].' kutoka account '.$data['owner_account'].' kwenda kwa '.$data['beneficiary_name'].' '.$data['beneficiary_account'];
        }elseif($type == 'cheque_tis'){
            $this->c_msg = 'Ndugu Mteja '.$data['full_name'].' cheque yako No:'.$data['cheque_no'].' ya TSH'.$data['amount'].' inashugulikiwa utataarifiwa punde itakapokamilika';
        }
    }

}