<?php
	class CashToBank extends AppModel{
		var $name = 'CashToBank';
		var $belongsTo = array('BankDetail');
		var $validate = array(
			'transfer_date' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
			),
			'transfer_amount' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);	
	}
?>