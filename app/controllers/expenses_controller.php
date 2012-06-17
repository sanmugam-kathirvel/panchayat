<?php
	class ExpensesController extends AppController{
		var $uses = array('Account', 'Purchase', 'Salary', 'EmployeeSalary', 'PurchaseItem', 'Header', 'Expense');
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
					$this->Expense->save();
					//$this->Session->setFlash(__('Expense saved successfully', true));
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
