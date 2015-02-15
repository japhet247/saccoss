<?php
class Report_m extends My_Model
{
    public $filter_fields = array('s_date_r','e_date_r','narration_r','status_r', 'teller_code_r', 'municipal_id_r', 'role_id_r', 'created_by_r', 'authorised_by_r', 'signatory_a_r', 'signatory_b_r', 'cheque_type_r');
    public $reports = array('users', 'txn', 'pos', 'cheques', 'audit');
    // filters
    public $narration_r = 'all';
    public $status_r = 'all';
    public $municipal_id_r = 'all';
    public $teller_code_r = 'all';
    public $s_date_r = 'all';
    public $e_date_r = 'all';
    public $role_id_r = 'all';
    public $created_by_r = 'all';
    public $authorised_by_r = 'all';
    public $report_type_r = 'ft';
    public $signatory_a_r = 'all';
    public $signatory_b_r = 'all';
    public $cheque_type_r = 'all';
    public $description_r;

    public $filters_set = false;
    
    //Table Report Fields 
    public $current_fields;
    public $ft_fields = array('narration', 'debit_account' , 'credit_account',  'amount', 'teller_name', 'municipal_name', 'reg_date', 'txnID' ,'status_description');
    public $users_fields = array('full_name', 'email' , 'profile', 'municipal_name', 'user_status','created_by', 'created', 'authorised_by', 'authorised');
    public $users_audit_fields = array('full_name', 'message', 'registered', 'ip');
    public $inquiries_fields = array('narration', 'account_no' , 'teller_name', 'municipal_name', 'reg_date', 'txnID' ,'status_description');
    public $bills_fields = array('narration', 'debit_account' , 'customer_account',  'amount', 'teller_name', 'municipal_name', 'reg_date', 'txnID' ,'status_description');
    public $pos_fields = array('pos_name', 'device_imei', 'serial_no', 'municipal_name', 'created', 'created_by', 'authorised', 'authorised_by');
    public $pos_assign_fields = array('pos_name', 'full_name', 'teller_account', 'teller_limit', 'municipal_name', 'created', 'created_by');
    public $summary_cheque_fields = array('cheque_no', 'voucher_no', 'amount', 'fund_desc', 'payee', 'cheque_type', 'status', 'municipal_name', 'municipal_account' ,'uploaded_on');
    public $completed_cheque_fields = array('cheque_no', 'voucher_no', 'amount', 'fund_desc', 'payee', 'cheque_type', 'municipal_name', 'municipal_account' ,'category_a', 'category_a_date', 'category_b', 'category_b_date');
    public $pending_cheque_fields = array('cheque_no', 'voucher_no', 'amount', 'fund_desc', 'payee', 'cheque_type', 'municipal_name', 'municipal_account' ,'uploaded_on');
    public $rejected_cheque_fields = array('cheque_no', 'voucher_no', 'amount', 'fund_desc', 'payee', 'cheque_type', 'municipal_name', 'municipal_account' ,'uploaded_on', 'rejected_by', 'rejected_date', 'rejection_comment');
    
    public $data_container;
    
    //Report totals
    public $report_totals = array('total_completed_txns','total_failed_txns');
    
    //Report totals
    public $total_completed_txns = 0;
    public $total_failed_txns = 0;

    
    public $report_name;
    
    public $download_title;
    
    function __construct() {
		parent::__construct();
        $this->s_date_r = date('Y-m-d', strtotime('first day of this month'));
        $this->e_date_r = date('Y-m-d', strtotime('last day of this month'));
        if($this->user_m->municipal_id){
            $this->municipal_id_r = $this->user_m->municipal_id;
        }
        
	}
    
    function grab_filters(){
        $save_session = array();
        foreach($this->filter_fields as $d){
            $value = $this->input->post($d);
            if($value){
                $this->filters_set = true;
                $save_session[$d] = $this->$d = $value;
            }
        }
        
        //Save the session
        $this->clear_previous_session();
        $this->session->set_userdata($save_session);
    }
    
    function clear_previous_session(){
        foreach($this->filter_fields as $d){
            $this->session->unset_userdata($d);
        }
    }
    
    function load_from_session(){
        foreach($this->filter_fields as $d){
            $value = $this->session->userdata($d);
            if ($value){
                $this->$d = $value;
            }
        }
    }
    
    function set_report(){
        //Check the type of the report to be generated
        if ($this->report_type_r == 'users'){
           $this->download_title = 'POS System Users Report'; 
           $this->current_fields = $this->users_fields;
           $this->get_users_data();
        }elseif ($this->report_type_r == 'users_audit_trail'){
           $this->download_title = 'POS System Users Audit Trail Report'; 
           $this->current_fields = $this->users_audit_fields;
           $this->get_audit_trail(); 
        }elseif ($this->report_type_r == 'ft'){
           $this->download_title = 'POS Fund Transfer Transactions Report'; 
           $this->current_fields = $this->ft_fields;
           $this->get_ft();
        }elseif ($this->report_type_r == 'inquiries'){
           $this->download_title = 'POS Inquiries Transactions Report';
           $this->current_fields = $this->inquiries_fields; 
           $this->get_inquiries(); 
        }elseif ($this->report_type_r == 'bills'){
           $this->download_title = 'POS Bills Transactions Report'; 
           $this->current_fields = $this->bills_fields;
           $this->get_bills();
        }elseif ($this->report_type_r == 'pos'){
           $this->download_title = 'Registered POS Report'; 
           $this->current_fields = $this->pos_fields;
           $this->get_pos();
        }elseif ($this->report_type_r == 'pos_assignment'){
           $this->download_title = 'POS Assignment Report'; 
           $this->current_fields = $this->pos_assign_fields;
           $this->get_pos_assignment(); 
        }elseif ($this->report_type_r == 'summary_cheques'){
           $this->download_title = 'Summary Cheques Report'; 
           $this->current_fields = $this->summary_cheque_fields; 
           $this->get_summary_cheques();
        }elseif ($this->report_type_r == 'completed_cheques'){
           $this->download_title = 'Completed Cheques Report';
           $this->current_fields = $this->completed_cheque_fields; 
           $this->get_summary_cheques(COMPLETED_CHEQUE); 
        }elseif ($this->report_type_r == 'pending_cheques'){
           $this->download_title = 'Pending Cheques Report';
           $this->current_fields = $this->pending_cheque_fields; 
           $this->get_summary_cheques(PENDING_CHEQUE); 
        }elseif ($this->report_type_r == 'failed_cheques'){
           $this->download_title = 'Rejected Cheques Report';
           $this->current_fields = $this->rejected_cheque_fields; 
           $this->get_summary_cheques(REJECTED_CHEQUE); 
        }else{
            $this->report_name = 'Unknown-Report-'.date('Y-d-m');
            $this->download_title = $this->lang->line('unknown_report');
            $this->current_fields = false;
            $this->data_container = '';
        }
    }

  
    function report_title(){
        $filters = $this->filter_fields;
        $title = $this->download_title. ' from '. $this->to_grn($this->s_date_r). ' to '.$this->to_grn($this->e_date_r).'<br>';
        
        $totals = $this->report_totals;
        $no_filters = count($filters);
        $has_filter = false;
        for($i=2; $i<$no_filters; $i++){
            if(($this->$filters[$i] != 'all')){
                    $title .= '<span style="font-weight:normal;">'.$this->lang->line($filters[$i]).' : <strong>'.$this->to_grn($this->get_id_value($filters[$i])).'</strong> ';
                    $has_filter = true;
            }
            
        }  
        $title .= ($has_filter) ? '</span><br>' : '</span>';
        
        $no_totals = count($totals);
        for($i=0;$i< $no_totals;$i++){
            if ($this->$totals[$i] != 0 ){
                $title .= '<span style="font-weight:normal;">'. $this->lang->line($totals[$i]).' : <strong>'.$this->to_grn($this->$totals[$i]).'</strong> ';
            }
        }
        $title .= '</span>';
        
        return $title;
    }
   
    //Functions for retrieving the data
    
    function get_audit_trail(){
        $this->db->from('audit_trail');
        $this->db->join('user', 'user.user_id = audit_trail.user_id');
        //making sure sadmin doesnt see his own audit trail
        if($this->user_m->role_id == SADMIN){
            //$this->db->where('audit_trail.user_id <>', $this->user_m->user_id);
        }
        $this->db->select('audit_trail.*, user.full_name');
        $this->db->order_by('audit_trail.registered', 'desc');
        $this->db->where('audit_trail.registered >=', $this->s_date_r);
        $edate = $this->e_date_r.' 23:59:59';
        $this->db->where('audit_trail.registered <=', $edate);
        if ($this->created_by_r != 'all'){
            $this->db->where('audit_trail.user_id',$this->created_by_r);
        }
        $this->db->limit(1000);
        $result= $this->db->get()->result_array();
        if(count($result)){
            $data = $result;
        }else{
            $data = array();
        }
        $this->data_container = $data;
    }
    
    function get_mfo_audit_trail(){
        $this->db->from($this->mfo_logs);
        $this->db->join($this->mfo, $this->mfo.'.device_imei = '.$this->mfo_logs.'.imei');
        $this->db->select($this->mfo_logs.'.*, '.$this->mfo.'.full_name, '.$this->mfo.'.device_imei, '.$this->mfo.'.device_mobile, ');
        $this->db->order_by($this->mfo_logs.'.registered', 'desc');
        $this->db->where($this->mfo_logs.'.registered >=', $this->s_date_r);
        $edate = $this->e_date_r.' 23:59:59';
        $this->db->where($this->mfo_logs.'.registered <=', $edate);
        if ($this->mfo_id_r != 'all'){
            $this->db->where($this->mfo.'.user_id',$this->mfo_id_r);
        }
        $this->db->limit(400);
        $result= $this->db->get()->result_array();
        if(count($result)){
            foreach($result as $row){
                $row['registered'] = $this->prepare_date($row['registered']);
                $data[] = $row;
            }
        }else{
            $data = array();
        }
        $this->data_container = $data;
    }
    
    
    function get_users_data(){
        $this->db->from('user');
        $this->db->join('user_role', 'user_role.role_id = user.role_id');
        $this->db->join('municipal', 'user.municipal_id = municipal.municipal_id', 'left');
        $this->db->join('user_credentials', 'user_credentials.user_id = user.user_id');
        $this->db->select('user.*, user_role.name AS profile, user_credentials.status AS user_status, municipal_name');
        $this->db->where(array('user_role.role_id !=' => SADMIN));
        
        $this->db->where('user.created >=', $this->s_date_r);
        $edate = $this->e_date_r.' 23:59:59';
        $this->db->where('user.created <=', $edate);
        if ($this->status_r != 'all'){
            $this->db->where('user_credentials.status =', $this->status_r);
        }
        if ($this->role_id_r != 'all'){
            $this->db->where('user.role_id =', $this->role_id_r);
        }
        if ($this->municipal_id_r != 'all'){
            $this->db->where('user.municipal_id =', $this->municipal_id_r);
        }
        if($this->created_by_r != 'all'){
            $this->db->where('user.created_by', $this->created_by_r);
        }
        if($this->authorised_by_r != 'all'){
            $this->db->where('user.authorised_by', $this->authorised_by_r);
        }
        $this->db->order_by('user.created', 'desc');
        $result= $this->db->get()->result_array();
        if(count($result)){
            foreach ($result as $key => $row) {
                $row['created_by'] = $this->user_m->get_value($row['created_by'], 'full_name');
                $row['authorised_by'] = $this->user_m->get_value($row['authorised_by'], 'full_name');
                $result[$key] = $row;
            }
        }
        $this->data_container = $result;
    }
 
    function get_ft(){
        $this->db->from('archived_transfer');
        $this->db->join('municipal', 'municipal.municipal_id = archived_transfer.municipal_id');
        $this->db->where('reg_date >=', $this->s_date_r);
        $edate = $this->e_date_r.' 23:59:59';
        $this->db->where('reg_date <=', $edate);
        if ($this->narration_r != 'all'){
            $this->db->where('narration =', $this->narration_r);
        }
        if ($this->status_r != 'all'){
            $this->db->where('archived_transfer.status =', $this->status_r);
        }
        if ($this->teller_code_r != 'all'){
            $this->db->where('archived_transfer.teller_code =', $this->teller_code_r);
        }
        if ($this->municipal_id_r != 'all'){
            $this->db->where('archived_transfer.municipal_id =', $this->municipal_id_r);
        }
        $this->db->order_by('reg_date desc');
        $this->data_container = $this->db->get()->result_array();
    }

    function get_inquiries(){
        $this->db->from('archived_inquiries');
        $this->db->join('municipal', 'municipal.municipal_id = archived_inquiries.municipal_id');
        $this->db->where('reg_date >=', $this->s_date_r);
        $edate = $this->e_date_r.' 23:59:59';
        $this->db->where('reg_date <=', $edate);
        if ($this->narration_r != 'all'){
            $this->db->where('narration =', $this->narration_r);
        }
        if ($this->status_r != 'all'){
            $this->db->where('archived_inquiries.status =', $this->status_r);
        }
        if ($this->teller_code_r != 'all'){
            $this->db->where('archived_inquiries.teller_code =', $this->teller_code_r);
        }
        if ($this->municipal_id_r != 'all'){
            $this->db->where('archived_inquiries.municipal_id =', $this->municipal_id_r);
        }
        $this->db->order_by('reg_date desc');
        $this->data_container = $this->db->get()->result_array();
    }

    function get_bills(){
        $this->db->from('archived_bills');
        $this->db->join('municipal', 'municipal.municipal_id = archived_bills.municipal_id');
        $this->db->where('reg_date >=', $this->s_date_r);
        $edate = $this->e_date_r.' 23:59:59';
        $this->db->where('reg_date <=', $edate);
        if ($this->narration_r != 'all'){
            $this->db->where('narration =', $this->narration_r);
        }
        if ($this->status_r != 'all'){
            $this->db->where('archived_bills.status =', $this->status_r);
        }
        if ($this->teller_code_r != 'all'){
            $this->db->where('archived_bills.teller_code =', $this->teller_code_r);
        }
        if ($this->municipal_id_r != 'all'){
            $this->db->where('archived_bills.municipal_id =', $this->municipal_id_r);
        }
        $this->db->order_by('reg_date desc');
        $this->data_container = $this->db->get()->result_array();
    }

    function get_pos(){
        $this->db->from('pos');
        $this->db->join('municipal', 'pos.municipal_id = municipal.municipal_id');
        $this->db->select('pos.*, municipal_name');
        $this->db->where('data_status', ACTIVE_DATA);
        $this->db->where('pos.created >=', $this->s_date_r);
        $edate = $this->e_date_r.' 23:59:59';
        $this->db->where('pos.created <=', $edate);
        
        if ($this->municipal_id_r != 'all'){
            $this->db->where('pos.municipal_id =', $this->municipal_id_r);
        }
        if($this->created_by_r != 'all'){
            $this->db->where('pos.created_by', $this->created_by_r);
        }
        if($this->authorised_by_r != 'all'){
            $this->db->where('pos.authorised_by', $this->authorised_by_r);
        }
        $this->db->order_by('pos.created', 'desc');
        $result = $this->db->get()->result_array();
        if(count($result)){
            foreach ($result as $key => $row) {
                $row['created_by'] = $this->user_m->get_value($row['created_by'], 'full_name');
                $row['authorised_by'] = $this->user_m->get_value($row['authorised_by'], 'full_name');
                $result[$key] = $row;
            }
        }
        $this->data_container = $result;
    }

    function get_pos_assignment(){
        $this->db->from('teller_assignment');
        $this->db->join('pos', 'pos.pos_id = teller_assignment.pos_id');
        $this->db->join('pos_teller', 'pos_teller.teller_account = teller_assignment.teller_account');
        $this->db->join('municipal', 'municipal.municipal_id = pos.municipal_id');
        $this->db->select('teller_assignment.*, teller_assignment.teller_account AS account, teller_assignment.created AS assigned,municipal_name, full_name, pos_name, device_imei');
        $this->db->where('pos_teller.status', ACTIVE_DATA);
        $this->db->where('teller_assignment.created >=', $this->s_date_r);
        $edate = $this->e_date_r.' 23:59:59';
        $this->db->where('teller_assignment.created <=', $edate);
        if ($this->municipal_id_r != 'all'){
            $this->db->where('pos.municipal_id =', $this->municipal_id_r);
        }
        if($this->created_by_r != 'all'){
            $this->db->where('teller_assignment.created_by', $this->created_by_r);
        }
        $this->db->order_by('teller_assignment.created', 'desc');
        $result = $this->db->get()->result_array();
        if(count($result)){
            foreach ($result as $key => $row) {
                $row['created_by'] = $this->user_m->get_value($row['created_by'], 'full_name');
                $result[$key] = $row;
            }
        }
        $this->data_container = $result;
    }

    function get_summary_cheques($status=false){
        $this->db->from('cheques');
        $this->db->join('municipal', 'municipal.municipal_id = cheques.municipal_id');
        $this->db->select('cheques.*, municipal_name');
        $this->db->where('cheques.uploaded_on >=', $this->s_date_r);
        $edate = $this->e_date_r.' 23:59:59';
        $this->db->where('cheques.uploaded_on <=', $edate);
        if ($this->municipal_id_r != 'all'){
            $this->db->where('cheques.municipal_id =', $this->municipal_id_r);
        }
        if ($this->cheque_type_r != 'all'){
            $this->db->where('cheques.cheque_type =', $this->cheque_type_r);
        }
        if($status){
            if($status == PENDING_CHEQUE){
               $this->db->where('cheques.status', $status);
               $this->db->or_where('cheques.status', PARTIAL_COMPLETE_CHEQUE); 
            }else{
                $this->db->where('cheques.status', $status);
            }
        }else{
            if ($this->status_r != 'all'){
                $this->db->where('cheques.status =', $this->status_r);
            }
        }
        if($this->created_by_r != 'all'){
            $this->db->where('cheques.uploaded_by', $this->created_by_r);
        }
        if($this->created_by_r != 'all'){
            $this->db->where('cheques.uploaded_by', $this->created_by_r);
        }
        if($this->signatory_a_r != 'all'){
            $this->db->where('cheques.category_a', $this->signatory_a_r);
        }
        if($this->signatory_b_r != 'all'){
            $this->db->where('cheques.category_b', $this->signatory_b_r);
        }
        $this->db->order_by('uploaded_on desc');
        $result = $this->db->get()->result_array();
        if($status == COMPLETED_CHEQUE){
            foreach ($result as $key => $row) {
                $row['category_a'] = $this->user_m->get_value($row['category_a'], 'full_name');
                $row['category_b'] = $this->user_m->get_value($row['category_b'], 'full_name');
                $row['category_a_date'] = prepare_date($row['category_a_date']);
                $row['category_b_date'] = prepare_date($row['category_b_date']);
                $result[$key] = $row;
            }
        }elseif($status == REJECTED_CHEQUE){
            foreach ($result as $key => $row) {
                $row['rejected_by'] = $this->user_m->get_value($row['rejected_by'], 'full_name');
                $row['rejected_date'] = prepare_date($row['rejected_date']);
                $result[$key] = $row;
            }
        }

        $this->data_container = $result;

    }

    
    function set_total(){
        $data = $this->data_container;
        foreach($data as $row){
            if(isset($row['registration_status'])){
                switch($row['registration_status']){
                    case COMPLETE_REG:
                            $this->total_completed++;
                            break;
                    case PENDING_REG: 
                            $this->total_pending++;
                            break;
                    case PARTIAL_COMPLETE_REG: 
                            $this->total_pending++;
                            break;
                    case FAILED_REG: 
                            $this->total_failed++;
                            break;  
                    case CPDCHECKER_REJECT_REG: 
                            $this->total_failed++;
                            break;    
                }
            }
        }
    }
  
    
    
    
    function get_id_value($filter_name){
        $value = $this->$filter_name;  
       switch ($filter_name) {
            case 'municipal_id_r':
                return $this->tb_value(array('municipal_id'=>$value), 'municipal', 'municipal_name');
                break;
            case 'role_id_r':
                return $this->tb_value(array('role_id'=>$value), 'user_role', 'name');
                break;
            case 'created_by_r':
                return $this->user_m->get_value($value, 'full_name');
                break;
            case 'signatory_a_r':
                return $this->user_m->get_value($value, 'full_name');
                break;
            case 'signatory_b_r':
                return $this->user_m->get_value($value, 'full_name');
                break;
            case 'authorised_by_r':
                return $this->user_m->get_value($value, 'full_name');
                break;
            case 'narration_r':
                return prepare_narration($value);
                break;
            case 'status_r':
                return strip_tags(prepare_status($value));
                break;
            case 'cheque_type_r':
                return strip_tags(prepare_status($value));
                break;
            case 'teller_code_r':
                return $this->tb_value(array('teller_code'=>$value), 'pos_teller', 'full_name');
                break;
            default:
                return $value;
                break;
        }
    }
    
    
}