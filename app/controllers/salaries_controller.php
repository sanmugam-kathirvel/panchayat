<?php
	class SalariesController extends AppController{
		var $uses = array('Account', 'BankDetail', 'Salary', 'Employee', 'EmployeeSalary');
		function beforeFilter(){
			//parent::beforeFilter();
		}
		function salary(){
			$employees = $this->Employee->find('all');
			$this->set(compact('employees'));
			if(!empty($this->data)){
				$this->Salary->set($this->data);
				if($this->Salary->validates()){
				  $datas = $this->data;
					foreach ($datas['EmployeeSalary'] as $key => $value){
						if($value['employee_pay'] == '0'){
							unset($datas['EmployeeSalary'][$key]);
						}
					}
				  $acc_opening_date = strtotime($this->Session->read('User.acc_opening_year'));
					$acc_closing_date = strtotime($this->Session->read('User.acc_closing_year'));
					$salary_date = strtotime($this->data['Salary']['salary_date']);
					if($acc_closing_date >= $salary_date && $acc_opening_date <= $salary_date){
						$acc_bank_details = $this->BankDetail->find('first', array(
						'conditions' => array(
							'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
							'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
							'BankDetail.account_id' => 1
							)
						));
						if($acc_bank_details['BankDetail']['closing_bank_balance'] >= $this->data['Salary']['cheque_amount']){
							$acc_bank_details['BankDetail']['value'] = 'yes';
							$acc_bank_details['BankDetail']['check_date'] = $this->data['Salary']['salary_date'];
							$acc_bank_details['BankDetail']['cash_balance'] = $acc_bank_details['BankDetail']['closing_cash_balance'];
							$acc_bank_details['BankDetail']['bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'];
							$acc_bank_details['BankDetail']['closing_bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'] - $this->data['Salary']['cheque_amount'];
							$this->BankDetail->save($acc_bank_details['BankDetail']);
							$this->Salary->saveAll($datas);
							$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
							$this->redirect(array('action'=>'index'));
						}else{
							$this->Session->setFlash(__($GLOBALS['flash_messages']['low_balance'], true));
						}
					}else{
						$this->Session->setFlash(__($GLOBALS['flash_messages']['date_check'], true));
					}
				}
			}else{
				$employees = $this->Employee->find('all');
				$this->set(compact('employees'));
			}
		}
		function index(){
			$this->paginate = array(
					'conditions' => array('Salary.salary_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year'))),
					'order' => 'Salary.salary_date DESC'
			);
			$receipts = $this->paginate('Salary');
			$this->set(compact('receipts'));
		}
		function view($id){
			if(!empty($id)){
				$items = $this->Salary->find('first', array(
						'conditions' => array('Salary.id' => $id),
				));
				$this->data = $items['Salary'];
				$items = $this->EmployeeSalary->find('all', array(
						'conditions' => array('EmployeeSalary.salary_id' => $this->data['id']),
						'order' => 'EmployeeSalary.id ASC'
				));
				// echo "<pre>";
				// print_r($items); die;
				$this->set(compact('items'));
			}else{
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'index'));
			}
		}
	}
?>