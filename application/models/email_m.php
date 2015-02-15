<?php
class Email_m extends CI_Model {
    public $sender_email;
    public $sender_name;
    public $receiver_email;
    public $receiver_name;
    public $current_mail;
    public $message;
    public $subject;
    public $mail_type = 'html';
    public $logo ="admin/images/logo.png";
    public $phone;
    public $contact_email;
    public $contact_name;
    
    function __construct(){
        parent::__construct();
        // load library
        $this->load->library('email');
        $config['protocol']    = 'smtp';
        $config['smtp_host']    = '192.168.131.42';
        $config['smtp_port']    = '25';
        $config['smtp_timeout'] = '15';
        $config['smtp_user']    = 'agency@crdbbank.com';
        $config['smtp_pass']    = 'Secure123';
        $config['charset']    = 'iso-8859-1';
        $config['newline']    = "\r\n";
        //$config['mailtype'] = 'html';   
        @$this->email->initialize($config);
        
        $this->contact_email = $this->sender_email = 'pos_tms@crdbbank.com';
        $this->contact_name = $this->sender_name = 'CRDB POS TMS';  
        //$this->phone = '+255787000000';
     }
     
    function sendEmail(){
        
        $this->email->from($this->sender_email, $this->sender_name);
        $this->email->to($this->receiver_email);  
        $this->email->subject($this->subject);
        $this->email->message($this->current_mail);
        @$this->email->send();
    }
    
    function prepare_activation_msg($hash_pwd ,$resend = false){
        if($resend){
            $this->subject = 'CRDB POS-TMS Account Re-activation.';
            $this->current_mail = 'Hi, '."\r\n".'
                            Your CRDB POS-TMS account has been successfully re-activated. '."\r\n".'
                            Your email will be your username. The initial password can only be used once and will expire in one day if not used.'."\r\n".'
                            Username : '.$this->receiver_email."\r\n".'
                            Initial Password: '.$hash_pwd;
            
        }
        else{
                $this->subject = 'New CRDB POS-TMS Account Activation.';
                $this->current_mail = 'Hi, '."\r\n".'
                            Your CRDB POS-TMS account has been successfully created.'."\r\n".'
                            Your email will be your username. The initial password can only be used once and will expire in one day if not used.'."\r\n".'
                            Username : '.$this->receiver_email."\r\n".'
                            Initial Password: '.$hash_pwd;
        }
    }
    
     
    
}