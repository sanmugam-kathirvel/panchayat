<?php
	class SalariesController extends AppController{
		var $uses = array('Account', 'BankDetail', 'Salary', 'EmployeeSalary');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function salary(){
			if(!empty($this->data)){
				//var_dump($this->data);die;
				$this->Salary->saveAll($this->data);
			}
		}
	}
?>