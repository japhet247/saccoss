<?php
function modal_btn($name, $class="btn btn-primary", $icon="", $url, $space = true, $delegated = false){
    if($space){
        if($delegated){
             echo '<a href="#" class = "delegated-popup-btn '.$class.'" data-toggle="modal" data-target="#myModal" id="'.site_url($url).'"><i class="'.$icon.'"></i>&nbsp;&nbsp;'.$name.'</a>';
        }else{
            echo '<a href="#" class = "popup-btn '.$class.'" data-toggle="modal" data-target="#myModal" id="'.site_url($url).'"><i class="'.$icon.'"></i>&nbsp;&nbsp;'.$name.'</a>';
        }
    }else{
        if($delegated){
            echo '<a href="#" class = "delegated-popup-btn '.$class.'" data-toggle="modal" data-target="#myModal" id="'.site_url($url).'"><i class="'.$icon.'"></i></a>';
        }else{
            echo '<a href="#" class = "popup-btn '.$class.'" data-toggle="modal" data-target="#myModal" id="'.site_url($url).'"><i class="'.$icon.'"></i></a>';
        }    
    }
}

function action_btn($name, $url, $icon="", $class="btn btn-default"){
    echo '<a  class = "'.$class.' btn-xs" href="'.site_url($url).'"><i class="'.$icon.'"></i>&nbsp;&nbsp; '.$name.'</a>'; 
}

// Function to get the client IP address
function get_client_ip() {
    $ipaddress = '';
    if (getenv('HTTP_CLIENT_IP'))
        $ipaddress = getenv('HTTP_CLIENT_IP');
    else if(getenv('HTTP_X_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
    else if(getenv('HTTP_X_FORWARDED'))
        $ipaddress = getenv('HTTP_X_FORWARDED');
    else if(getenv('HTTP_FORWARDED_FOR'))
        $ipaddress = getenv('HTTP_FORWARDED_FOR');
    else if(getenv('HTTP_FORWARDED'))
       $ipaddress = getenv('HTTP_FORWARDED');
    else if(getenv('REMOTE_ADDR'))
        $ipaddress = getenv('REMOTE_ADDR');
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

function prepare_date($datetime, $date=FALSE, $time = FALSE){
    $datetime = substr($datetime, 0, -4);
    if($date){
        $datetime = substr($datetime, 0, 10);
    }
    if($time){
        $datetime = substr($datetime, -8, 8);
    }
    return $datetime;
}

function check_browser(){
    $browser = get_browser(null, true);
    dump($browser);
}

function phone_validate($destination){
     //online Tanzanian mobile numbers are allowed
         $destination = str_replace(" ", "",$destination);
         $f2_chars = substr($destination,0,2);
         $f5_chars = substr($destination,0,5);
         $f4_chars = substr($destination,0,4);
         $len = strlen($destination);
         if (($len == 10) && (($f2_chars == '07') || ($f2_chars == '06'))){
            return '0'.substr($destination,1,$len);
         }elseif(($len == 13) && (($f5_chars == '+2557') || ($f5_chars == '+2556'))){
            return '0'.substr($destination,4,$len);
         }elseif(($len == 12) && (($f4_chars == '2557') || ($f4_chars == '2556'))){
            return '0'.substr($destination,3,$len);
         }else{
            return false;
         } 
}

function check_mobile($mobile){
	// Checks if the mobile number is valid
		$mobile = trim($mobile);
		if (is_numeric($mobile)){

			if ((strlen($mobile) >= 9) && (strlen($mobile) <=13)){
			
				$f2_chars = substr($mobile,0,2);
				$f5_chars = substr($mobile,0,5);
				$f4_chars = substr($mobile,0,4);
				$f2_array = array('07','06');
				$f3_array = array('+2557','+2556');
				$f4_array = array('2557','2556');
				
				$len = strlen($mobile);
				
				if (($len == 10) && (in_array($f2_chars,$f2_array))){
					return '255'.substr($mobile,1,$len);
				}elseif(($len == 13) && (in_array($f3_chars,$f3_array))){
					return substr($mobile,1,$len);
				}elseif(($len == 12) && (in_array($f4_chars,$f4_array))){
					return substr($mobile,0,$len);
				}else{
					return false;
				} 
				
			}else{
				return false;	
			}
		}else{
			return 'non-numeric';
		}
	
	}

if (!function_exists('dump')) {
    function dump ($var, $label = 'Dump', $echo = TRUE)
    {
        // Store dump in variable 
        ob_start();
        var_dump($var);
        $output = ob_get_clean();
        
        // Add formatting
        $output = preg_replace("/\]\=\>\n(\s+)/m", "] => ", $output);
        $output = '<pre style="background: #FFFEEF; color: #000; border: 1px dotted #000; padding: 10px; margin: 10px 0; text-align: left;">' . $label . ' => ' . $output . '</pre>';
        
        // Output
        if ($echo == TRUE) {
            echo $output;
        }
        else {
            return $output;
        }
    }
}


if (!function_exists('dump_exit')) {
    function dump_exit($var, $label = 'Dump', $echo = TRUE) {
        dump ($var, $label, $echo);
        exit;
    }
}

function has_permission($module_id, $user_id=false){
    $CI = &get_instance();
    //if no module_id is null, allow access
    if($module_id==null){
        return true;
    }
    if ($CI->user_m->isAdmin()) return true;
    if (!$user_id) $user_id = $CI->session->userdata('user_id');
    if ($user_id){
        $permissions = $CI->session->userdata('permissions');
        if ($permissions){
            if (in_array($module_id , $permissions)) {
                return true;
            }
        }
    }
    return false;
}

function has_function_access($module_id){
    if (has_permission($module_id)){
      // Do nothing   
    }else{
      //redirect
      show_error('Access Denied', 403);  
    }
}

function prepare_status($status){
    switch($status){
        case ACTIVE : return '<span class="label bg-success">ACTIVE</span>';
            break;
        case AUTHORISED : return '<span class="label bg-warning">AUTHORISED</span>';
            break;
        case BLOCKED : return '<span class="label bg-danger">BLOCKED</span>';
            break;
        case COMPLETED_FILE : return '<span class="label bg-success">COMPLETED</span>';
            break;
        case PENDING_FILE : return '<span class="label bg-info">PENDING</span>';
            break;
        case FAILED_FILE : return '<span class="label bg-danger">FAILED</span>';
            break;
        case PARTIAL_COMPLETED_FILE : return '<span class="label bg-warning">PARTIALLY COMPLETED</span>';
            break;
        case CORRUPTED_FILE : return '<span class="label bg-dark">CORRUPTED</span>';
            break;
        case CREATED_FILE : return '<span class="label bg-success">CREATED</span>';
            break;
        case FILE_UNKNOWN : return '<span class="label bg-danger">FILE UNKNOWN</span>';
            break;
        case FAILED_TX : return 'FAILED TRANSACTION';
            break;
        case COMPLETED_TX : return 'COMPLETED TRANSACTION';
            break;
        case TERMINATED_TX : return 'TERMINATED TRANSACTION';
            break;
        case CLOSED_CHEQUE : return 'CLOSED';
            break;
        case OPEN_CHEQUE : return 'OPEN';
            break;
        case BLOCKED_CHEQUE : return 'BLOCKED';
            break;
        case PENDING_CHEQUE : return 'PENDING CHEQUE';
            break;
        case COMPLETED_CHEQUE : return 'COMPLETED CHEQUE';
            break;
        case PARTIAL_COMPLETE_CHEQUE : return 'PARTIAL COMPLETE CHEQUE';
            break;
        case REJECTED_CHEQUE : return 'REJECTED CHEQUE';
            break;
        case PAID_CHEQUE : return 'PAID CHEQUE';
            break;
        case UNPAID_CHEQUE : return 'UNPAID CHEQUE';
            break;
    }
}

function check_category($cat){
    return ($cat) ? '<i class ="fa fa-check text-success text"></i>' : '<i class="fa fa-times text-danger text"></i>';
}

function is_paid_cheque($status){
    return ($status == PAID_CHEQUE) ? '<i class ="fa fa-check text-success text"></i>' : '<i class="fa fa-times text-danger text"></i>';
}
 
function prepare_narration($narration){
    switch($narration){
        case 'TXACC' : return 'BALANCE INQUIRY';
            break;
        case 'TXST' : return 'MINI STATEMENT';
            break;
        case 'SBCHQW' : return 'CHEQUE WITHDRAW';
            break;
        case 'SBTFO' : return 'OWN ACCOUNT';
            break;
        case 'SBTIS' : return 'TISS TRANSFER';
            break;
        case 'SBDEP' : return 'DEPOSIT';
            break;
        case 'SBTF' : return 'OTHER CRDB ACCOUNTS';
            break;
        case 'SBMSB' : return 'MUNICIPAL SERVICE';
            break;
        case 'SBMSN' : return 'MUNICIPAL SERVICE';
            break;
        case 'DAWASCO' : return 'DAWASCO';
            break;
        case 'LUKU' : return 'LUKU';
            break;
        case 'DSTV' : return 'DSTV';
            break;
        case 'SBTRA' : return 'TAX PAYMENT';
            break;
        case 'SBWD' : return 'CASH WITHDRAW';
            break;
        case 'TXBIL' : return 'BILL PAYMENT';
            break;
        case 'SBINST' : return 'INSTITUTIONAL PAYMENT';
            break;
        case 'SBTISC' : return 'CHEQUE TISS TRANSFER';
            break;
        case 'SBVIN' : return 'VAULT CASH IN';
            break;
        case 'SBVOUT' : return 'VAULT CASH OUT';
            break;
        case 'TXUBAC': return 'BALANCE INQUIRY';
            break;
        case 'SBCHQD': return 'CHEQUE DEPOSIT';
            break;

    }
}

function is_settings_edit($key){
    return ($key == SETTINGS_EDIT) ? true : false;
}

function is_card_unblocking($key){
    return ($key == UNBLOCK_CARD) ? true : false;
}

function is_commission_account($key){
    return ($key == COMMISSION_ACC_ADD) ? true : false;
}

function prepare_tiss_file($file){
    return '<a href = "'.TIS_PATH.$file.'" target = "_blank">'.$file.'</a>';
}

function check_municipal($municipal){
    return ($municipal) ? $municipal : 'HQ USER';
}

function prepare_limit($limit){
    return $limit * 1000000;
}

function set_sign_path($src){
    return base_url().SIGNATURES_PATH.$src;
}

    function convert_number($number){ 
            if (($number < 0) || ($number > 999999999)){ 
                throw new Exception("Number is out of range");
            } 
            $Gn = floor($number / 1000000);  /* Millions (giga) */ 
            $number -= $Gn * 1000000; 
            $kn = floor($number / 1000);     /* Thousands (kilo) */ 
            $number -= $kn * 1000; 
            $Hn = floor($number / 100);      /* Hundreds (hecto) */ 
            $number -= $Hn * 100; 
            $Dn = floor($number / 10);       /* Tens (deca) */ 
            $n = $number % 10;               /* Ones */ 
            $res = ""; 
            if($Gn){ 
                $res .= convert_number($Gn) . " Million"; 
            } 
            if($kn){ 
                $res .= (empty($res) ? "" : " ") . 
                    convert_number($kn) . " Thousand"; 
            } 
            if($Hn){ 
                $res .= (empty($res) ? "" : " ") . 
                    convert_number($Hn) . " Hundred"; 
            } 
            $ones = array("", "One", "Two", "Three", "Four", "Five", "Six", "Seven", "Eight", "Nine", "Ten", "Eleven", "Twelve", "Thirteen", "Fourteen", "Fifteen", "Sixteen", "Seventeen", "Eightteen", "Nineteen"); 
            $tens = array("", "", "Twenty", "Thirty", "Fourty", "Fifty", "Sixty", "Seventy", "Eigthy", "Ninety"); 
        
            if($Dn || $n){ 
                if (!empty($res)){ 
                    $res .= " and "; 
                } 
        
                if($Dn < 2){ 
                    $res .= $ones[$Dn * 10 + $n]; 
                } 
                else{ 
                    $res .= $tens[$Dn]; 
                    if($n){ 
                        $res .= "-" . $ones[$n]; 
                    } 
                } 
            } 
            if (empty($res)) { 
                $res = "zero"; 
            } 
            return $res; 
    }
    
function set_redirect_msg(){
    $CI = &get_instance();
    return $CI->session->flashdata('msg_info');
}

function has_download_btn($status){
    switch ($status) {
        case FAILED_FILE :
            return true;
            break;

        case PARTIAL_COMPLETED_FILE :
            return true;
            break;

        default:
            return false;
            break;
    }
}
