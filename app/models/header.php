<?php
	class Header extends AppModel{
		var $name = 'Header';
		var $belongsTo = array('Account');
		var $hasMany = array('OthersReceipt');
		var $validate = array(
			'account_id' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please select Account name'
			),
			'header_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valid Header name'
			),
			'header_type' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Please select Header type'
			),
			'receipt' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Please select Receipt availability'
			),
		);
	}
?>