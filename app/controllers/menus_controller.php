<?php
	class MenusController extends AppController{
		var $uses = array('Account', 'BankDetail', 'Header', 'Hamlet', 'Stock', 'StockIssue');
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
				if($this->Header->save($this->data)){
					$this->redirect(array('action'=>'headerindex'));
				}
			}
		}
		function addopeningstock(){
			if(!empty($this->data)){
				$this->Stock->save($this->data);
			}
		}
		function addhamlet(){
			if(!empty($this->data)){
				if($this->Hamlet->save($this->data)){
					$this->redirect(array('action'=>'hamletindex'));
				}
			}
		}
		function stockissue(){
			$stock = $this->Stock->find('all');
			$this->set(compact('stock'));
			if(!empty($this->data)){
				$this->StockIssue->set($this->data);
				if($this->StockIssue->validates()){
					$acc_opening_date = strtotime($GLOBALS['accounting_year']['acc_opening_year']);
					$acc_closing_date = strtotime($GLOBALS['accounting_year']['acc_closing_year']);
					$issue_acc_date = strtotime($this->data['StockIssue']['issue_date']);
					if($acc_closing_date >= $issue_acc_date && $acc_opening_date <= $issue_acc_date){
						$stock = $this->Stock->findById($this->data['StockIssue']['stock_id']);
						if($stock['Stock']['item_quantity'] >= $this->data['StockIssue']['item_quantity']){
							$stock['Stock']['item_quantity'] = $stock['Stock']['item_quantity'] - $this->data['StockIssue']['item_quantity'] ;
							$this->Stock->save($stock);
							if(!empty($this->data)){
								$this->StockIssue->save($this->data);
							}
						}else{
							$this->Session->setFlash('Available Stock only '.$stock['Stock']['item_quantity']);
							$this->data['StockIssue'] = '';
						}
					}else{
						$this->Session->setFlash(__('Given date is invalid, please give dates between '.$GLOBALS['accounting_year']['acc_opening_year'].' and '.$GLOBALS['accounting_year']['acc_closing_year'], true));
					}
				}
			}
		}
		function stockissue_avail(){
			$this->layout = false;
			$stocks = $this->Stock->find('all', array(
				'conditions' => array('Stock.id' => $_POST['stock_id'])
			));
			$this->set(compact('stocks'));
			echo json_encode($stocks);
			exit;
		}
		function index(){
			
		}
		function headerindex(){
			$this->paginate = array(
					'contain' => 'Account'
			);
			$headers = $this->paginate('Header');
			$this->set(compact('headers'));
		}
		function editheader($id){
			if(!empty($id)){
				$this->Header->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->Header->read();
					$account = $this->Account->find('all');
					$this->set(compact('account'));
				}else{
	        if($this->Header->save($this->data)){
	          $this->Session->setFlash(__('Header saved', true));    
	          $this->redirect(array('action'=>'headerindex'));
	        }        
	      }
	    }else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'headerindex'));
			}
		}
		function deleteheader($id){
			if(!empty($id)){
				$this->Header->delete($id);
				$this->Session->setFlash(__('Record deleted successfully', true));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
			}
			$this->redirect(array('action'=>'headerindex'));
		}
		function hamletindex(){
			$this->paginate = array(
					'contain' => 'Account'
			);
			$hamlets = $this->paginate('Hamlet');
			$this->set(compact('hamlets'));
		}
		function edithamlet($id){
			if(!empty($id)){
				$this->Hamlet->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->Hamlet->read();
					$account = $this->Account->find('all');
					$this->set(compact('account'));
				}else{
	        if($this->Hamlet->save($this->data)){
	          $this->Session->setFlash(__('Hamlet saved', true));    
	          $this->redirect(array('action'=>'hamletindex'));
	        }        
	      }
	    }else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'hamletindex'));
			}
		}
		function deletehamlet($id){
			if(!empty($id)){
				$this->Hamlet->delete($id);
				$this->Session->setFlash(__('Record deleted successfully', true));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
			}
			$this->redirect(array('action'=>'hamletindex'));
		}
		function balanceindex(){
			$this->paginate = array(
					'contain' => 'Account'
			);
			$balances = $this->paginate('BankDetail');
			$this->set(compact('balances'));
		}
		function editbalance($id){
			if(!empty($id)){
				$this->BankDetail->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->BankDetail->read();
					$account = $this->Account->find('all');
					$this->set(compact('account'));
				}else{
	        if($this->BankDetail->save($this->data)){
	          $this->Session->setFlash(__('Account saved', true));    
	          $this->redirect(array('action'=>'balanceindex'));
	        }        
	      }
	    }else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'balanceindex'));
			}
		}
		function deletebalance($id){
			if(!empty($id)){
				$this->BankDetail->delete($id);
				$this->Session->setFlash(__('Record deleted successfully', true));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
			}
			$this->redirect(array('action'=>'balanceindex'));
		}
	}
?>
