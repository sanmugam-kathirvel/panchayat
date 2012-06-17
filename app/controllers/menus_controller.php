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
			if(!empty($this->data)){
				$this->Stock->save($this->data);
			}
		}
		function addhamlet(){
			if(!empty($this->data)){
				$this->Hamlet->save($this->data);
			}
		}
		function stockissue(){
			$stock = $this->Stock->find('all');
			$this->set(compact('stock'));
			if(!empty($this->data['StockIssue']['item_quantity'])){
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
	}
?>
