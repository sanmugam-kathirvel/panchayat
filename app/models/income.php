<?php
	class Income extends AppModel{
		var $name = 'Income';
		var $actsAs = array('Containable');
		var $belongsTo = array('Header', 'Account');
		var $validate = array(
			'income_date' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valid Date'
				
			),
			'header_id' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Please select Header name'
				
			),
			'income_amount' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valid CompIncome amountany'
				
			),
			'account_id' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			)
		);
	}
?>