<?php
	class ScrapsController extends AppController{
		function beforeFilter(){
			parent::beforeFilter();
		}
		function index(){
			$this->paginate = array(
				'conditions' => array('Scrap.estimation_date BETWEEN ? AND ?' => array($this->Session->read('User.acc_opening_year'), $this->Session->read('User.acc_closing_year'))),
					'order' => 'Scrap.estimation_date DESC',
			);
			$scraps = $this->paginate('Scrap');
			$this->set(compact('scraps'));
		}
		function add(){
			if(!empty($this->data)){
				$this->Scrap->set($this->data);
				if($this->Scrap->validates()){
					if($this->Scrap->save($this->data)){
						$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
						$this->redirect(array('action'=>'index'));
					}else{
						$this->Session->setFlash(__($GLOBALS['flash_messages']['add_failed'], true));
						$this->redirect(array('action'=>'index'));
					}
				}
			}
		}
		function edit($id){
			if(!empty($id)){
				if(!empty($this->data)){
					$this->Scrap->set($this->data);
					if($this->Scrap->validates()){
						if($this->Scrap->save($this->data)){
							$this->Session->setFlash(__($GLOBALS['flash_messages']['edited'], true));
							$this->redirect(array('action'=>'index'));
						}else{
							$this->Session->setFlash(__($GLOBALS['flash_messages']['add_failed'], true));
							$this->redirect(array('action'=>'index'));
						}
					}
				}
				if(empty($this->data)){
					$this->Scrap->id=$id;
					$this->data = $this->Scrap->read();
				}
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function delete($id){
			if(!empty($id)){
				$this->Scrap->delete($id);
				$this->Session->setFlash(__($GLOBALS['flash_messages']['deleted'], true));
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
			}
			$this->redirect(array('action'=>'index'));
		}
		function tender($id){
			if(!empty($id)){
				if(!empty($this->data)){
					$this->Scrap->set($this->data);
					if($this->Scrap->validates()){
						if($this->Scrap->save($this->data)){
							$this->Session->setFlash(__($GLOBALS['flash_messages']['added'], true));
							$this->redirect(array('action' => 'index'));
						}else{
							$this->Session->setFlash(__($GLOBALS['flash_messages']['add_failed'], true));
							$this->redirect(array('action' => 'index'));
						}
					}
				}
				if(empty($this->data)){
					$this->data['Scrap']['id'] = $id;
				}
			}else {
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function view($id){
			if(!empty($id)){
				$this->Scrap->id=$id;
				$this->data = $this->Scrap->read();
			}else{
				$this->Session->setFlash(__($GLOBALS['flash_messages']['invalid_operation'], true));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
?>