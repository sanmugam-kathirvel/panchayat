<?php
	class BillsController extends AppController{
		var $uses = array('ContractBillEstimation');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addbill($acc_id){
			if(!empty($acc_id)){
				$this->set(compact('acc_id'));
			}elseif(!empty($this->data)){
					$this->ContractBillEstimation->set($this->data);
					if($this->ContractBillEstimation->validates()){
						$this->ContractBillEstimation->save();
						$this->Session->setFlash(__('Contract bill saved', true));
					}
					else{
						$this->Session->setFlash(__('Could not save', true));
					}
					$this->redirect(array('action'=>'index', $this->data['ContractBillEstimation']['account_id']));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
		function index($acc_id){
			if(!empty($acc_id)){
				$this->paginate = array('conditions' => array('ContractBillEstimation.account_id' => $acc_id));
				$bills = $this->paginate('ContractBillEstimation');
				$this->set(compact('bills', 'acc_id'));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
		function edit($id){
			if(!empty($id)){
				$this->ContractBillEstimation->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->ContractBillEstimation->read();
	      }else{
	        if($this->ContractBillEstimation->save($this->data)){
	          $this->Session->setFlash(__('Bill estimation saved', true));    
	        }
					$this->redirect(array('action' => 'index', $this->data['ContractBillEstimation']['account_id']));
	      }
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
		function delete($id){
			if(!empty($id)){
				$old_data = $this->ContractBillEstimation->findById($id);
				$this->ContractBillEstimation->delete($id);
				$this->Session->setFlash(__('Record deleted successfully', true));
				$this->redirect(array('action'=>'index', $old_data['ContractBillEstimation']['account_id']));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
	}
?>