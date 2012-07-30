<?php
	class Purchase extends AppModel{
		var $name = 'Purchase';
		var $hasMany = array('PurchaseItem');
		var $validate = array(
			'company_name' => array(
				'rule' => 'notEmpty',
				'message' => 'This Field Not Empty'
			),
			'purchase_date' => array(
				'rule' => 'notEmpty',
				'message' => 'This Field Not Empty'
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
				'message' => 'This Field Not Empty'
			),
			'total_amt' => array(
				'rule' => 'numeric',
				'message' => 'This Field Not Empty'
			),
		);
	}
?>