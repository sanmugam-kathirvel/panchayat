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
						$this->Session->setFlash(__('Record added successfully', true));
						$this->redirect(array('action'=>'index'));
					}
				}
			}
		}
		function edit($id){
			if(!empty($this->data)){
				$this->Scrap->set($this->data);
				if($this->Scrap->validates()){
					if($this->Scrap->save($this->data)){
						$this->Session->setFlash(__('Record updated successfully', true));
						$this->redirect(array('action'=>'index'));
					}
				}
			}
			if(empty($this->data) && !empty($id)){
				$this->Scrap->id=$id;
				$this->data = $this->Scrap->read();
			}
		}
		function delete($id){
			if(!empty($id)){
				$this->Scrap->delete($id);
				$this->Session->setFlash(__('Record deleted successfully', true));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
			}
			$this->redirect(array('action'=>'index'));
		}
		function tender(){
			if(!empty($this->data)){
				$this->Scrap->set($this->data);
				if($this->Scrap->validates()){
					if(!empty($this->data['Scrap']['id'])){
						if($this->Scrap->save($this->data)){
							$this->Session->setFlash(__('Record added successfully', true));
							$this->redirect(array('action' => 'index'));
						}
					}else{
						$this->Session->setFlash(__('Invalid Operation', true));
						$this->redirect(array('action' => 'index'));
					}
				}
			}
			// if(empty($this->data)){
				// $this->Scrap->id=$this->params['named']['id'];
				// $this->data = $this->Scrap->read();				
			// }
		}
		function view($id){
			if(!empty($id)){
				$this->Scrap->id=$id;
				$this->data = $this->Scrap->read();
			}else{
				$this->Session->setFlash(__('Invalid Operation', true));
				$this->redirect(array('action' => 'index'));
			}
		}
	}
?>