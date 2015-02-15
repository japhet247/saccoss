<?php
    $config = array(
                    'profile_form' => array(
                                        array(
                            			'field' => 'name', 
                            			'label' => 'Profile Name', 
                            			'rules' => 'trim|required|xss_clean|callback_check_unique[user_role.name.role_id]|strtoupper'
                            		), 
                            		
                                    array(
                            			'field' => 'description', 
                            			'label' => 'Profile Description', 
                            			'rules' => 'trim|required|xss_clean'
                            		),
                                    array(
                            			'field' => 'permission_ids', 
                            			'label' => 'Permission', 
                            			'rules' => 'required|xss_clean'
                            		)
                                    ),
                    'reject_form'=>array(
                                        array(
                                            'field' =>'comment',
                                            'label' =>'Rejection reason',
                                            'rules' =>'trim|required|xss_clean'
                                        )
                                    ),
                    'cheque_reject_form'=>array(
                                        array(
                                            'field' =>'comment_predefined',
                                            'label' =>'Rejection reason',
                                            'rules' =>'trim|required|xss_clean'
                                        )
                                    ), 
                    'login_form' => array(
                                        array(
                            			'field' => 'username', 
                            			'label' => 'Username', 
                            			'rules' => 'trim|required|strtolower|xss_clean'
                            		), 
                            		array(
                            			'field' => 'password', 
                            			'label' => 'Password', 
                            			'rules' => 'required|xss_clean'
                            		)
                                    ),
                    'pwd_reset_form'=>array(
                                        array(
                                            'field' =>'password',
                                            'label' =>'New Password',
                                            'rules' =>'required|min_length[6]|callback_check_special_characters'
                                        ),
                                        array(
                                            'field' =>'confirm_password',
                                            'label' =>'Password Confirmation',
                                            'rules' =>'required|matches[password]|min_length[6]|callback_check_special_characters'
                                        )
                                    ), 
                   
                   'change_pwd_form'=>array(
                                        array(
                                            'field' =>'old_password',
                                            'label' =>'Old Password',
                                            'rules' =>'required|min_length[6]'
                                        ),
                                        array(
                                            'field' =>'new_password',
                                            'label' =>'New Password',
                                            'rules' =>'required|min_length[6]|callback_check_special_characters'
                                        ),
                                        array(
                                            'field' =>'confirm_password',
                                            'label' =>'Password Confirmation',
                                            'rules' =>'required|matches[new_password]|min_length[6]|callback_check_special_characters'
                                        )
                                    ),  
                     'user_form'=>array(
                                        array(
                                            'field' =>'full_name',
                                            'label' =>'Full name',
                                            'rules' =>'trim|required|ucwords|xss_clean'
                                        ),
                                        array(
                                            'field' =>'mobile',
                                            'label' =>'Mobile',
                                            'rules' =>'trim|required|xss_clean'
                                        ),
                                        array(
                                            'field' =>'address',
                                            'label' =>'Address',
                                            'rules' =>'trim|xss_clean'
                                        ),
                                        array(
                                            'field' =>'role_id',
                                            'label' =>'User profile',
                                            'rules' =>'trim|required|xss_clean'
                                        ),
                                        array(
                                            'field' =>'municipal_id',
                                            'label' =>'User Municipal',
                                            'rules' =>'xss_clean'
                                        ),
                                        array(
                                            'field' =>'email',
                                            'label' =>'Email',
                                            'rules' =>'trim|required|strtolower|valid_email|xss_clean|callback_check_unique[user.email.user_id]'
                                        )
                                    ), 
                    'teller_form'=>array(
                                        array(
                                            'field' =>'full_name',
                                            'label' =>'Full name',
                                            'rules' =>'trim|required|ucwords|xss_clean'
                                        ),
                                        array(
                                            'field' =>'mobile',
                                            'label' =>'Mobile',
                                            'rules' =>'trim|required|xss_clean'
                                        ),
                                        array(
                                            'field' =>'address',
                                            'label' =>'Address',
                                            'rules' =>'trim|xss_clean'
                                        ),
                                        array(
                                            'field' =>'email',
                                            'label' =>'Email',
                                            'rules' =>'trim|required|strtolower|valid_email|xss_clean|callback_check_unique_value[pos_teller.email.teller_id]'
                                        ),
                                        array(
                                            'field' =>'teller_account',
                                            'label' =>'Teller Account',
                                            'rules' =>'trim|required|exact_length[13]|strtoupper|xss_clean|callback_check_unique_value[pos_teller.teller_account.teller_id]'
                                        ),
                                        array(
                                            'field' =>'card_no',
                                            'label' =>'Card Number',
                                            'rules' =>'trim|numeric|required|exact_length[16]|xss_clean|callback_check_unique_value[pos_teller.card_no.teller_id]'
                                        ),
                                        array(
                                            'field' =>'municipal_id',
                                            'label' =>'User Municipal',
                                            'rules' =>'required|xss_clean'
                                        )
                                    ),
                    'vault_card_form'=>array(
                                        array(
                                            'field' =>'account_no',
                                            'label' =>'Vault Account',
                                            'rules' =>'trim|required|exact_length[13]|strtoupper|xss_clean|is_unique[pos_teller.teller_account]|callback_check_unique_value[vault_cards.account_no.card_id]'
                                        ),
                                        array(
                                            'field' =>'card_no',
                                            'label' =>'Card Number',
                                            'rules' =>'trim|numeric|required|exact_length[16]|xss_clean|is_unique[pos_teller.card_no]|callback_check_unique_value[vault_cards.card_no.card_id]'
                                        ),
                                        array(
                                            'field' =>'user_id',
                                            'label' =>'Supervisor',
                                            'rules' =>'required|xss_clean|is_unique[vault_cards.user_id]'
                                        )
                                    ),
                    'commission_account_form'=>array(
                                        array(
                                            'field' =>'sortcode',
                                            'label' =>'Branch',
                                            'rules' =>'trimrequired|xss_clean|callback_check_unique_value[commission_accounts.sortcode.commission_id]'
                                        ),
                                        array(
                                            'field' =>'account_no',
                                            'label' =>'Commission Account',
                                            'rules' =>'trim|required|exact_length[13]|strtoupper|xss_clean|is_unique[pos_teller.teller_account]|callback_check_unique_value[commission_accounts.account_no.commission_id]'
                                        ) 
                                    ),  
                    'municipal_form'=>array(
                                        array(
                                            'field' =>'municipal_name',
                                            'label' =>'Municipal name',
                                            'rules' =>'trim|required|xss_clean|callback_check_unique[municipal.municipal_name.municipal_id]|strtoupper'
                                        ),
                                        array(
                                            'field' =>'region',
                                            'label' =>'Region',
                                            'rules' =>'required|xss_clean'
                                        ),
                                        array(
                                            'field' =>'sortcode',
                                            'label' =>'Mother Branch',
                                            'rules' =>'required|xss_clean'
                                        ),
                                        array(
                                            'field' =>'address',
                                            'label' =>'Address',
                                            'rules' =>'trim|strtoupper|xss_clean'
                                        ),
                                        array(
                                            'field' =>'telephone',
                                            'label' =>'Municipal Telephone',
                                            'rules' =>'trim|xss_clean'
                                        ),
                                        array(
                                            'field' =>'fax',
                                            'label' =>'Municipal Fax',
                                            'rules' =>'trim|xss_clean'
                                        ),
                                        array(
                                            'field' =>'collection_account',
                                            'label' =>'Municipal Collection Account',
                                            'rules' =>'trim|required|exact_length[13]|xss_clean'
                                        )
                                    ),
                'municipal_account_form'=>array(
                                        array(
                                            'field' =>'account_name',
                                            'label' =>'Account name',
                                            'rules' =>'trim|required|strtoupper|xss_clean'
                                        ),
                                        array(
                                            'field' =>'account',
                                            'label' =>'Account Number',
                                            'rules' =>'trim|exact_length[13]|xss_clean|callback_check_unique_account|required'
                                        ),
                                        array(
                                            'field' =>'municipal_id',
                                            'label' =>'Municipal',
                                            'rules' =>'trim|required|xss_clean'
                                        ),
                                        array(
                                            'field' =>'category_a',
                                            'label' =>'Category A Signatories',
                                            'rules' =>'required|xss_clean'
                                        ),
                                        array(
                                            'field' =>'category_b',
                                            'label' =>'Category B Signatories',
                                            'rules' =>'required|xss_clean'
                                        ),
                                    ),
                    'cheque_file_form'=>array(
                                        array(
                                            'field' =>'account',
                                            'label' =>'Municipal Account',
                                            'rules' =>'required|xss_clean'
                                        )
                                    ),
                    'add_signature_form'=>array(
                                        array(
                                            'field' =>'user_id',
                                            'label' =>'Signatory',
                                            'rules' =>'required|xss_clean'
                                        )
                                    ), 
                    'pos_form'=>array(
                                        array(
                                            'field' =>'pos_name',
                                            'label' =>'POS Name',
                                            'rules' =>'trim|required|strtoupper|xss_clean'
                                        ),
                                        array(
                                            'field' =>'device_imei',
                                            'label' =>'POS IMEI',
                                            'rules' =>'trim|numeric|exact_length[15]|xss_clean|callback_check_unique_value[pos.device_imei.pos_id]|required'
                                        ),
                                        array(
                                            'field' =>'serial_no',
                                            'label' =>'POS Serial No',
                                            'rules' =>'trim|strtoupper|xss_clean|callback_check_unique_value[pos.serial_no.pos_id]|required'
                                        ),
                                        array(
                                            'field' =>'municipal_id',
                                            'label' =>'Municipal',
                                            'rules' =>'required|xss_clean'
                                        ),
                                        array(
                                            'field' =>'property_ids',
                                            'label' =>'POS Services',
                                            'rules' =>'required|xss_clean'
                                        )
                                    ), 
                'tiss_suspense_account'=>array(
                                        array(
                                            'field' =>'tiss_suspense_account',
                                            'label' =>'TISS Suspense Account',
                                            'rules' =>'trim|exact_length[13]|required|xss_clean'
                                        )
                                    ), 
                'clearance_suspense_account'=>array(
                                        array(
                                            'field' =>'clearance_suspense_account',
                                            'label' =>'Clearance Suspense Account',
                                            'rules' =>'trim|exact_length[13]|required|xss_clean'
                                        )
                                    ),
                'charge_commission_ac'=>array(
                                        array(
                                            'field' =>'charge_commission_ac',
                                            'label' =>'Charge Commission Account',
                                            'rules' =>'trim|exact_length[13]|required|xss_clean'
                                        )
                                    ),
                'balance_inquiry_charge'=>array(
                                        array(
                                            'field' =>'balance_inquiry_charge',
                                            'label' =>'Balance Inquiry charge',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'ministatement_charge'=>array(
                                        array(
                                            'field' =>'ministatement_charge',
                                            'label' =>'Ministatement charge',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'normal_tiss_charge'=>array(
                                        array(
                                            'field' =>'normal_tiss_charge',
                                            'label' =>'Normal TISS charge',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'cash_withdraw_charge'=>array(
                                        array(
                                            'field' =>'cash_withdraw_charge',
                                            'label' =>'Cash Withdraw charge',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'crdb_to_otherbank_cheque'=>array(
                                        array(
                                            'field' =>'crdb_to_otherbank_cheque',
                                            'label' =>'CRDB to Other Bank charge',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'transfer_own_account'=>array(
                                        array(
                                            'field' =>'transfer_own_account',
                                            'label' =>'Transfer Own Account charge',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'customer_withdraw_limit'=>array(
                                        array(
                                            'field' =>'customer_withdraw_limit',
                                            'label' =>'Customer Withdraw Limit',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'min_txn_amount'=>array(
                                        array(
                                            'field' =>'min_txn_amount',
                                            'label' =>'Minimum transaction Limit',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'pos_session_timeout'=>array(
                                        array(
                                            'field' =>'pos_session_timeout',
                                            'label' =>'POS Session Timeout',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'pos_password_trials'=>array(
                                        array(
                                            'field' =>'pos_password_trials',
                                            'label' =>'POS Password Trials',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'pos_password_reset_time'=>array(
                                        array(
                                            'field' =>'pos_password_reset_time',
                                            'label' =>'POS Password Reset Time',
                                            'rules' =>'trim|is_numeric|required|xss_clean'
                                        )
                                    ),
                'teller_assignment'=>array(
                                        array(
                                            'field' =>'teller_account',
                                            'label' =>'Teller Account',
                                            'rules' =>'required|xss_clean|is_unique[teller_assignment.teller_account]'
                                        ),
                                        array(
                                            'field' =>'pos_id',
                                            'label' =>'POS',
                                            'rules' =>'required|xss_clean|is_unique[teller_assignment.pos_id]'
                                        ),
                                        array(
                                            'field' =>'teller_limit',
                                            'label' =>'Teller Limit',
                                            'rules' =>'required|xss_clean'
                                        )
                                    ),                       
               );