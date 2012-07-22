<?php
	class DemandsController extends AppController{
		var $uses = array('Hamlet', 'HtDemand', 'WtDemand', 'PtDemand', 'DoDemand');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addhtdemand(){
			$hamlet = $this->Hamlet->find('list', array(
				'fields' => 'Hamlet.hamlet_code'
			));
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->HtDemand->set($this->data);
				if($this->HtDemand->validates()){
					$this->HtDemand->save($this->data);
					$this->Session->setFlash(__('Demand added successfully', true));
					$this->redirect(array('action'=>'htindex'));
				}
			}
		}
		function addwtdemand(){
			$hamlet = $this->Hamlet->find('list', array(
				'fields' => 'Hamlet.hamlet_code'
			));
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->WtDemand->set($this->data);
				if($this->WtDemand->validates()){
					$this->WtDemand->save($this->data);
					$this->Session->setFlash(__('Demand added successfully', true));
					$this->redirect(array('action'=>'wtindex'));
				}
			}
		}
		function addptdemand(){
			$hamlet = $this->Hamlet->find('list', array(
				'fields' => 'Hamlet.hamlet_code'
			));
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->PtDemand->set($this->data);
				if($this->PtDemand->validates()){
					$this->PtDemand->save($this->data);
					$this->Session->setFlash(__('Demand added successfully', true));
					$this->redirect(array('action'=>'ptindex'));
				}
			}
		}
		function adddodemand(){
			if(!empty($this->data)){
				$this->DoDemand->set($this->data);
				if($this->DoDemand->validates()){
					$this->DoDemand->save($this->data);
					$this->Session->setFlash(__('Demand added successfully', true));
					$this->redirect(array('action'=>'doindex'));
				}
			}
		}
		function htindex(){
			$this->paginate = array(
				'conditions' => array('HtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
					'order' => 'HtDemand.demand_date DESC',
					'contain' => 'Hamlet'
			);
			$demands = $this->paginate('HtDemand');
			$this->set(compact('demands'));
		}
		function htedit($id){
			if(!empty($id)){
				$this->HtDemand->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->HtDemand->read();
					$hamlet = $this->Hamlet->find('all');
					$this->set(compact('hamlet'));
				}else{
	        if($this->HtDemand->save($this->data)){
	          $this->Session->setFlash(__('Demand saved', true));    
	          $this->redirect(array('action'=>'htindex'));       
	        }        
	      }
	    }else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'htindex'));
			}
		}
		function htdelete($id){
			if(!empty($id)){
				$this->HtDemand->delete($id);
				$this->Session->setFlash(__('Record deleted successfully', true));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
			}
			$this->redirect(array('action'=>'htindex'));
		}
		function wtindex(){
			$this->paginate = array(
				'conditions' => array('WtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
					'order' => 'WtDemand.demand_date DESC',
					'contain' => 'Hamlet'
			);
			$demands = $this->paginate('WtDemand');
			$this->set(compact('demands'));
		}
		function wtedit($id){
			if(!empty($id)){
				$this->WtDemand->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->WtDemand->read();
					$hamlet = $this->Hamlet->find('all');
					$this->set(compact('hamlet'));
				}else{
	        if($this->WtDemand->save($this->data)){
	          $this->Session->setFlash(__('Demand saved', true));    
	          $this->redirect(array('action'=>'wtindex'));       
	        }        
	      }
	    }else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'wtindex'));
			}
		}
		function wtdelete($id){
			if(!empty($id)){
				$this->WtDemand->delete($id);
				$this->Session->setFlash(__('Record deleted successfully', true));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
			}
			$this->redirect(array('action'=>'wtindex'));
		}
		function ptindex(){
			$this->paginate = array(
				'conditions' => array('PtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
					'order' => 'PtDemand.demand_date DESC',
					'contain' => 'Hamlet'
			);
			$demands = $this->paginate('PtDemand');
			$this->set(compact('demands'));
		}
		function ptedit($id){
			if(!empty($id)){
				$this->PtDemand->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->PtDemand->read();
					$hamlet = $this->Hamlet->find('all');
					$this->set(compact('hamlet'));
				}else{
	        if($this->PtDemand->save($this->data)){
	          $this->Session->setFlash(__('Demand saved', true));    
	          $this->redirect(array('action'=>'ptindex'));       
	        }        
	      }
	    }else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'ptindex'));
			}
		}
		function ptdelete($id){
			if(!empty($id)){
				$this->PtDemand->delete($id);
				$this->Session->setFlash(__('Record deleted successfully', true));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
			}
			$this->redirect(array('action'=>'ptindex'));
		}
		function doindex(){
			$this->paginate = array(
				'conditions' => array('DoDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year'])),
					'order' => 'DoDemand.demand_date DESC',
					'contain' => 'Hamlet'
			);
			$demands = $this->paginate('DoDemand');
			$this->set(compact('demands'));
		}
		function doedit($id){
			if(!empty($id)){
				$this->DoDemand->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->DoDemand->read();
					$hamlet = $this->Hamlet->find('all');
					$this->set(compact('hamlet'));
				}else{
	        if($this->DoDemand->save($this->data)){
	          $this->Session->setFlash(__('Demand saved', true));    
	          $this->redirect(array('action'=>'doindex'));       
	        }        
	      }
	    }else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'doindex'));
			}
		}
		function dodelete($id){
			if(!empty($id)){
				$this->DoDemand->delete($id);
				$this->Session->setFlash(__('Record deleted successfully', true));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
			}
			$this->redirect(array('action'=>'doindex'));
		}
		function index(){
			
		}
	}
?>