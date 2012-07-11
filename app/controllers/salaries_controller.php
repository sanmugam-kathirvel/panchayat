<?php
	class SalariesController extends AppController{
		var $uses = array('Account', 'BankDetail', 'Salary', 'Employee', 'EmployeeSalary');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function salary(){
			if(!empty($this->data)){
				  $datas = $this->data;
					foreach ($datas['EmployeeSalary'] as $key => $value){
						if($value['employee_pay'] == '0'){
							unset($datas['EmployeeSalary'][$key]);
						}
					}
				  $acc_opening_date = strtotime($GLOBALS['accounting_year']['acc_opening_year']);
					$acc_closing_date = strtotime($GLOBALS['accounting_year']['acc_closing_year']);
					$salary_date = strtotime($this->data['Salary']['salary_date']);
					if($acc_closing_date >= $salary_date && $acc_opening_date <= $salary_date){
						$acc_bank_details = $this->BankDetail->find('first', array(
						'conditions' => array(
							'BankDetail.acc_openning_year' => $GLOBALS['accounting_year']['acc_opening_year'],
							'BankDetail.acc_closing_year' => $GLOBALS['accounting_year']['acc_closing_year'], 
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
							$this->Session->setFlash(__('Salaries saved successfully', true));
							$this->redirect(array('controller' => 'accounts', 'action'=>'account1'));
						}else{
							$this->Session->setFlash(__('Insufficient balance in account, available balance is '.$acc_bank_details['BankDetail']['closing_bank_balance'], true));
						}
					}else{
						$this->Session->setFlash(__('Given date is invalid, please give dates between '.$GLOBALS['accounting_year']['acc_opening_year'].' and '.$GLOBALS['accounting_year']['acc_closing_year'], true));
					}
			}else{
				$employees = $this->Employee->find('all');
				$this->set(compact('employees'));
			}
		}
	}
?>