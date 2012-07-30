<?php
	class Expense extends AppModel{
		var $name = 'Expense';
		var $belongsTo = array('Header', 'Account');
		var $validate = array(
			'expense_date' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			),
			'voucher_number' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			),
			'expense_amount' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			),
			'drawee_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			),
			'cheque_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			),
			'cheque_number' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			),
			'cheque_date' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			)
		);
	}
?>