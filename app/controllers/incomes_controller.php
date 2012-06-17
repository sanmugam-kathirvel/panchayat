<?php
	class IncomesController extends AppController{
		var $uses = array('Account','Header', 'Income');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addincome(){
			$account = $this->Account->find('all');
			$this->set(compact('account'));
			if(!empty($this->data)){
				$this->Income->set($this->data);
				if($this->Income->validates()){
					$this->Income->save();
					//$this->Session->setFlash(__('Income saved successfully', true));
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
