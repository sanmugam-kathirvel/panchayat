<?php
	class MenusController extends AppController{
		var $uses = array('Account', 'BankDetail', 'Header', 'Hamlet', 'Stock', 'StockIssue', 'Book', 'BookDetail', 'Employee');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addopeningbals(){
			$account_op = $this->Account->find('list', array(
				'fields' => 'Account.account_name'
			));
			$this->set(compact('account_op'));
			if(!empty($this->data)){
				$this->BankDetail->set($this->data);
				if($this->BankDetail->validates()){
					$this->data['BankDetail']['closing_cash_balance'] = $this->data['BankDetail']['opening_cash_balance'];
					$this->data['BankDetail']['closing_bank_balance'] = $this->data['BankDetail']['opening_bank_balance']; 
					$this->BankDetail->save($this->data);
					$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
					$this->redirect(array('action'=>'balanceindex'));
				}
			}
		}
		function addheader(){
			$account_op = $this->Account->find('list', array(
				'fields' => 'Account.account_name'
			));
			$this->set(compact('account_op'));
			if(!empty($this->data)){
				$this->Header->set($this->data);
				if($this->Header->validates()){
					if($this->Header->save($this->data)){
						$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
						$this->redirect(array('action'=>'headerindex'));
					}else{
						$this->Session->setFlash(__($GLOBALS['flash_messages']['add_failed'], true));
						$this->redirect(array('action'=>'headerindex'));
					}
				}
			}
		}
		function addopeningstock(){
			if(!empty($this->data)){
				$this->Stock->set($this->data);
				if($this->Stock->validates()){
					$this->Stock->save($this->data);
					$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
				}
			}
		}
		function addhamlet(){
			if(!empty($this->data)){
				$this->Hamlet->set($this->data);
				if($this->Hamlet->validates()){
					if($this->Hamlet->save($this->data)){
						$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
						$this->redirect(array('action'=>'hamletindex'));
					}else{
						$this->Session->setFlash(__($GLOBALS['flash_messages']['add_failed'], true));
						$this->redirect(array('action'=>'hamletindex'));
					}
				}
			}
		}
		function stockissue(){
			$stock = $this->Stock->find('all');
			$this->set(compact('stock'));
			if(!empty($this->data)){
				$this->StockIssue->set($this->data);
				if($this->StockIssue->validates()){
					$acc_opening_date = strtotime($this->Session->read('User.acc_opening_year'));
					$acc_closing_date = strtotime($this->Session->read('User.acc_closing_year'));
					$issue_acc_date = strtotime($this->data['StockIssue']['issue_date']);
					if($acc_closing_date >= $issue_acc_date && $acc_opening_date <= $issue_acc_date){
						$stock = $this->Stock->findById($this->data['StockIssue']['stock_id']);
						if($stock['Stock']['item_quantity'] >= $this->data['StockIssue']['item_quantity']){
							$stock['Stock']['item_quantity'] = $stock['Stock']['item_quantity'] - $this->data['StockIssue']['item_quantity'] ;
							$this->Stock->save($stock);
							if(!empty($this->data)){
								$this->StockIssue->set($this->data);
								if($this->StockIssue->validates()){
									$this->StockIssue->save($this->data);
									$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));    
		          		$this->redirect(array('action'=>'stock_index'));
								}
							}
						}else{
							$this->Session->setFlash($GLOBALS['flash_messages']['low_stock']);
							$this->data['StockIssue'] = '';
						}
					}else{
						$this->Session->setFlash(__($GLOBALS['flash_messages']['date_check'], true));
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
				$account = $this->Account->find('all');
				$this->set(compact('account'));
	      if(empty($this->data)) {
	        $this->data = $this->Header->read();
				}else{
					$this->Header->set($this->data);
					if($this->Header->validates()){
		        if($this->Header->save($this->data)){
		          $this->Session->setFlash(__($GLOBALS['flash_messages']['edited'], true));    
		          $this->redirect(array('action'=>'headerindex'));
		        }
					}
	      }
	    }else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'headerindex'));
			}
		}
		function deleteheader($id){
			if(!empty($id)){
				$this->Header->delete($id);
				$this->Session->setFlash(__($GLOBALS['flash_messages']['deleted'], true));
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
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
				}else{
					$this->Hamlet->set($this->data);
					if($this->Hamlet->validates()){
		        if($this->Hamlet->save()){
		          $this->Session->setFlash(__($GLOBALS['flash_messages']['edited'], true));    
		          $this->redirect(array('action'=>'hamletindex'));
		        }
					}
	      }
	    }else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'hamletindex'));
			}
		}
		function deletehamlet($id){
			if(!empty($id)){
				$this->Hamlet->delete($id);
				$this->Session->setFlash(__($GLOBALS['flash_messages']['deleted'], true));
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
			}
			$this->redirect(array('action'=>'hamletindex'));
		}
		function balanceindex(){
			$this->paginate = array(
					'conditions' => array('BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year')),
					'contain' => 'Account'
			);
			$balances = $this->paginate('BankDetail');
			$this->set(compact('balances'));
		}
		function editbalance($id){
			if(!empty($id)){
				$account = $this->Account->find('all');
				$this->set(compact('account'));
				$this->BankDetail->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->BankDetail->read();
				}else {
					$this->BankDetail->set($this->data);
					if($this->BankDetail->validates()){
		        if($this->BankDetail->save()){
		          $this->Session->setFlash(__($GLOBALS['flash_messages']['edited'], true));    
		          $this->redirect(array('action'=>'balanceindex'));
		        }
					}
	      }
	    }else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'balanceindex'));
			}
		}
		function deletebalance($id){
			if(!empty($id)){
				$this->BankDetail->delete($id);
				$this->Session->setFlash(__($GLOBALS['flash_messages']['deleted'], true));
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
			}
			$this->redirect(array('action'=>'balanceindex'));
		}
		function bookindex(){
			$this->paginate = array(
					'conditions' => array('BookDetail.purchase_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year'))),
					'order' => 'BookDetail.purchase_date DESC',
					'contain' => array('Book')
				);
				$books = $this->paginate('BookDetail');
				$this->set(compact('books'));
		}
		function addbook(){
			$books = $this->Book->find('all');
			$this->set(compact('books'));
			if(!empty($this->data)){
				$this->BookDetail->set($this->data);
				if($this->BookDetail->validates()){
					if($this->BookDetail->save($this->data)){
						$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
						$this->redirect(array('action'=>'bookindex'));
					}else{
						$this->Session->setFlash(__($GLOBALS['flash_messages']['add_failed'], true));
						$this->redirect(array('action'=>'bookindex'));
					}
				}
			}
		}
		function editbook($id){
			if(!empty($id)){
				$books = $this->Book->find('all');
				$this->set(compact('books'));
				$this->BookDetail->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->BookDetail->read();
				}else{
					$this->BookDetail->set($this->data);
					if($this->BookDetail->validates()){
		        if($this->BookDetail->save($this->data)){
		          $this->Session->setFlash(__($GLOBALS['flash_messages']['edited'], true));
							$this->redirect(array('action'=>'bookindex'));
		        }else{
							$this->Session->setFlash(__($GLOBALS['flash_messages']['edit_failed'], true));
							$this->redirect(array('action'=>'bookindex'));
						}
					}
	      }
			}else{
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'bookindex'));
			}
		}
		function deletebook($id){
			if(!empty($id)){
				$this->BookDetail->delete($id);
				$this->Session->setFlash(__($GLOBALS['flash_messages']['deleted'], true));
				$this->redirect(array('action'=>'bookindex'));
			}else{
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'bookindex'));
			}
		}
		function book_issue(){
			$book_names = $this->Book->find('list', array(
				'fields' => 'Book.book_name'
			));
			$this->set(compact('book_names'));
			if(!empty($this->data)){
				$this->BookDetail->set($this->data);
				if($this->BookDetail->validates()){
					$this->BookDetail->id = $this->data['BookDetail']['book_detail_id'];
					if($this->BookDetail->saveField('status', 'used')){
						$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
						$this->redirect(array('action' => 'bookindex'));
					}else{
						$this->Session->setFlash(__($GLOBALS['flash_messages']['add_failed'], true));
						$this->redirect(array('action' => 'book_issue'));
					}
				}
			}
 		}
		function get_book_details(){
			$this->layout = false;
      $bookdetail = $this->BookDetail->find('all', array(
        'conditions' => array(
        	'BookDetail.book_id' => $_POST['book_type_id'],
        	'BookDetail.status' => 'available'
				),
        'contain' => false
      ));
       echo json_encode($bookdetail);
       exit; 
		}
		function stock_index(){
			$stocks = $this->paginate('Stock');
			$this->set(compact('stocks'));
		}
		function employees_index(){
			$employees = $this->paginate('Employee');
			$this->set(compact('employees'));
		}
		function add_employee(){
			if(!empty($this->data)){
				$this->Employee->set($this->data);
				if($this->Employee->validates()){
					if($this->Employee->save($this->data)){
						$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
						$this->redirect(array('action'=>'employees_index'));
					}else{
						$this->Session->setFlash(__($GLOBALS['flash_messages']['add_failed'], true));
						$this->redirect(array('action'=>'employees_index'));
					}
				}
			}
		}
		function edit_employee($id){
			if(!empty($id)){
				$this->Employee->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->Employee->read();
				}else{
					$this->Employee->set($this->data);
					if($this->Employee->validates()){
		        if($this->Employee->save($this->data)){
		          $this->Session->setFlash(__($GLOBALS['flash_messages']['edited'], true));
							$this->redirect(array('action'=>'employees_index'));
		        }else{
							$this->Session->setFlash(__($GLOBALS['flash_messages']['edit_failed'], true));
							$this->redirect(array('action'=>'employees_index'));
						}
					}
	      }
			}else{
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'employees_index'));
			}
		}
		function delete_employee($id){
			if(!empty($id)){
				$this->Employee->delete($id);
				$this->Session->setFlash(__($GLOBALS['flash_messages']['deleted'], true));
				$this->redirect(array('action'=>'employees_index'));
			}else{
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'employees_index'));
			}
		}
	}
?>
