<?php
	class Employee extends AppModel{
		var $name = 'Employee';
		var $validate = array(
			'name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Please give valid name'
				
			),
			'designation' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Please give valid designation'
				
			),
			'address' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Please give valid address'
				
			),
			'phone_number' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'please give valid phone number'
				
			),
		);
	}
?>