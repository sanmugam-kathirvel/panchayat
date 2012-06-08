<?php
	class ExpensesController extends AppController{
		var $uses = array('Purchase', 'Salary', 'EmployeeSalary', 'PurchaseItem');
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
	}
?>
