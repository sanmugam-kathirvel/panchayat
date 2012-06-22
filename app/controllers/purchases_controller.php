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
				if($this->Purchase->saveAll($datas)){
					$this->Session->setFlash(__('Purchase added successfully', true));
					$this->redirect(array('action'=>'purchase'));
				}
			}
		}
	}
?>