<?php
	class WatertaxReceipt extends AppModel{
		var $name = 'WatertaxReceipt';
		var $belongsTo = array('Hamlet');
		var $validate = array(
			'receipt_date' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
			),
			'receipt_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'demand_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);
	}
?>