<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
|--------------------------------------------------------------------------
| File and Directory Modes
|--------------------------------------------------------------------------
|
| These prefs are used when checking and setting modes when working
| with the file system.  The defaults are fine on servers with proper
| security, but you may wish (or even need) to change the values in
| certain environments (Apache running a separate process for each
| user, PHP under CGI with Apache suEXEC, etc.).  Octal values should
| always be used to set the mode correctly.
|
*/
define('FILE_READ_MODE', 0644);
define('FILE_WRITE_MODE', 0666);
define('DIR_READ_MODE', 0755);
define('DIR_WRITE_MODE', 0777);

/*
|--------------------------------------------------------------------------
| File Stream Modes
|--------------------------------------------------------------------------
|
| These modes are used when working with fopen()/popen()
|
*/

define('FOPEN_READ',							'rb');
define('FOPEN_READ_WRITE',						'r+b');
define('FOPEN_WRITE_CREATE_DESTRUCTIVE',		'wb'); // truncates existing file data, use with care
define('FOPEN_READ_WRITE_CREATE_DESTRUCTIVE',	'w+b'); // truncates existing file data, use with care
define('FOPEN_WRITE_CREATE',					'ab');
define('FOPEN_READ_WRITE_CREATE',				'a+b');
define('FOPEN_WRITE_CREATE_STRICT',				'xb');
define('FOPEN_READ_WRITE_CREATE_STRICT',		'x+b');

//Constants for TMS

// Service constants
define('UNKNOWN_REQUEST',							31);
define('SOAP_ERROR',								37);
define('SERVICE_DOWN',								33);

// Transaction constants
define('PENDING_TX',								40);
define('FAILED_TX',									41);
define('COMPLETED_TX',								42);
define('TERMINATED_TX',								43);
define('THIRDPATRY_COMPLETE',						45);
define('THIRDPATRY_FAILED',							46);
define('PENDING_REFERAL',                           47);
define('COMPLETED_REFERAL',                         48);
define('REJECTED_REFERAL',                          49);

// Cheque constants
define('BLOCKED_CHEQUE',							71);
define('OPEN_CHEQUE',								70);
define('CLOSED_CHEQUE',								72);
define('PENDING_CHEQUE',							73);
define('COMPLETED_CHEQUE',							74);
define('FAILED_PROCESSING_CHEQUE',				    75);
define('ISSUED_CHEQUE',								76);
define('INVALID_UB_CHEQUE',							78);
define('EXCEEDED_UPLOAD_LIMIT',						79);
define('PARTIAL_COMPLETE_CHEQUE',					90);
define('REJECTED_CHEQUE',							91);
define('PAID_CHEQUE',								92);
define('UNPAID_CHEQUE',								93);
define('PRESENTED_CHEQUE',							94);

//Charge Constants

define('SUCCESSFUL_CHARGE',    						500);
define('FAILED_CHARGE',								501);
//TISS Constants

define('CREATED_FILE',								60);
define('FILE_UNKNOWN',								61);

// Municipal constants
define('BILLED_PAYER',								50);
define('NON_BILLED_PAYER',							51);
define('UPDATE_MUNICIPAL_FAILED',					52);
define('UPDATE_MUNICIPAL_COMPLETE',					53);

// File constants
define('PARTIAL_COMPLETED_FILE',					80);
define('CHEQUE_FILE_PATH', 			'c:/xampp/htdocs/Files/Chequelists/');
define('SIGNATURES_PATH',			'Files/Signatures/');
define('SIGN_ABSOLUTE_PATH',		'c:/xampp/htdocs/Files/Signatures/');
define('COMPLETED_FILE',							81);
define('FAILED_FILE',								82);
define('CORRUPTED_FILE',							83);
define('PENDING_FILE',								84);


//Statistics constants
define('INCOME_CHARGES',							400);



//Pos constants
define('POS_FXN',								 'FXN');
define('POS_BILLS',							   'BILLS');
define('INACTIVE_POS',								23);
define('UNKNOWN_POS',								24);
define('ACTIVE_POS',								20);
define('ONLINE_POS',								25);
define('OFFLINE_POS',								26);

//Data constants 
define('ACTIVE_DATA',								100);
define('DELETED_DATA',								101);
define('UNAUTHORISED_DATA',							102);
define('INACTIVE_DATA',								103);
define('REJECTED_DATA',								104);

//user status
define('ACTIVE',									110);
define('BLOCKED',									111);
define('EXPIRED_PWD',								112);
define('AUTHORISED',								113);
define('CATEGORY_A',								'A');
define('CATEGORY_B',								'B');


//activity 
define('ACTIVITY_ADD',								120);
define('ACTIVITY_EDIT',								121);
define('BLOCK_DATA',								122);
define('SETTINGS_EDIT',								123);
define('RESET_USER',								124);
define('UNBLOCK_CARD',								125);
define('COMMISSION_ACC_ADD', 						126);

//user roles
define('SADMIN',                                    '1244839115f9062c449b28a86ca03311a82da5816224830fe0');
define('SYSTEM_ADMIN',                              '1785086332f3f2163a0c41cec224a87919e4c8a7b1e430aa67');
define('CUSTOMER_ADMIN',                            '13915218720ae5b7768dcb909a5d2baafdce641982fafe9aca');
define('CHEQUE_MAKER',                              '12194443875d34e82276dde27447ae3b1f058dd376df180188');
define('CHEQUE_SIGNATORY',                          '5634475413f5d8a29f5c997064e510479f05385bd1f04f1b8');
define('SUPERVISOR',                          		'323679817571f4504011e8174c37bb135389e32734bca2781');

/* End of file constants.php */
/* Location: ./application/config/constants.php */