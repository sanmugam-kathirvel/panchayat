<?php
	class PurchasesController extends AppController{
		var $uses = array('Account', 'BankDetail', 'Purchase', 'PurchaseItem');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function purchase(){
			if(!empty($this->data)){
				$this->Purchase->saveAll($this->data);
			}
		}
	}
?>