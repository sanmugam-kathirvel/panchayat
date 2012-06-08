<?php
	class EmployeeSalary extends AppModel{
		var $name = 'EmployeeSalary';
		var $belongsTo = array('Salary' => array('className'=> 'Salary','foreignKey'=> 'salary_id'));    
		var $validate = array(
				'drawee_name' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				)
			);
	}
?>