<?php
	class BankDetail extends AppModel{
		var $name = 'BankDetail';
		var $belongsTo = array('Account');
		var $hasMany = array('CashToBank');
		function beforeSave(){
	    if($this->data['BankDetail']['value'] == 'yes'){
	    	//var_dump($this->data); die;
	      App::import('model', 'CashBook');
				$this->CashBook = new CashBook();
				$row = $this->CashBook->find('first',array(
					'conditions' => array('MONTH(CashBook.opening_date)' => "MONTH($this->data['BankDetail']['check_date'])",
													'YEAR(CashBook.opening_date)' => "YEAR($this->data['BankDetail']['check_date'])")
				));
				if(empty($row)){
					$rec = array();
					$tmp_date = date("Y", strtotime($this->data['BankDetail']['check_date'])).'-'.date("m", strtotime($this->data['BankDetail']['check_date'])).'-01';
					$rec['CashBook']['opening_date'] = $tmp_date;
					$rec['CashBook']['opening_cash'] = $this->data['BankDetail']['cash_balance'];
					$rec['CashBook']['opening_bank'] = $this->data['BankDetail']['bank_balance'];
					$this->CashBook->save($rec);
				}
			}
			return true;
    }
	}
?>