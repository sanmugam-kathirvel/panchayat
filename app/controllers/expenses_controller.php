<?php
	class ExpensesController extends AppController{
		var $uses = array('Account', 'BankDetail', 'Purchase', 'Salary', 'EmployeeSalary', 'PurchaseItem', 'Header', 'Expense');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addbill(){
			if(!empty($this->data)){
				$this->ContractBillEstimation->set($this->data);
				if($this->ContractBillEstimation->validates()){
					//var_dump($this->data);die;
					$this->ContractBillEstimation->save();
					$this->Session->setFlash(__('Contract bill saved', true));
					//$this->redirect(array('action'=>'index'));
				}
				else{
					$this->Session->setFlash(__('Could not save', true));
				}
			}
			else{
				//$this->data = $gallery;
			}
		}
		function addexpense(){
			$account = $this->Account->find('all');
			$this->set(compact('account'));
			if(!empty($this->data)){
				$this->Expense->set($this->data);
				if($this->Expense->validates()){
					$acc_opening_date = strtotime($GLOBALS['accounting_year']['acc_opening_year']);
					$acc_closing_date = strtotime($GLOBALS['accounting_year']['acc_closing_year']);
					$expense_acc_date = strtotime($this->data['Expense']['expense_date']);
					if($acc_closing_date >= $expense_acc_date && $acc_opening_date <= $expense_acc_date){
						$acc_bank_details = $this->BankDetail->find('first', array(
						'conditions' => array(
							'BankDetail.acc_openning_year' => $GLOBALS['accounting_year']['acc_opening_year'],
							'BankDetail.acc_closing_year' => $GLOBALS['accounting_year']['acc_closing_year'], 
							'BankDetail.account_id' => $this->data['Expense']['account_id']
							)
						));
						if($acc_bank_details['BankDetail']['closing_bank_balance'] >= $this->data['Expense']['expense_amount']){
							$acc_bank_details['BankDetail']['closing_bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'] - $this->data['Expense']['expense_amount'];
							$this->BankDetail->save($acc_bank_details['BankDetail']);
							$this->Expense->save();
							//$this->Session->setFlash(__('Expense saved successfully', true));
						}else{
							$this->Session->setFlash(__('Insufficient balance in account, available balance is '.$acc_bank_details['BankDetail']['closing_bank_balance'], true));
						}
					}else{
						$this->Session->setFlash(__('Given date is invalid, please give dates between '.$GLOBALS['accounting_year']['acc_opening_year'].' and '.$GLOBALS['accounting_year']['acc_closing_year'], true));
					}
				}
				/*else{
					$this->Session->setFlash(__('Expense could not be saved', true));
				}*/
			}
			else{
				//$this->data = $gallery;
			}
			$this->data['Expense'] = '';
		}
		function purchase(){
			if(!empty($this->data)){
				$this->Purchase->saveAll($this->data);
			}
		}
		function salary(){
			if(!empty($this->data)){
				//var_dump($this->data);die;
				$this->Salary->saveAll($this->data);
			}
		}
		function avail_header(){
			$this->layout = false;
			$headers = $this->Header->find('all', array(
				'conditions' => array('Header.header_type' => 'expense', 'Header.account_id' => $_POST['account'])
			));
			 echo json_encode($headers);
			 exit;	
		}
	}
?>
