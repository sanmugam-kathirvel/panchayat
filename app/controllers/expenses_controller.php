<?php
	class ExpensesController extends AppController{
		var $uses = array('Account', 'BankDetail', 'Purchase', 'Salary', 'EmployeeSalary', 'PurchaseItem', 'Header', 'Expense');
		function beforeFilter(){
			parent::beforeFilter();
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
							$this->Session->setFlash(__('Expense saved successfully', true));
							$this->redirect(array('action'=>'index'));
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
		function avail_header(){
			$this->layout = false;
			$headers = $this->Header->find('all', array(
				'conditions' => array('Header.header_type' => 'expense', 'Header.account_id' => $_POST['account'])
			));
			 echo json_encode($headers);
			 exit;	
		}
		function index(){
			$this->paginate = array(
				'conditions' => array('Expense.expense_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
					'order' => 'Expense.expense_date DESC',
					'contain' => array('Account','Header')
			);
			$expenses = $this->paginate('Expense');
			$this->set(compact('expenses'));
		}
		function edit($id){
			if(!empty($id)){
				$account = $this->Account->find('all');
				$this->Expense->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->Expense->read();
					$header = $this->Header->find('all', array(
						'conditions' => array('Header.account_id' => $this->data['Expense']['account_id'], 'Header.header_type' => 'expense')
					));
					$this->set(compact('account','header'));
	      }else{
					$old_data = $this->Expense->findById($this->data['Expense']['id']);
					$amount_to_update = 0;
					$flag = 0;
					if(((int)$this->data['Expense']['expense_amount']) > ((int)$old_data['Expense']['expense_amount'])){
						$amount_to_update = ((int)$this->data['Expense']['expense_amount']) - ((int)$old_data['Expense']['expense_amount']);
					}elseif(((int)$this->data['Expense']['expense_amount']) < ((int)$old_data['Expense']['expense_amount'])){
						$amount_to_update =  ((int)$old_data['Expense']['expense_amount']) - ((int)$this->data['Expense']['expense_amount']);
						$flag = 1;
					}else{
						$amount_to_update = 0;
					}
					if($amount_to_update != 0){
						$acc_bank_details = $this->BankDetail->find('first', array(
							'conditions' => array(
								'BankDetail.acc_openning_year' => $GLOBALS['accounting_year']['acc_opening_year'],
								'BankDetail.acc_closing_year' => $GLOBALS['accounting_year']['acc_closing_year'], 
								'BankDetail.account_id' => $this->data['Expense']['account_id']
							)
						));
						if($flag == 0){
							$acc_bank_details['BankDetail']['closing_bank_balance'] -= $amount_to_update;
						}else{
							$acc_bank_details['BankDetail']['closing_bank_balance'] += $amount_to_update;
						}
						$this->BankDetail->save($acc_bank_details);
					}
	        if($this->Expense->save($this->data)){
	          $this->Session->setFlash(__('Expense saved', true));    
	          $this->redirect(array('action'=>'index'));       
	        }        
	      }
	    }else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function delete($id, $account_id, $amount){
			if(!empty($id) && !empty($account_id) && !empty($amount)){
				$acc_bank_details = $this->BankDetail->find('first', array(
					'conditions' => array(
						'BankDetail.acc_openning_year' => $GLOBALS['accounting_year']['acc_opening_year'],
						'BankDetail.acc_closing_year' => $GLOBALS['accounting_year']['acc_closing_year'], 
						'BankDetail.account_id' => $account_id
					)
				));
				$acc_bank_details['BankDetail']['closing_bank_balance'] +=  $amount;
				$this->BankDetail->save($acc_bank_details);
				$this->Expense->delete($id);
				$this->Session->setFlash(__('Record deleted successfully', true));
				$this->redirect(array('action'=>'index'));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
			}
			$this->redirect(array('action'=>'index'));
		}
	}
?>
