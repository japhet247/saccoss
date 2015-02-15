<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Reports extends MY_Controller {

    public $ft_narrations  = array( 'SBCHQW', 'SBTFO', 'SBTIS', 'SBDEP', 'SBTF', 'SBMSB', 'SBMSN', 'SBTRA', 'SBWD', 'SBTISC', 'SBVIN', 'SBVOUT');
    public $bills_narrations = array('DAWASCO', 'LUKU', 'DSTV', 'ZUKU');
    public $inquiries_narrations = array('TXACC', 'TXST');
    public $filter_user_status = array(ACTIVE, AUTHORISED, BLOCKED);
    public $filter_txn_status = array(FAILED_TX,COMPLETED_TX,TERMINATED_TX);
    public $filter_cheque_type = array(CLOSED_CHEQUE,OPEN_CHEQUE);
    public $filter_cheque_status = array(PENDING_CHEQUE, COMPLETED_CHEQUE,PARTIAL_COMPLETE_CHEQUE,REJECTED_CHEQUE,PAID_CHEQUE,UNPAID_CHEQUE);
	function __construct(){
		parent::__construct('view reports');
        $this->config->load('reports');
        $this->load->model('report_m');
        $this->data['reports'] = TRUE;
        $this->data['hide_nav'] = TRUE;
	}

    function get($report_type){
        $this->_set_report($report_type);
        $this->twig->display('includes/table.html.twig', $this->data);
    }

    function all(){
        $groups = array();
        $reports = $this->report_m->reports;
        foreach($reports as $r){
            $data = $this->config->item($r);
            $groups[] = array('link' => 'en/reports/load_report/'.$r, 'value' => $data['name']);
        }
        $this->data['title'] = 'Available Reports';
        $this->data['check_permission'] = TRUE;
        $this->data['groups'] = $groups;

        $this->twig->display('group.html.twig', $this->data);
    }

    function load_report($type){
        $data = $this->config->item($type);
        $groups = array();
        if(!empty($data)){
            foreach($data['sub_reports'] as $k => $v){
                $groups[] = array('link' => 'en/reports/filters/'.$k, 'value' => $v);
            }
        }else{
            $groups[] = array('link' => false, 'value' => 'No Report found');
        }
        $this->data['check_permission'] = TRUE;
        $this->data['groups'] = $groups;
        $this->twig->display('list.html.twig',$this->data);

    }

    public function download(){
        $type = $this->uri->segment(4);
        //Load the current filters from session and get the fields and data 
        $this->report_m->report_type_r = $this->session->userdata('report_type_r'); 
        $this->report_m->load_from_session();   
        $this->report_m->set_report();
        $fields = $this->report_m->current_fields;
        $report_title = $this->report_m->report_title();
        
        if($type == 'excel'){
            // This function is responsible for drawing the Excel file.
            $this->load->library('excel');
            // Set the cell sizes
            //The maximum number of fields is currently 10
            $cells = array('A','B','C','D','E','F','G','H','I','J','K','L');
            
            //Prepare the cells width
            $limit = count($fields);
            //First field is for the numbering
            $this->excel->setActiveSheetIndex(0)->getColumnDimension('A')->setWidth(5);
            $total_columns = 0;
            for($i=1; $i<=$limit; $i++){
                $this->excel->setActiveSheetIndex(0)->getColumnDimension($cells[$i])->setWidth(18);
                $total_columns++;
            }
            
            
            // Set the Main title
            $this->excel->setActiveSheetIndex(0)->mergeCells('A1:'.$cells[$total_columns].'1');
            $this->excel->getActiveSheet()->getStyle("A1")->getFont()->setSize(16);
            $this->excel->getActiveSheet()->getStyle("A1")->getFont()->setBold(true);
            $this->excel->setActiveSheetIndex(0)->setCellValue('A1', $this->report_m->download_title);
           
            // Set the filters
            
            //Set the date filters
            $filters = $this->report_m->filter_fields;
            
            $this->excel->setActiveSheetIndex(0)->mergeCells('A3:B3');
            $this->excel->setActiveSheetIndex(0)->setCellValue('A3', $this->lang->line($filters[0]));
            $this->excel->setActiveSheetIndex(0)->setCellValue('C3', $this->report_m->$filters[0]);
            $this->excel->setActiveSheetIndex(0)->mergeCells('A4:B4');
            $this->excel->setActiveSheetIndex(0)->setCellValue('A4', $this->lang->line($filters[1]));
            $this->excel->setActiveSheetIndex(0)->setCellValue('C4', $this->report_m->$filters[1]);
            
            //Set other filters        
            
            $no_filters = count($filters);
            $filter_cell_index = 5;
            if ($no_filters > 3){
                for($i=4;$i<$no_filters;$i++){
                if ($this->report_m->$filters[$i] != 'all' ){
                    $this->excel->setActiveSheetIndex(0)->mergeCells('A'.$filter_cell_index.':B'.$filter_cell_index);
                    $this->excel->setActiveSheetIndex(0)->setCellValue('A'.$filter_cell_index, $this->lang->line($filters[$i]));
                    $this->excel->setActiveSheetIndex(0)->setCellValue('C'.$filter_cell_index, $this->report_m->get_id_value($filters[$i]));
                    $filter_cell_index++;
                }
                
                }    
            }
            
            // Set report totals
            // Set the filters
            $totals = $this->report_m->report_totals;
            $no_totals = count($totals);
            $total_cell_index = 3;
            for($i=0;$i< $no_totals;$i++){
                if ($this->report_m->$totals[$i] != 0 ){
                    $this->excel->setActiveSheetIndex(0)->setCellValue('E'.$total_cell_index, $this->lang->line($totals[$i]));
                    $this->excel->setActiveSheetIndex(0)->setCellValue('F'.$total_cell_index, $this->report_m->$totals[$i]);
                    $total_cell_index++;
                }
                
            }
            
            // Set the title For the Records
            // Get the record title position
            $header_position = 5;
            if ($total_cell_index > $filter_cell_index){
                $header_position = $total_cell_index + 1; 
            }else{
                $header_position = $filter_cell_index + 1;
            }
            $this->excel->getActiveSheet()->getStyle('A'.$header_position.':'.$cells[$total_columns].$header_position)->getFont()->setBold(true);
            $this->excel->getActiveSheet()->getStyle('A'.$header_position.':'.$cells[$total_columns].$header_position)->getFill()->applyFromArray(array('type' => PHPExcel_Style_Fill::FILL_SOLID,'startcolor' => array('rgb' => '68D57A')));
            $this->excel->setActiveSheetIndex(0)->setCellValue('A'.$header_position,'No');
            $i = 1;
            foreach($fields as $f){
               $this->excel->setActiveSheetIndex(0)->setCellValue($cells[$i].$header_position, $this->lang->line($f)); 
               $i++;
            }
            
                        
            // Fill in the records of the filtered products
            $index = $header_position + 1;
            $count = 1;
            foreach($this->report_m->data_container as $data){
                $this->excel->setActiveSheetIndex(0)->setCellValue('A'.$index, $count);
                $i = 1;
                foreach($fields as $f){
                    if($f == 'user_status'){
                        $data[$f] = strip_tags(prepare_status($data[$f]));
                    }elseif($f == 'narration'){
                        $data[$f] = prepare_narration($data[$f]);
                    }
                    elseif($f == 'message'){
                        $data[$f] = strip_tags($data[$f]);
                    }
                   $this->excel->setActiveSheetIndex(0)->setCellValue($cells[$i].$index, $data[$f]); 
                   $i++;
                }       
                $index++;$count++;
            }
            // Redirect output to a client's web browser (Excel2007)
            header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
            header('Content-Disposition: attachment;filename="'.$this->report_m->download_title.'.xlsx"');
            header('Cache-Control: max-age=0');
            
            $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel2007');
            $objWriter->save('php://output');
            
            $message = 'Downloaded '.$report_title .' in <strong>excel</strong> format';
            //$this->sys_user->grab_trail_message($message);
            
            exit;
        }elseif($type == 'pdf'){
            
            $this->load->helper('fpdf');
            $pdf = new PDF();
            
            if(($this->report_m->report_type_r == 'users') || ($this->report_m->report_type_r == 'mfos')){
                $pdf->landscape = TRUE;
            }
            $header = $fields;
            $displayHeader = array();
            for($i=0;$i<count($header);$i++){
                $displayHeader[] = $this->lang->line($header[$i]);
            }
            $data = $this->report_m->data_container;
            
            if(($this->report_m->report_type_r == 'users') || ($this->report_m->report_type_r == 'mfos') || ($this->report_m->report_type_r == 'completed_accounts') || ($this->report_m->report_type_r == 'time_report') || ($this->report_m->description_r == 'cpd_checker_pending')  || ($this->report_m->description_r == 'cpd_checker_maker_failed')|| ($this->report_m->description_r == 'cpd_mfo_failed') ||($this->report_m->description_r == 'detailed')){
                $pdf->AddPage('L');
            }else{
                $pdf->AddPage();
            }
            
            $pdf->SetLeftMargin(15);
            $pdf->reportTitle('<span style="text-align:center;">'.$this->report_m->report_title().'</span>','https://fao.crdbbank.com/admin/images/logo.png'); //base_url().'admin/images/logo.png');
            $headerW = array(50, 50, 40, 40);
            
            if($this->report_m->description_r == 'detailed'){
                $pdf->SetLeftMargin(20);
                $pdf->landscape = TRUE;
                $headerW = array(65, 50, 60, 40, 45);
            }
            
            if($this->report_m->report_type_r == 'failed_accounts'){
                $pdf->SetLeftMargin(5);
                if($this->report_m->description_r == 'cpd_checker_maker_failed'){
                    $headerW = array(40, 50, 50, 50, 97);
                }elseif($this->report_m->description_r == 'cpd_mfo_failed'){
                    $headerW = array(40, 50, 50, 147);
                }
            }elseif($this->report_m->report_type_r == 'users') {
                $pdf->landscape = TRUE;
                $pdf->SetLeftMargin(2);
                $headerW = array(52, 45, 43, 35, 42, 35, 42);
            }elseif($this->report_m->report_type_r == 'mfos'){
                if($this->report_m->description_r == 'mfos_created'){
                    $pdf->landscape = TRUE;
                    $pdf->SetLeftMargin(2);
                    $headerW = array(52, 45, 43, 35, 42, 35, 42);
                }elseif($this->report_m->description_r == 'mfos_devices'){
                    $pdf->landscape = TRUE;
                    $pdf->SetLeftMargin(20);
                    $headerW = array(60, 45, 65, 65);
                }elseif($this->report_m->description_r == 'mfos_details'){
                    $pdf->landscape = TRUE;
                    $pdf->SetLeftMargin(15);
                    $headerW = array(60, 45, 60, 40, 60);
                }
                
            }elseif($this->report_m->report_type_r == 'packs'){
                $headerW = array(65, 40, 40, 35) ;
                if($this->report_m->description_r == 'packs_ranges'){
                    $pdf->SetLeftMargin(5);
                    $headerW = array(50, 35, 35, 30, 50);
                }
            }elseif($this->report_m->report_type_r == 'pending_accounts'){
                $headerW = array(45, 55, 40, 40) ;
                if($this->report_m->description_r == 'cpd_checker_pending'){
                    $pdf->SetLeftMargin(5);
                    $headerW = array(55, 60, 40, 60, 40);
                }
            }elseif($this->report_m->report_type_r == 'completed_accounts'){
                $pdf->SetLeftMargin(5);
                $headerW = array(35, 48, 37, 48, 37, 48, 37);
            }elseif($this->report_m->report_type_r == 'time_report'){
                $pdf->SetLeftMargin(5);
                $headerW = array(38, 50, 50, 50, 50, 50);
            }
            
            $pdf->Ln(7);
            $pdf->FancyTable($header, $data, $displayHeader, $headerW);
            $pdf->Output($this->report_m->download_title.'.pdf', 'D');
            $message = 'Downloaded '.$report_title .' in <strong>pdf</strong> format';
            $this->sys_user->grab_trail_message($message);
            exit;
        }
    }
    
    function _set_report($type){
        $this->data['report_type'] = $this->report_m->report_type_r = $type;
        $this->session->set_userdata('report_type_r', $type);
        $this->report_m->grab_filters();
        $this->report_m->set_report();
        $this->data['columns'] = $this->report_m->current_fields;
        $this->data['rows'] = $this->report_m->data_container;
        $report_title = $this->report_m->report_title();
        $this->data['report_title'] = $report_title;
    }
}