<?php
	class IncomesController extends AppController{
		//var $uses = array('Income');
		var $uses = array('Account');
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
					$this->Session->setFlash(__('Income saved successfully', true));
				}
				else{
					$this->Session->setFlash(__('Income could not be saved', true));
				}
			}
			else{
				//$this->data = $gallery;
			}
		}
	}
?>
