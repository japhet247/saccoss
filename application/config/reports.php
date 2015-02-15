<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config['users'] = array(
						'name' => 'Users Report',
						'sub_reports' => array(
										'system_users'=> 'System Users Report',
										'tellers' => 'POS Tellers Report',
							)
	);

$config['txn'] = array(
						'name' => 'Transactions Report',
						'sub_reports' => array(
										'ft'=> 'Fund Transfer Report',
										'inquiries' => 'Inquiries Report',
										'bills' => 'Bills Report'
							)
	);

$config['pos'] = array(
						'name' => 'POS Report',
						'sub_reports' => array(
										'pos'=> 'Registered POS Report',
										'pos_assignment' => 'POS Assignment Report',
							)
	);

$config['cheques'] = array(
						'name' => 'Cheques Report',
						'sub_reports' => array(
										'summary_cheques' => 'Summary Cheques Report',
										'completed_cheques'=> 'Completed Cheques Report',
										'pending_cheques' => 'Pending Cheques Report',
										'failed_cheques' => 'Rejected Cheques Report',
							)
	);

$config['audit'] = array(
						'name' => 'Audit trail Report',
						'sub_reports' => array(
										'users_audit' => 'System users Audit',
										'tellers_audit'=> 'POS Tellers Audit',
							)
	);