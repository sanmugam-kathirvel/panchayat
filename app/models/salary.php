<?php
	class Salary extends AppModel{
		var $name = 'Salary';
		var $hasMany = array('EmployeeSalary' => array('className' => 'EmployeeSalary', 'foreignKey' => 'salary_id','dependent'=> true));
		
		var $validate = array(
			'salary_date' => array(
				'rule' => 'date',
				'message' => 'This Field should be a date Farmat'
			),
			'drawee_name' => array(
				'rule' => 'notEmpty',
				'message' => 'Enter Valied Name'
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
				'message' => 'This Field should be a date Farmat'
			),
			'cheque_amount' => array(
				'rule' => 'numeric',
				'message' => 'Enter Valied Amount'
			),
		);
	}
?>