<?php
	class Header extends AppModel{
		var $name = 'Header';
		var $belongsTo = array('Account');
		var $hasMany = array('OthersReceipt');
		var $validate = array(
			'header_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'header_type' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'receipt' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Please select Receipt type'
			),
		);
	}
?>