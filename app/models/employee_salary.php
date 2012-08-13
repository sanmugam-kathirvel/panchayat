<?php
	class EmployeeSalary extends AppModel{
		var $name = 'EmployeeSalary';
		var $belongsTo = array('Salary' => array('className'=> 'Salary','foreignKey'=> 'salary_id'));    
		var $validate = array(
			'employee_name' => array(
				'rule' => 'notEmpty',
				'message' => 'Please select Employee Name'
			),
			'employee_designation' => array(
				'rule' => 'notEmpty',
				'message' => 'Please select Employee Designation'
			),
			'employee_pay' => array(
				'rule' => 'numeric',
				'message' => 'Please enter Employee Salary'
			),
		);
	}
?>