<?php
	class PurchasesController extends AppController{
		var $uses = array('Account', 'BankDetail', 'Purchase', 'PurchaseItem', 'Stock');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function purchase(){
			$stocks = $this->Stock->find('all');
			$this->set(compact('stocks'));
			if(!empty($this->data)){
				$this->Purchase->set($this->data);
				if($this->Purchase->validates()){
					$acc_opening_date = strtotime($this->Session->read('User.acc_opening_year'));
					$acc_closing_date = strtotime($this->Session->read('User.acc_closing_year'));
					$purchase_date = strtotime($this->data['Purchase']['purchase_date']);
					if($acc_closing_date >= $purchase_date && $acc_opening_date <= $purchase_date){
						$acc_bank_details = $this->BankDetail->find('first', array(
						'conditions' => array(
							'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
							'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
							'BankDetail.account_id' => 1
							)
						));
						if($acc_bank_details['BankDetail']['closing_bank_balance'] >= $this->data['Purchase']['total_amt']){
							$datas = $this->data;
							$stocks_list = $this->Stock->find('all');
							foreach ($datas['PurchaseItem'] as $key => $value){
								if($value['item_tot_amount'] == '0'){
									unset($datas['PurchaseItem'][$key]);
								}else{
									foreach ($stocks as $stock) {
										if($stock['Stock']['id'] == $value['stock_id']){
											$stock['Stock']['item_quantity'] = (int)$stock['Stock']['item_quantity'] + (int)$value['item_quantity'];
											$this->Stock->save($stock['Stock']);
										}
									}
								}
							}
							$acc_bank_details['BankDetail']['value'] = 'yes';
							$acc_bank_details['BankDetail']['check_date'] = $this->data['Purchase']['purchase_date'];
							$acc_bank_details['BankDetail']['cash_balance'] = $acc_bank_details['BankDetail']['closing_cash_balance'];
							$acc_bank_details['BankDetail']['bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'];
							$acc_bank_details['BankDetail']['closing_bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'] - $this->data['Purchase']['total_amt'];
							$this->BankDetail->save($acc_bank_details['BankDetail']);
							$this->Purchase->saveAll($datas);
							$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
							$this->redirect(array('action'=>'index'));
						}else{
							$this->Session->setFlash(__($GLOBALS['flash_messages']['low_balance'], true));
						}
					}
				}
			}
		}
		function get_stock_avail(){
			$this->layout = false;
			$stock = $this->Stock->find('first', array(
				'conditions' => array('Stock.id' => $_POST['stock_id'])
			));
			$this->set(compact('stock'));
			echo json_encode($stock);
			exit;
		}
		function index(){
			$this->paginate = array(
					'conditions' => array('Purchase.purchase_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year'))),
					'order' => 'Purchase.purchase_date DESC'
			);
			$receipts = $this->paginate('Purchase');
			$this->set(compact('receipts'));
		}
		function view($id){
			if(!empty($id)){
				$items = $this->Purchase->find('first', array(
						'conditions' => array('Purchase.id' => $id),
				));
				$this->data = $items['Purchase'];
				$items = $this->PurchaseItem->find('all', array(
						'conditions' => array('PurchaseItem.purchase_id' => $this->data['id']),
						'order' => 'PurchaseItem.id ASC',
				));
				$this->set(compact('items'));
			}else{
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'index'));
			}
		}
	}
?>