<?php
	class BillsController extends AppController{
		var $uses = array('ContractBillEstimation', 'BankDetail');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addbill($acc_id = null){
			if(!$acc_id){
				if(isset($this->params['data']['ContractBillEstimation']['account_id'])){
					$acc_id = $this->params['data']['ContractBillEstimation']['account_id'];
				}
			}
			$this->set(compact('acc_id'));
			if(!empty($this->data)){
				$this->ContractBillEstimation->set($this->data);
				if($this->ContractBillEstimation->validates()){
					$acc_opening_date = strtotime($this->Session->read('User.acc_opening_year'));
					$acc_closing_date = strtotime($this->Session->read('User.acc_closing_year'));
					$bill_date = strtotime($this->data['ContractBillEstimation']['bill_date']);
					if($acc_closing_date >= $bill_date && $acc_opening_date <= $bill_date){
						$acc_bank_details = $this->BankDetail->find('first', array(
							'conditions' => array(
								'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
								'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'),
								'BankDetail.account_id' => $this->data['ContractBillEstimation']['account_id']
							)
						));
						if($acc_bank_details['BankDetail']['closing_bank_balance'] >= $this->data['ContractBillEstimation']['cheque_amt']){
							$acc_bank_details['BankDetail']['value'] = 'yes';
							$acc_bank_details['BankDetail']['check_date'] = $this->data['ContractBillEstimation']['bill_date'];
							$acc_bank_details['BankDetail']['cash_balance'] = $acc_bank_details['BankDetail']['closing_cash_balance'];
							$acc_bank_details['BankDetail']['bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance']; 
							$acc_bank_details['BankDetail']['closing_bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'] - $this->data['ContractBillEstimation']['cheque_amt'];
							$this->BankDetail->save($acc_bank_details['BankDetail']);
							if($this->ContractBillEstimation->save()){
								$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
								$this->redirect(array('action'=>'index', $this->data['ContractBillEstimation']['account_id']));
							}else{
								$this->Session->setFlash(__($GLOBALS['flash_messages']['add_failed'], true));
								$this->redirect(array('action'=>'index', $this->data['ContractBillEstimation']['account_id']));
							}
						}else{
							$this->Session->setFlash(__($GLOBALS['flash_messages']['low_balance'], true));
							$this->redirect($this->referer());
						}
					}else{
						$this->Session->setFlash(__($GLOBALS['flash_messages']['date_check'], true));
						$this->redirect($this->referer());
					}
				}
			}//else {
				//$this->Session->setFlash(__('Invalid operation', true));
				//$this->redirect(array('action'=>'../accounts/index'));
			//}
		}
		function index($acc_id){
			if(!empty($acc_id)){
				$this->paginate = array('conditions' => array('ContractBillEstimation.account_id' => $acc_id));
				$bills = $this->paginate('ContractBillEstimation');
				$this->set(compact('bills', 'acc_id'));
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
		function edit($id){
			if(!empty($id)){
				$this->ContractBillEstimation->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->ContractBillEstimation->read();
	      }else{
	      	$this->ContractBillEstimation->set($this->data);
					$acc_opening_date = strtotime($this->Session->read('User.acc_opening_year'));
					$acc_closing_date = strtotime($this->Session->read('User.acc_closing_year'));
					$bill_date = strtotime($this->data['ContractBillEstimation']['bill_date']);
					if($acc_closing_date >= $bill_date && $acc_opening_date <= $bill_date){
						$old_data = $this->ContractBillEstimation->findById($this->data['ContractBillEstimation']['id']);
						$amount_to_update = 0;
						$flag = 0;
						if(((int)$this->data['ContractBillEstimation']['cheque_amt']) > ((int)$old_data['ContractBillEstimation']['cheque_amt'])){
							$amount_to_update = ((int)$this->data['ContractBillEstimation']['expense_amount']) - ((int)$old_data['ContractBillEstimation']['cheque_amt']);
						}elseif(((int)$this->data['ContractBillEstimation']['cheque_amt']) < ((int)$old_data['ContractBillEstimation']['cheque_amt'])){
							$amount_to_update =  ((int)$old_data['ContractBillEstimation']['cheque_amt']) - ((int)$this->data['ContractBillEstimation']['cheque_amt']);
							$flag = 1;
						}else{
							$amount_to_update = 0;
						}
						if($amount_to_update != 0){
							$acc_bank_details = $this->BankDetail->find('first', array(
								'conditions' => array(
									'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
									'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
									'BankDetail.account_id' => $this->data['ContractBillEstimation']['account_id']
								)
							));
							if($flag == 0){
								$acc_bank_details['BankDetail']['closing_bank_balance'] -= $amount_to_update;
							}else{
								$acc_bank_details['BankDetail']['closing_bank_balance'] += $amount_to_update;
							}
							$acc_bank_details['BankDetail']['value'] = 'no';
							$this->BankDetail->save($acc_bank_details);
						}
						if($this->ContractBillEstimation->save()){
							$this->Session->setFlash(__($GLOBALS['flash_messages']['edited'], true));
							$this->redirect(array('action'=>'index', $this->data['ContractBillEstimation']['account_id']));
						}else{
							$this->Session->setFlash(__($GLOBALS['flash_messages']['edit_failed'], true));
							$this->redirect(array('action'=>'index', $this->data['ContractBillEstimation']['account_id']));
						}
					}else{
						$this->Session->setFlash(__($GLOBALS['flash_messages']['date_check'], true));
						$this->redirect($this->referer());
					}
	      }
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
		function delete($id, $account_id, $amount){
			if(!empty($id) && !empty($account_id) && !empty($amount)){
				$acc_bank_details = $this->BankDetail->find('first', array(
					'conditions' => array(
						'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
						'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
						'BankDetail.account_id' => $account_id
					)
				));
				$acc_bank_details['BankDetail']['closing_bank_balance'] +=  $amount;
				$acc_bank_details['BankDetail']['value'] = 'no';
				$this->BankDetail->save($acc_bank_details);
				$this->ContractBillEstimation->delete($id);
				$this->Session->setFlash(__($GLOBALS['flash_messages']['deleted'], true));
				$this->redirect(array('action'=>'index', $account_id));
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'../accounts/index'));
			}
		}
	}
?>