<?php
	class BankDetail extends AppModel{
		var $name = 'BankDetail';
		var $belongsTo = array('Account');
		var $hasMany = array('CashToBank');
		var $validate = array(
			'account_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'bank_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'branch' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'opening_cash_balance' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'opening_bank_balance' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);
		
		function beforeSave(){
	    if($this->data['BankDetail']['value'] == 'yes'){
	      App::import('model', 'CashBook');
				$this->CashBook = new CashBook();
				$tmp_date = date("Y", strtotime($this->data['BankDetail']['check_date'])).'-'.date("m", strtotime($this->data['BankDetail']['check_date'])).'-01';
				$row = $this->CashBook->find('all',array(
					'conditions' => array('CashBook.account_id' => $this->data['BankDetail']['account_id'],
													'CashBook.opening_date' => $tmp_date)
				));
				if(empty($row)){
					$new_rec = array();
					$new_rec['CashBook']['account_id'] = $this->data['BankDetail']['account_id'];
					$new_rec['CashBook']['opening_date'] = $tmp_date;
					$new_rec['CashBook']['opening_cash'] = $this->data['BankDetail']['cash_balance'];
					$new_rec['CashBook']['opening_bank'] = $this->data['BankDetail']['bank_balance'];
					$this->CashBook->save($new_rec);
				}
			}
			return true;
    }
	}
?>