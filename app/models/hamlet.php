<?php
	class Hamlet extends AppModel{
		var $name = 'Hamlet';
		var $hasMany = array('HtDemand', 'WtDemand', 'PtDemand', 'HousetaxReceipt');
		var $validate = array(
			'hamlet_code' => array(
				'rule' => 'alphaNumeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'hamlet_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);
	}
?>