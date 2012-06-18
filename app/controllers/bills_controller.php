<?php
	class BillsController extends AppController{
		var $uses = array('ContractBillEstimation');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addbill(){
			if(!empty($this->data)){
				$this->ContractBillEstimation->set($this->data);
				if($this->ContractBillEstimation->validates()){
					$this->ContractBillEstimation->save();
					$this->Session->setFlash(__('Contract bill saved', true));
					$this->redirect(array('action'=>'index'));
				}
				else{
					$this->Session->setFlash(__('Could not save', true));
				}
			}
		}
		function index(){
			$bills = $this->paginate('ContractBillEstimation');
			$this->set(compact('bills'));
		}
		function edit($id){
			if(!empty($id)){
				$this->ContractBillEstimation->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->ContractBillEstimation->read();
	      }else{
	        if($this->ContractBillEstimation->save($this->data)){
	          $this->Session->setFlash(__('Bill estimation saved', true));    
	          $this->redirect(array('action'=>'index'));
	        }
	      }
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function delete($id){
			if(!empty($id)){
				$this->ContractBillEstimation->delete($id);
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
			}
			$this->redirect(array('action'=>'index'));
		}
	}
?>