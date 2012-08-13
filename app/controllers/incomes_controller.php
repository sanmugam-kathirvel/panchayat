<?php
	class IncomesController extends AppController{
		var $uses = array('Account','Header', 'Income','BankDetail');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addincome($acc_id){
			if(!empty($acc_id)){
				$header = $this->Header->find('all', array(
					'conditions' => array('Header.account_id' => $acc_id, 'Header.header_type' => 'income', 'Header.receipt' => 'no')
				));
				$this->set(compact('header', 'acc_id'));
				if(!empty($this->data)){
					$this->Income->set($this->data);
					if($this->Income->validates()){
						$acc_opening_date = strtotime($this->Session->read('User.acc_opening_year'));
						$acc_closing_date = strtotime($this->Session->read('User.acc_closing_year'));
						$income_acc_date = strtotime($this->data['Income']['income_date']);
						if($acc_closing_date >= $income_acc_date && $acc_opening_date <= $income_acc_date){
							$acc_bank_details = $this->BankDetail->find('first', array(
								'conditions' => array(
									'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
									'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'),
									'BankDetail.account_id' => $this->data['Income']['account_id']
								)
							));
							$acc_bank_details['BankDetail']['value'] = 'yes';
							$acc_bank_details['BankDetail']['check_date'] = $this->data['Income']['income_date'];
							$acc_bank_details['BankDetail']['cash_balance'] = $acc_bank_details['BankDetail']['closing_cash_balance'];
							$acc_bank_details['BankDetail']['bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance']; 
							$acc_bank_details['BankDetail']['closing_bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'] + $this->data['Income']['income_amount'];
							$this->BankDetail->save($acc_bank_details['BankDetail']);
							$this->Income->save();
							$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
							$this->redirect(array('action'=>'index', $this->data['Income']['account_id']));
						}else{
							$this->Session->setFlash(__($GLOBALS['flash_messages']['date_check'], true));
						}
					}
				}
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
		function index($acc_id){
			if(!empty($acc_id)){
				$this->paginate = array(
					'conditions' => array('Income.income_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year')),
					'Income.account_id' => $acc_id),
					'order' => 'Income.income_date DESC',
					'contain' => array('Account','Header')
				);
				$incomes = $this->paginate('Income');
				$this->set(compact('incomes', 'acc_id'));
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
		function edit($id){
			if(!empty($id)){
				$this->Income->id=$id;
				$tmp_data = $this->Income->read();
				$header = $this->Header->find('all', array(
					'conditions' => array('Header.account_id' => $tmp_data['Income']['account_id'], 'Header.header_type' => 'income', 'Header.receipt' => 'no')
				));
				$this->set(compact('header'));
	      if(empty($this->data)) {
	        $this->data = $tmp_data;
	      }else{
	      	$this->Income->set($this->data);
					if($this->Income->validates()){
		      	$acc_opening_date = strtotime($this->Session->read('User.acc_opening_year'));
						$acc_closing_date = strtotime($this->Session->read('User.acc_closing_year'));
						$income_acc_date = strtotime($this->data['Income']['income_date']);
						if($acc_closing_date >= $income_acc_date && $acc_opening_date <= $income_acc_date){
							$old_data = $this->Income->findById($this->data['Income']['id']);
							$amount_to_update = 0;
							$flag = 0;
							if(((int)$this->data['Income']['income_amount']) > ((int)$old_data['Income']['income_amount'])){
								$amount_to_update = ((int)$this->data['Income']['income_amount']) - ((int)$old_data['Income']['income_amount']);
							}elseif(((int)$this->data['Income']['income_amount']) < ((int)$old_data['Income']['income_amount'])){
								$amount_to_update =  ((int)$old_data['Income']['income_amount']) - ((int)$this->data['Income']['income_amount']);
								$flag = 2;
							}else{
								$amount_to_update = 0;
							}
							if($amount_to_update != 0){
								$acc_bank_details = $this->BankDetail->find('first', array(
									'conditions' => array(
										'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
										'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
										'BankDetail.account_id' => $this->data['Income']['account_id']
									)
								));
								if($flag == 0){
									$acc_bank_details['BankDetail']['closing_bank_balance'] += $amount_to_update;
								}else{
									$acc_bank_details['BankDetail']['closing_bank_balance'] -= $amount_to_update;
								}
								$acc_bank_details['BankDetail']['value'] = 'no';
								$this->BankDetail->save($acc_bank_details);
							}
			        if($this->Income->save($this->data)){
			          $this->Session->setFlash(__($GLOBALS['flash_messages']['edited'], true));    
			          $this->redirect(array('action'=>'index', $this->data['Income']['account_id']));       
			        }        
			      }else{
							$this->Session->setFlash(__($GLOBALS['flash_messages']['date_check'], true));
						}
					}
		    }
	    }else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
		function delete($id, $account_id, $amount){
			if(!empty($id)){
				$acc_bank_details = $this->BankDetail->find('first', array(
					'conditions' => array(
						'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
						'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
						'BankDetail.account_id' => $account_id
					)
				));
				$acc_bank_details['BankDetail']['closing_bank_balance'] -=  $amount;
				$acc_bank_details['BankDetail']['value'] = 'no';
				$this->BankDetail->save($acc_bank_details);
				$this->Income->delete($id);
				$this->Session->setFlash(__($GLOBALS['flash_messages']['deleted'], true));
				$this->redirect(array('action'=>'index', $account_id));
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
	}

?>
