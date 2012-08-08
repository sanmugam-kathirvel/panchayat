<?php
	class ReceiptsController extends AppController{
		var $uses = array('CashToBank', 'Account', 'BankDetail', 'Header', 'Hamlet', 'HousetaxReceipt','HtDemand', 'WatertaxReceipt', 'WtDemand', 'ProfessionaltaxReceipt', 'PtDemand', 'DotaxReceipt', 'DoDemand', 'OthersReceipt');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function index(){
			
		}
		function cashtobank_index(){
			$this->paginate = array(
					'conditions' => array('CashToBank.transfer_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year'))),
					'order' => 'CashToBank.transfer_date DESC',
					'contain' => array('BankDetail')
				);
				$banks = $this->paginate('CashToBank');
				$this->set(compact('banks'));
		}
		function cashtobank(){
			$account_detail = $this->BankDetail->find('first', array(
				'conditions' => array(
					'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
					'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
					'BankDetail.account_id' => 1
				)
			));
			$bankid = (int)($account_detail['BankDetail']['id']);
			$cashbals = (int)($account_detail['BankDetail']['closing_cash_balance']);
			$this->set(compact('bankid', 'cashbals'));
			if(!empty($this->data)){
				if((int)($account_detail['BankDetail']['closing_cash_balance']) >= (int)($this->data['CashToBank']['transfer_amount'])){
					if($this->CashToBank->save($this->data)){
						$acc_bank_details['BankDetail']['value'] = 'no';
						$account_detail['BankDetail']['closing_bank_balance'] = (int)($account_detail['BankDetail']['closing_bank_balance']) + (int)($this->data['CashToBank']['transfer_amount']);
						$account_detail['BankDetail']['closing_cash_balance'] = (int)($account_detail['BankDetail']['closing_cash_balance']) - (int)($this->data['CashToBank']['transfer_amount']);
						$this->BankDetail->save($account_detail);
						$this->Session->setFlash(__('Cash transferred to bank account successfully', true));
						$this->redirect(array('action'=>'../accounts/account1'));
					}
				}else{
					$this->Session->setFlash(__('Please give valid transfer amount', true));
				}
			}
		}
		function addothersreceipt(){
			$headers = $this->Header->find('all', array(
				'conditions' => array('Header.account_id' => 1, 'Header.receipt' => 'yes', 'Header.header_type' => 'income')
			));
			$this->set(compact('headers'));
			if(!empty($this->data)){
				if($this->OthersReceipt->save($this->data)){
					$acc_bank_details = $this->BankDetail->find('first', array(
							'conditions' => array(
								'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
								'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
								'BankDetail.account_id' => 1
							)
					));
					$acc_bank_details['BankDetail']['value'] = 'yes';
					$acc_bank_details['BankDetail']['check_date'] = $this->data['OthersReceipt']['receipt_date'];
					$acc_bank_details['BankDetail']['cash_balance'] = $acc_bank_details['BankDetail']['closing_cash_balance'];
					$acc_bank_details['BankDetail']['bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'];
					$acc_bank_details['BankDetail']['closing_cash_balance'] = (int)($acc_bank_details['BankDetail']['closing_cash_balance']) + (int)($this->data['OthersReceipt']['amount']);
					$this->BankDetail->save($acc_bank_details);
					$this->Session->setFlash(__('Receipt added successfully', true));
					$this->redirect(array('action'=>'index'));					
				}
			}
		}
		function addhousetaxreceipt(){
			$hamlet = $this->Hamlet->find('all');
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->HousetaxReceipt->set($this->data);
				if($this->HousetaxReceipt->validates()){
					if($this->HousetaxReceipt->save($this->data)){
						$acc_bank_details = $this->BankDetail->find('first', array(
								'conditions' => array(
									'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
									'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
									'BankDetail.account_id' => 1
								)
						));
						$acc_bank_details['BankDetail']['value'] = 'yes';
						$acc_bank_details['BankDetail']['check_date'] = $this->data['HousetaxReceipt']['receipt_date'];
						$acc_bank_details['BankDetail']['cash_balance'] = $acc_bank_details['BankDetail']['closing_cash_balance'];
						$acc_bank_details['BankDetail']['bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'];
						$acc_bank_details['BankDetail']['closing_cash_balance'] = (int)($acc_bank_details['BankDetail']['closing_cash_balance']) + (int)($this->data['HousetaxReceipt']['total_amount']);
						$this->BankDetail->save($acc_bank_details);
						$this->Session->setFlash(__('Receipt added successfully', true));
						$this->redirect(array('action'=>'index'));					
					}
				}else{
					$this->Session->setFlash(__('Receipt could not be saved, Please check form for error', true));
				}
			}
		}
		function get_housetax_family_demand(){
			$this->layout = false;
			$htdemand = $this->HtDemand->find('first', array(
				'conditions' => array(
					'HtDemand.demand_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year')),
					'HtDemand.demand_number' => $_POST['demand_number']
				)
			));
			echo json_encode($htdemand);
			exit;	
		}
		function addwatertaxreceipt(){
			$hamlet = $this->Hamlet->find('all');
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				if($this->WatertaxReceipt->save($this->data)){
					$acc_bank_details = $this->BankDetail->find('first', array(
								'conditions' => array(
									'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
									'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
									'BankDetail.account_id' => 1
								)
					));
					$acc_bank_details['BankDetail']['value'] = 'yes';
					$acc_bank_details['BankDetail']['check_date'] = $this->data['WatertaxReceipt']['receipt_date'];
					$acc_bank_details['BankDetail']['cash_balance'] = $acc_bank_details['BankDetail']['closing_cash_balance'];
					$acc_bank_details['BankDetail']['bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'];
					$acc_bank_details['BankDetail']['closing_cash_balance'] = (int)($acc_bank_details['BankDetail']['closing_cash_balance']) + (int)($this->data['WatertaxReceipt']['total_amount']);
					$this->BankDetail->save($acc_bank_details);
					$this->Session->setFlash(__('Receipt added successfully', true));
					$this->redirect(array('action'=>'index'));
				}
			}
		}
		function get_watertax_family_demand(){
			$this->layout = false;
			$wtdemand = $this->WtDemand->find('first', array(
				'conditions' => array(
					'WtDemand.demand_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year')),
					'WtDemand.demand_number' => $_POST['demand_number']
				)
			));
			echo json_encode($wtdemand);
			exit;	
		}
		function addprofessionaltaxreceipt(){
			$hamlet = $this->Hamlet->find('all');
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->ProfessionaltaxReceipt->set($this->data);
				if($this->ProfessionaltaxReceipt->validates()){
					if($this->ProfessionaltaxReceipt->save($this->data)){
						$acc_bank_details = $this->BankDetail->find('first', array(
									'conditions' => array(
										'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
										'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
										'BankDetail.account_id' => 1
									)
						));
						$acc_bank_details['BankDetail']['value'] = 'yes';
						$acc_bank_details['BankDetail']['check_date'] = $this->data['ProfessionaltaxReceipt']['receipt_date'];
						$acc_bank_details['BankDetail']['cash_balance'] = $acc_bank_details['BankDetail']['closing_cash_balance'];
						$acc_bank_details['BankDetail']['bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'];
						$acc_bank_details['BankDetail']['closing_cash_balance'] = (int)($acc_bank_details['BankDetail']['closing_cash_balance']) + (int)($this->data['ProfessionaltaxReceipt']['total_amount']);
						$this->BankDetail->save($acc_bank_details);
						$this->Session->setFlash(__('Receipt added successfully', true));
						$this->redirect(array('action'=>'index'));
					}
				}else{
					$this->Session->setFlash(__('Receipt could not be added, Please check form for error', true));
				}
			}
		}
		function get_professionaltax_family_demand(){
			$this->layout = false;
			$ptdemand = $this->PtDemand->find('first', array(
				'conditions' => array(
					'PtDemand.demand_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year')),
					'PtDemand.demand_number' => $_POST['demand_number']
				)
			));
			echo json_encode($ptdemand);
			exit;	
		}
		function adddotaxreceipt(){
			$hamlet = $this->Hamlet->find('all');
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->DotaxReceipt->set($this->data);
				if($this->DotaxReceipt->validates()){
					if($this->DotaxReceipt->save($this->data)){
						$acc_bank_details = $this->BankDetail->find('first', array(
									'conditions' => array(
										'BankDetail.acc_openning_year' => $this->Session->read('User.acc_opening_year'),
										'BankDetail.acc_closing_year' => $this->Session->read('User.acc_closing_year'), 
										'BankDetail.account_id' => 1
									)
						));
						$acc_bank_details['BankDetail']['value'] = 'yes';
						$acc_bank_details['BankDetail']['check_date'] = $this->data['DotaxReceipt']['receipt_date'];
						$acc_bank_details['BankDetail']['cash_balance'] = $acc_bank_details['BankDetail']['closing_cash_balance'];
						$acc_bank_details['BankDetail']['bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'];
						$acc_bank_details['BankDetail']['closing_cash_balance'] = (int)($acc_bank_details['BankDetail']['closing_cash_balance']) + (int)($this->data['DotaxReceipt']['total_amount']);
						$this->BankDetail->save($acc_bank_details);
						$this->Session->setFlash(__('Receipt added successfully', true));
						$this->redirect(array('action'=>'index'));
					}
				}else{
					$this->Session->setFlash(__('Receipt could not be added, Please check form for error', true));
				}
			}
		}
		function get_dotax_family_demand(){
			$this->layout = false;
			$dodemand = $this->DoDemand->find('first', array(
				'conditions' => array(
					'DoDemand.demand_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year')),
					'DoDemand.demand_number' => $_POST['demand_number']
				)
			));
			echo json_encode($dodemand);
			exit;	
		}
		function dotax_index(){
			$this->paginate = array(
					'conditions' => array('DotaxReceipt.receipt_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year'))),
					'order' => 'DotaxReceipt.receipt_date DESC'
			);
			$receipts = $this->paginate('DotaxReceipt');
			$this->set(compact('receipts'));
		}
		function housetax_index(){
			$this->paginate = array(
					'conditions' => array('HousetaxReceipt.receipt_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year'))),
					'order' => 'HousetaxReceipt.receipt_date DESC'
			);
			$receipts = $this->paginate('HousetaxReceipt');
			$this->set(compact('receipts'));
		}
		function professionaltax_index(){
			$this->paginate = array(
					'conditions' => array('ProfessionaltaxReceipt.receipt_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year'))),
					'order' => 'ProfessionaltaxReceipt.receipt_date DESC'
			);
			$receipts = $this->paginate('ProfessionaltaxReceipt');
			$this->set(compact('receipts'));
		}
		function watertax_index(){
			$this->paginate = array(
					'conditions' => array('WatertaxReceipt.receipt_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year'))),
					'order' => 'WatertaxReceipt.receipt_date DESC'
			);
			$receipts = $this->paginate('WatertaxReceipt');
			$this->set(compact('receipts'));
		}
		function otherstax_index(){
			$this->paginate = array(
					'conditions' => array('OthersReceipt.receipt_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year'))),
					'order' => 'OthersReceipt.receipt_date DESC'
			);
			$receipts = $this->paginate('OthersReceipt');
			$this->set(compact('receipts'));
		}
	}
?>