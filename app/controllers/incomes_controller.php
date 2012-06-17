<?php
	class IncomesController extends AppController{
		var $uses = array('Account','Header', 'Income','BankDetail');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addincome(){
			$account = $this->Account->find('all');
			$this->set(compact('account'));
			if(!empty($this->data)){
				$this->Income->set($this->data);#data[Income][account_id]
				if($this->Income->validates()){
					$acc_opening_date = strtotime($GLOBALS['accounting_year']['acc_opening_year']);
					$acc_closing_date = strtotime($GLOBALS['accounting_year']['acc_closing_year']);
					$income_acc_date = strtotime($this->data['Income']['income_date']);
					if($acc_closing_date >= $income_acc_date && $acc_opening_date <= $income_acc_date){
						$acc_bank_details = $this->BankDetail->find('first', array(
							'conditions' => array(
								'BankDetail.acc_openning_year' => $GLOBALS['accounting_year']['acc_opening_year'],
								'BankDetail.acc_closing_year' => $GLOBALS['accounting_year']['acc_closing_year'], 
								'BankDetail.account_id' => $this->data['Income']['account_id']
							)
						));
						//var_dump($acc_bank_details);die;
						$acc_bank_details['BankDetail']['closing_bank_balance'] = $acc_bank_details['BankDetail']['closing_bank_balance'] + $this->data['Income']['income_amount'];
						$this->BankDetail->save($acc_bank_details['BankDetail']);
						$this->Income->save();
						//$this->Session->setFlash(__('Income saved successfully', true));
					}else{
						$this->Session->setFlash(__('Given date is invalid, please give dates between '.$GLOBALS['accounting_year']['acc_opening_year'].' and '.$GLOBALS['accounting_year']['acc_closing_year'], true));
					}

				}
				/*else{
					$this->Session->setFlash(__('Income could not be saved', true));
				}*/
			}
			else{
				//$this->data = $gallery;
			}
			$this->data['Income'] = '';
		}
		function avail_header(){
			$this->layout = false;
			$headers = $this->Header->find('all', array(
				'conditions' => array('Header.header_type' => 'income', 'Header.account_id' => $_POST['account'])
			));
			$this->set(compact('headers'));
			echo json_encode($headers);
			exit;	
		}
	}
?>
