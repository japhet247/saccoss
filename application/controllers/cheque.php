<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cheque extends MY_Controller {

	function __construct(){
		parent::__construct('municipal payments');
		$this->load->model('cheque_m');
	}

    function add(){
            has_function_access('add municipal cheque');
            $this->load->model('municipal_account_m', 'account_m');
            if($this->user_m->municipal_id)
                    $this->data['accounts'] = $this->account_m->get_by(array('municipal_id' => $this->user_m->municipal_id));
            if($this->form_validation->run('cheque_file_form') == TRUE){
                    $config['overwrite'] = false;
                    $config['allowed_types'] = 'xls|xlsx';
                    $config['max_size'] = 8000;
                    $config['upload_path'] = './Files/Chequelists';
                    $config['encrypt_name'] = true;
                    $this->load->library('upload', $config);
                    if (!$this->upload->do_upload()) {
                        $this->data['message'] = $this->cheque_m->custom_msg($this->upload->display_errors(), 'danger'); 
                        $this->data['success'] = false;  
                    } else {
                        $file = $this->upload->data();
                        $posted = $this->cheque_m->get_posts();
                        $save['file_name'] = $file['file_name'];
                        $save['original_name'] = $file['orig_name'];
                        $save['account'] = $posted['account'];
                        $this->cheque_m->save_file($save);
                        $msg = 'Cheque List is being processed. Please refresh this page after one minute to see the changes';
                        $this->set_redirect_msg($msg);
                        redirect('en/cheque/files');
                    }
            }else{
                 $this->data['message'] = $this->cheque_m->set_errors();   
            }
            $this->data['title'] = 'Municipal payments';
            $this->data['page_title'] = 'Fill the Form Below';
            $this->twig->display('forms/municipal_payment.html.twig', $this->data);
    }

    function files(){
            has_function_access('view cheque files');
            $this->data['rows'] = $this->cheque_m->get_uploaded_files();
            $this->data['columns'] = array('original_name', 'created', 'total_uploads', 'success' , 'failed', 'status');
            $this->data['action_btn'] = TRUE;
            $this->data['hide_nav'] = TRUE;
            $this->data['title'] = 'Municipal Cheque Files';
            $this->data['table_title'] = 'tb_uploaded_files';
            $this->twig->display('site_table.html.twig', $this->data);
    }

    function approved(){
            has_function_access('view approved cheque');
            $this->data['rows'] = $this->cheque_m->approved_cheques();
            $this->data['hide_nav'] = TRUE;
            $this->data['columns'] = array('cheque_no', 'voucher_no', 'amount', 'fund_desc', 'payee', 'cheque_type', 'municipal_account' ,'approval_1', 'approval_2', 'payment_status');
            $this->data['title'] = 'Approved Cheques';
            $this->data['table_title'] = 'tb_approved_cheques';
            $this->twig->display('site_table.html.twig', $this->data);

    }

        function pending(){
                has_function_access('view pending cheque');
                switch ($this->user_m->role_id) {
                        case CHEQUE_SIGNATORY:
                                $data = $this->cheque_m->pending_cheques();
                                $this->data['action_btn'] = TRUE;
                                break;
                        
                        default:
                                $data = $this->cheque_m->cheque_details();
                                $this->data['action_btn'] = FALSE;
                                break;
                }
                $this->data['hide_nav'] = TRUE;
                $this->data['rows'] = $data;
                $this->data['columns'] = array('cheque_no', 'voucher_no', 'amount', 'fund_desc', 'payee' , 'cheque_type', 'municipal_account');
                $this->data['title'] = 'Pending Cheques';
                $this->data['table_title'] = 'tb_pending_cheques';
                $this->twig->display('site_table.html.twig', $this->data); 

        }

    function rejected(){
            has_function_access('view failed cheque');
            $this->data['rows'] = $this->cheque_m->rejected_cheques();
            $this->data['columns'] = array('cheque_no', 'voucher_no', 'amount', 'fund_desc', 'payee' , 'cheque_type', 'municipal_account', 'rejected_by', 'rejected_date');
            $this->data['title'] = 'Rejected Cheques';
            $this->data['hide_nav'] = TRUE;
            $this->data['action_btn'] = TRUE;
            $this->data['table_title'] = 'tb_failed_cheques';
            $this->twig->display('site_table.html.twig', $this->data); 
    }

    function authorize(){
        has_function_access('authorize cheque');
            $cheque_no = $this->input->post('cheque_no', TRUE);
            if($this->cheque_m->approve($cheque_no)){
                    echo '<span class="label bg-success">Approved</span>';
            }else{
                    echo '<span class="label bg-danger">Failed</span>';
            }
    }

    function reject(){
        has_function_access('reject cheque');
        $cheque_no = $this->uri->segment(4);
        $predefined = $this->input->post('comment_predefined', TRUE);
        if($predefined == 'other'){
            if($this->form_validation->run('reject_form') == TRUE){
                $comment = $this->input->post('comment');
                $this->cheque_m->reject($cheque_no, $comment);
                $data['title'] = 'Cheque successfully rejected';
                $data['message_type'] = 'success';
                $data['message'] = $data['title'];
                $data['close'] = TRUE;
                $data['reload'] = TRUE;
                $this->twig->display('message.html.twig', $data);
            }else{
                $data['url'] = 'en/cheque/reject/'.$cheque_no;
                $data['title'] = 'Provide Rejection reason';
                $data['cheque_rejection'] = TRUE;
                $data['rejection_reasons'] = $this->cheque_m->get_form_options(false, 'cheque_rejection_reason');
                $data['error'] = $this->cheque_m->custom_msg(form_error('comment'), 'danger');
                $this->twig->display('forms/reject_form.html.twig' , $data);
            }
        }else{
            if($this->form_validation->run('cheque_reject_form') == TRUE){
                $this->cheque_m->reject($cheque_no, $predefined);
                $data['title'] = 'Cheque successfully rejected';
                $data['message_type'] = 'success';
                $data['message'] = $data['title'];
                $data['close'] = TRUE;
                $data['reload'] = TRUE;
                $this->twig->display('message.html.twig', $data);
            }else{
                $data['url'] = 'en/cheque/reject/'.$cheque_no;
                $data['title'] = 'Provide Rejection reason';
                $data['cheque_rejection'] = TRUE;
                $data['rejection_reasons'] = $this->cheque_m->get_form_options(false, 'cheque_rejection_reason');
                $data['error'] = $this->cheque_m->custom_msg(form_error('comment_predefined'), 'danger');
                $this->twig->display('forms/reject_form.html.twig' , $data);
            }
        }
    }

    function reject_form(){
        has_function_access('reject cheque');
        $cheque_no = $this->uri->segment(4);
        $data['url'] = 'en/cheque/reject/'.$cheque_no;
        $data['title'] = 'Provide Rejection reason';
        $data['cheque_rejection'] = TRUE;
        $data['rejection_reasons'] = $this->cheque_m->get_form_options(false, 'cheque_rejection_reason');
        $this->twig->display('forms/reject_form.html.twig' , $data);
    }

    function download_failed($upload_id){
        $data = $this->cheque_m->get_failed($upload_id);
        if($data){
            $this->cheque_m->download_excel($data);
        }else{
            $msg = 'Cheques could not be downloaded.';
            $this->set_redirect_msg($msg, 'danger');
            redirect('en/cheque/files');
        }
    }

}