<?php
	class IncomesController extends AppController{
		//var $uses = array('Income');
		var $uses = '';
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addincome(){
			if(!empty($this->data)){
				$this->Income->set($this->data);
				if($this->Income->validates()){
					//var_dump($this->data);die;
					$this->Income->save();
					$this->Session->setFlash(__('Income saved successfully', true));
					//$this->redirect(array('action'=>'index'));
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
