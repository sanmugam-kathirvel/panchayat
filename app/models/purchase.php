<?php
	class Purchase extends AppModel{
		var $name = 'Purchase';
		var $hasMany = array('PurchaseItem');
		var $validate = array(
			'company_name' => array(
				'rule' => 'notEmpty',
				'message' => 'Enter valid Company name'
			),
			'purchase_date' => array(
				'rule' => 'notEmpty',
				'message' => 'Enter valid Name'
			),
			'voucher_number' => array(
				'rule' => 'notEmpty',
				'message' => 'Enter Valied Number'
			),
			'cheque_number' => array(
				'rule' => 'alphaNumeric',
				'message' => 'Enter Valied Number'
			),
			'cheque_date' => array(
				'rule' => 'notEmpty',
				'message' => 'Enter valid Amount'
			),
			'total_amt' => array(
				'rule' => 'numeric',
				'message' => 'Enter valid amount'
			),
		);
	}
?>