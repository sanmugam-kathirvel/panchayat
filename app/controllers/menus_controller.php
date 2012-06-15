<?php
	class MenusController extends AppController{
		var $uses = array('Account', 'BankDetail', 'Header', 'Hamlet');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addopeningbals(){
			$account = $this->Account->find('all');
			$this->set(compact('account'));
			if(!empty($this->data)){
				$this->data['BankDetail']['closing_cash_balance'] = $this->data['BankDetail']['opening_cash_balance'];
				$this->data['BankDetail']['closing_bank_balance'] = $this->data['BankDetail']['opening_bank_balance']; 
				$this->BankDetail->save($this->data);
			}
		}
		function addheader(){
			$account = $this->Account->find('all');
			$this->set(compact('account'));
			if(!empty($this->data)){
				$this->Header->save($this->data);
			}
		}
		function editheader($id){
			$account = $this->Account->find('all');
			$this->set(compact('account'));
			if(empty($this->data)){
				$this->data = $this->Header->findById($id);
			}
			if(!empty($this->data)){
				$this->Header->save($this->data);
			}
		}
		function addopeningstock(){
			
		}
		function addhamlet(){
			if(!empty($this->data)){
				$this->Hamlet->save($this->data);
			}
		}
	}
?>
