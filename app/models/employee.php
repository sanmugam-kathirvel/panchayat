<?php
	class Employee extends AppModel{
		var $name = 'Employee';
		var $validate = array(
			'name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			),
			'designation' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			),
			'address' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'This Field Not Empty'
				
			),
		);
	}
?>