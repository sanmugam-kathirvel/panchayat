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
				$this->Purchase->saveAll($this->data);
			}
		}
	}
?>