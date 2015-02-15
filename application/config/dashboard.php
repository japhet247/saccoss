<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

$config[SADMIN] = array('tabs' => array(
	            'first'=> array(
	                   'icon' => 'i-tablet',
	                   'text' => 'text-crdb',
	                   'status' => 'Registered Pos',
	                   'value' => 'count_pos',
	                   'link' => site_url('en/pos/all') 
	            ),
	            'second'=> array(
	                   'icon' => 'i-stack',
	                   'text' => 'text-success',
	                   'status' => 'processed cheques',
	                   'value' => 'count_cheques',
	                   'link' => site_url('en/cheque/approved')
	            ),
	            'third'=> array(
	                   'icon' => 'i-slider',
	                   'text' => 'text-info',
	                   'status' => 'today transactions',
	                   'value' => 'today_transactions',
	                   'link' => site_url('en/transactions/ft')
	            ),
            ),
			'dashboard_links' => array(
	            array('name'=>"Add System User",'url' =>site_url('en/user/save'), 'icon' =>"i-user2", 'class'=>"text-primary-lt"),
	            array('name'=>"Add New POS",'url' =>site_url('en/pos/save'), 'icon' =>"i-tablet", 'class'=>"text-danger-lt"),
	            array('name'=>"Add New Profile",'url' =>site_url('en/profile/save'), 'icon' =>"i-users2", 'class'=>"text-warning-lter"),
	            array('name'=>"Approved Cheques",'url' =>site_url("en/cheque/approved"), 'icon' =>"i-file-check", 'class'=>"text-success-lt"),
	            array('name'=>"Pending Cheques",'url' =>site_url("en/cheque/pending"), 'icon' =>"i-file-plus", 'class'=>"text-warning-lt"),
	            array('name'=>"Failed Cheques",'url' =>site_url("en/cheque/failed"), 'icon' =>"i-file-remove", 'class'=>"text-danger-lt"),
	            array('name'=>"Todays Inquiries",'url' =>site_url("en/transactions/inquiries"), 'icon' =>"i-retweet", 'class'=>"text-info"),
	            array('name'=>"Todays Fund Transfers",'url' =>site_url("en/transactions/ft"), 'icon' =>"i-switch", 'class'=>"text-crdb"),
	            array('name'=>"Todays Bills",'url' =>site_url("en/transactions/bills"), 'icon' =>"i-file-copy", 'class'=>"text-success"),
        	),
		);

$config[SYSTEM_ADMIN] = array('tabs' => array(
	            'first'=> array(
	                   'icon' => ' i-checkmark2',
	                   'text' => 'text-crdb',
	                   'status' => 'authorized activities',
	                   'value' => 'count_authorized_activity',
	                   'link' => site_url('en/activity/authorized') 
	            ),
	            'second'=> array(
	                   'icon' => ' i-stopwatch',
	                   'text' => 'text-warning-lt',
	                   'status' => 'pending activities',
	                   'value' => 'count_pending_activity',
	                   'link' => site_url('en/activity/pending') 
	            ),
	            'third'=> array(
	                   'icon' => 'i-cross2',
	                   'text' => 'text-danger-lt',
	                   'status' => 'failed activities',
	                   'value' => 'count_failed_activity',
	                   'link' => site_url('en/activity/failed') 
	            ),
            ),
			'dashboard_links' => array(
	            array('name'=>"Add System User",'url' =>site_url('en/user/save'), 'icon' =>"i-user2", 'class'=>"text-primary-lt"),
	            array('name'=>"Municipal",'url' =>site_url('en/municipal/all'), 'icon' =>"i-home", 'class'=>"text-info-lt"),
	            array('name'=>"Municipal Users",'url' =>site_url('en/municipal/users'), 'icon' =>"i-users2", 'class'=>"text-success-lter"),
       
        	),
		);

$config[CUSTOMER_ADMIN] = array('tabs' => array(
	            'first'=> array(
	                   'icon' => ' i-checkmark2',
	                   'text' => 'text-crdb',
	                   'status' => 'authorized activities',
	                   'value' => 'count_authorized_activity',
	                   'link' => site_url('en/activity/authorized') 
	            ),
	            'second'=> array(
	                   'icon' => ' i-stopwatch',
	                   'text' => 'text-warning-lt',
	                   'status' => 'pending activities',
	                   'value' => 'count_pending_activity',
	                   'link' => site_url('en/activity/pending') 
	            ),
	            'third'=> array(
	                   'icon' => 'i-cross2',
	                   'text' => 'text-danger-lt',
	                   'status' => 'failed activities',
	                   'value' => 'count_failed_activity',
	                   'link' => site_url('en/activity/failed') 
	            ),
            ),
			'dashboard_links' => array(
	            array('name'=>"Add POS",'url' =>site_url('en/pos/save'), 'icon' =>"i-tablet", 'class'=>"text-primary-lt"),
	            array('name'=>"Add Municipal",'url' =>site_url('en/municipal/save'), 'icon' =>"i-home", 'class'=>"text-info-lt"),
	            array('name'=>"Add Municipal A/C",'url' =>site_url('en/account/save'), 'icon' =>"i-vcard", 'class'=>"text-success-lter"),
        	),
		);
$config[CHEQUE_SIGNATORY] = array('tabs' => array(
	            'first'=> array(
	                   'icon' => ' i-file-check',
	                   'text' => 'text-crdb',
	                   'status' => 'approved cheques',
	                   'value' => 'count_approved_cheques',
	                   'link' => site_url('en/cheque/approved') 
	            ),
	            'second'=> array(
	                   'icon' => ' i-file-plus',
	                   'text' => 'text-warning-lt',
	                   'status' => 'pending cheques',
	                   'value' => 'count_pending_cheques',
	                   'link' => site_url('en/cheque/pending') 
	            ),
	            'third'=> array(
	                   'icon' => 'i-file-remove',
	                   'text' => 'text-danger-lt',
	                   'status' => 'rejected cheques',
	                   'value' => 'count_failed_cheques',
	                   'link' => site_url('en/cheque/rejected') 
	            ),
            ),
			'dashboard_links' => false
		);
$config[CHEQUE_MAKER] = array('tabs' => FALSE,
			'dashboard_links' => array(
	            array('name'=>"Add Cheque File",'url' =>site_url('en/cheque/add'), 'icon' =>"i-file-plus", 'class'=>"text-primary-lt"),
	            array('name'=>"view Cheque Files",'url' =>site_url('en/cheque/files'), 'icon' =>"i-file-copy", 'class'=>"text-info-lt"),
	            array('name'=>"view Cheque Files",'url' =>site_url('en/cheque/files'), 'icon' =>"i-file-copy", 'class'=>"text-info-lt"),
				 array('name'=>"view Cheque Files",'url' =>site_url('en/cheque/files'), 'icon' =>"i-file-copy", 'class'=>"text-info-lt"),
				  array('name'=>"view Cheque Files",'url' =>site_url('en/cheque/files'), 'icon' =>"i-file-copy", 'class'=>"text-info-lt"),
        	),
		);