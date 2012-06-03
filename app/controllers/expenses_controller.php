<?php
	class ExpensesController extends AppController{
		var $uses = array('ContractBillEstimation');
		function beforeFilter(){
		parent::beforeFilter();
	}
		function add(){
			if(!empty($this->data)){
				$this->ContractBillEstimation->set($this->data);
				if($this->ContractBillEstimation->validates()){
					var_dump($this->data);//die;
					$this->ContractBillEstimation->save();
					$this->Session->setFlash(__('Gallery saved', true));
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
	}
?>