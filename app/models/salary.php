<?php
	class Salary extends AppModel{
		var $name = 'Salary';
		var $hasMany = array('EmployeeSalary' => array('className' => 'EmployeeSalary', 'foreignKey' => 'salary_id','dependent'=> true));
		
		var $validate = array(
				'drawee_name' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				)
			);
	}
?>