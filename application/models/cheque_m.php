<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cheque_M extends MY_Model
{
	protected $_table_name = 'cheques';
	protected $_primary_key = 'cheque_id';
	protected $_order_by = 'uploaded_on desc';
	public $fields = array('account');
	public $excel_fields = array('cheque_no', 'voucher_no', 'amount', 'fund_desc', 'payee', 'remarks', 'description');
	public $data_container;

	function __construct(){
		parent::__construct();
	}

	function save_file($data){
		$data['status'] = PENDING_FILE;
		$data['upload_id'] = $this->generate_id();
		$data['municipal_id'] = $this->user_m->municipal_id;
		$data['user_id'] = $this->user_m->user_id;
		$data['created'] = $this->GT();
		$this->db->insert('uploaded_files', $data);
		$msg = 'Uploaded Cheque List file <strong>'.$data['original_name'].'</strong>';
		$this->user_m->grab_trail_message($msg);
	}

	function get_uploaded_files(){
		$this->db->where('user_id', $this->user_m->user_id);
		$this->db->order_by('created desc');
		return $this->db->get('uploaded_files')->result_array();
	}

	function cheque_details($status = PENDING_CHEQUE, $municipal_id = false){
		$this->db->where($this->_table_name.'.status', $status);
		$this->db->from($this->_table_name);
		if($municipal_id) $this->db->where($this->_table_name.'.municipal_id', $municipal_id);
		return $this->db->get()->result_array();
	}

	function pending_cheques(){
		$this->db->where('status', PENDING_CHEQUE);
		$this->db->or_where('status', PARTIAL_COMPLETE_CHEQUE);
		$this->db->where('municipal_id', $this->user_m->municipal_id);
		$this->db->order_by($this->_order_by);
		$cheques = $this->db->get($this->_table_name)->result_array();
		$data = array();
		if($cheques){
			foreach ($cheques as $c) {
				$this->db->where('status', ACTIVE_DATA);
				$this->db->where('user_id', $this->user_m->user_id);
				$this->db->where('municipal_account', $c['municipal_account']);
				$signatory = $this->db->get('map_signatories')->row_array();
				if($signatory){
					if(($c['status'] == PENDING_CHEQUE) && ($signatory['category'] == CATEGORY_B)){
						$data[] = $c;
					}elseif(($c['status'] == PARTIAL_COMPLETE_CHEQUE) && ($signatory['category'] == CATEGORY_A)){
						$data[] = $c;
					}
				}
			}
		}
		return $data;
	}

	function approve($cheque_no){
		$cheque = $this->db->where('cheque_no', $cheque_no)->get($this->_table_name)->row_array();
		if(!$cheque) return false;
		if(($cheque['status'] == PENDING_CHEQUE) && (!$cheque['category_a'])){
			$this->db->where('cheque_no', $cheque_no);
			$this->db->update($this->_table_name, array('status' => PARTIAL_COMPLETE_CHEQUE, 'category_a' => $this->user_m->user_id, 'category_a_date' => $this->GT()));
			$msg = 'Approved Cheque No <strong>'.$cheque_no.'</strong>';
			$this->save_trail($msg);
			return true;
		}elseif(($cheque['status'] == PARTIAL_COMPLETE_CHEQUE) && (!$cheque['category_b'])){
			$this->db->where('cheque_no', $cheque_no);
			$this->db->update($this->_table_name, array('status' => COMPLETED_CHEQUE, 'category_b' => $this->user_m->user_id, 'category_b_date' => $this->GT()));
			$this->my_api->increase_municipal_limit($cheque['municipal_account'], $cheque['amount']);
			$msg = 'Approved Cheque No <strong>'.$cheque_no.'</strong>';
			$this->save_trail($msg);
			return true;
		}
		return false;
	}

	function reject($cheque_no, $comment){
		$this->db->where('cheque_no', $cheque_no);
		$this->db->update($this->_table_name, array('status' => REJECTED_CHEQUE, 'rejected_by' => $this->user_m->user_id, 'rejected_date' => $this->GT(), 'rejection_comment'=>$comment));
		$msg = 'Rejected Cheque No <strong>'.$cheque_no.'</strong>';
		$this->save_trail($msg);
	}

	function approved_cheques(){
		$this->db->where('status', PARTIAL_COMPLETE_CHEQUE);
		$this->db->or_where('status', COMPLETED_CHEQUE);
		$this->db->select($this->_table_name.'.*, category_a AS approval_1, category_b AS approval_2');
		if($this->user_m->role_id == SADMIN){
			return $this->db->get($this->_table_name)->result_array();
		}
		$this->db->where('municipal_id', $this->user_m->municipal_id);
		$this->db->where('category_a', $this->user_m->user_id);
		$this->db->or_where('category_b', $this->user_m->user_id);
		$this->db->order_by($this->_order_by);
		return $this->db->get($this->_table_name)->result_array();
	}

	function rejected_cheques(){
		$this->db->where($this->_table_name.'.status', REJECTED_CHEQUE);
		$this->db->join('user', 'user.user_id = '.$this->_table_name.'.rejected_by');
		$this->db->select($this->_table_name.'.*, user.full_name as rejected_by');
		$this->db->order_by('rejected_date desc');
		if($this->user_m->role_id == SADMIN){
			return $this->db->get($this->_table_name)->result_array();
		}
		
		$this->db->where($this->_table_name.'.municipal_id', $this->user_m->municipal_id);

		return $this->db->get($this->_table_name)->result_array();
	}

	function download_failed($upload_id){
		$data = $this->get_failed($upload_id);
		if($data){
			$this->download_excel($data);
		}
	}

	function get_failed($upload_id){
		$this->_table_name = 'failed_cheques';
		$this->db->where('upload_id', $upload_id);
		$this->data_container = $this->db->get($this->_table_name)->result_array();
		return $this->data_container;
	}

	function download_excel($excel_data){
		// This function is responsible for drawing the Excel file.
            $this->load->library('excel');
            // Set the cell sizes
            //The maximum number of fields is currently 10
            $cells = array('A','B','C','D','E','F','G','H','I','J','K','L');

            for($i=0; $i<count($this->excel_fields); $i++){
            	switch ($cells[$i]) {
            		case 'E':
            			$this->excel->setActiveSheetIndex(0)->getColumnDimension($cells[$i])->setWidth(36);
            			break;
            		case 'G':
            			$this->excel->setActiveSheetIndex(0)->getColumnDimension($cells[$i])->setWidth(40);
            			break;
            		default:
            			$this->excel->setActiveSheetIndex(0)->getColumnDimension($cells[$i])->setWidth(18);
            			break;
            	}

            	
        	}

            $i = 0;
            $index = 1;
            foreach($this->excel_fields as $f){
               $this->excel->setActiveSheetIndex(0)->setCellValue($cells[$i].$index, $this->lang->line($f)); 
               $i++;
            }
            			
    	    // Fill in the records of the filtered products
            $index = 2;
            foreach($excel_data as $data){
                $i = 0;
                foreach($this->excel_fields as $f){
                   $this->excel->setActiveSheetIndex(0)->setCellValue($cells[$i].$index, $data[$f]); 
                   $i++;
                }       
                $index++;
            }
            $report_title = 'Failed_cheques';
    	    // Redirect output to a client's web browser (Excel2007)
    		header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    		header('Content-Disposition: attachment;filename="Failed_cheques.xlsx"');
    		header('Cache-Control: max-age=0');
    		
    		$objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
    		$objWriter->save('php://output');
            
    		exit;
	}
}