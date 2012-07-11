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
				$acc_opening_date = strtotime($GLOBALS['accounting_year']['acc_opening_year']);
				$acc_closing_date = strtotime($GLOBALS['accounting_year']['acc_closing_year']);
				$purchase_date = strtotime($this->data['Purchase']['purchase_date']);
				if($acc_closing_date >= $purchase_date && $acc_opening_date <= $purchase_date){
					$acc_bank_details = $this->BankDetail->find('first', array(
					'conditions' => array(
						'BankDetail.acc_openning_year' => $GLOBALS['accounting_year']['acc_opening_year'],
						'BankDetail.acc_closing_year' => $GLOBALS['accounting_year']['acc_closing_year'], 
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
						$this->Session->setFlash(__('Purchases saved successfully', true));
						$this->redirect(array('controller' => 'accounts', 'action'=>'account1'));
					}else{
						$this->Session->setFlash(__('Insufficient balance in account, available balance is '.$acc_bank_details['BankDetail']['closing_bank_balance'], true));
					}
				}
			}
		}
	}
?>