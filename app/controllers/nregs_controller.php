<?php
	class NregsController extends AppController{
		var $uses = array('NregsRegistration', 'Hamlet', 'Jobcard', 'NregsStock');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function newregistration(){
			if(empty($this->data)){
				$hamlets = $this->Hamlet->find('all');
				$this->set(compact('hamlets'));
			}else {
				if($this->NregsRegistration->save($this->data)){
					$stock = $this->NregsStock->findById('1');
					$stock['NregsStock']['item_quantity'] = (int)($stock['NregsStock']['item_quantity']) - 1;
					$this->NregsStock->save($stock);
					$this->Session->setFlash(__('Registration completed successfully', true));    
	        $this->redirect(array('action'=>'registrationindex'));
				}
			}
		}
		function addjobcard(){
			if(!empty($this->data)){
				if($this->Jobcard->save($this->data)){
					$stock = $this->NregsStock->findById($this->data['Jobcard']['nregs_stock_id']);
					$stock['NregsStock']['item_quantity'] = (int)($stock['NregsStock']['item_quantity']) + (int)($this->data['Jobcard']['jobcard_quantity']);
					$this->NregsStock->save($stock);
					$this->Session->setFlash(__('Job card added successfully', true));    
	        $this->redirect(array('action'=>'jobcardindex'));
				}
			}
		}
		function registrationindex(){
			$this->paginate = array(
				'conditions' => array('NregsRegistration.application_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']),),
				'order' => 'NregsRegistration.application_date DESC',
				'contain' => array('Hamlet')
			);
			$nregs_reg = $this->paginate('NregsRegistration');
			$this->set(compact('nregs_reg'));
		}
		function editregistration($id){
			if(!empty($id)){
				$this->NregsRegistration->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->NregsRegistration->read();
					$hamlets = $this->Hamlet->find('all');
					$this->set(compact('hamlets'));
	      }else{
	        if($this->NregsRegistration->save($this->data)){
	          $this->Session->setFlash(__('Registration updated successfully', true));    
	          $this->redirect(array('action'=>'registrationindex'));       
	        }  
				}      
	    }else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'registrationindex'));
			}
		}
		function deleteregistration($id){
			if(!empty($id)){
				$this->NregsRegistration->delete($id);
				$stock = $this->NregsStock->findById('1');
				$stock['NregsStock']['item_quantity'] = (int)($stock['NregsStock']['item_quantity']) + 1;
				$this->NregsStock->save($stock);
				$this->Session->setFlash(__('Registration deleted successfully', true));
				$this->redirect(array('action'=>'registrationindex'));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'registrationindex'));
			}
		}
		function jobcardindex(){
			$this->paginate = array(
				'conditions' => array('Jobcard.jobcard_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']),),
				'order' => 'Jobcard.jobcard_date DESC',
			);
			$nregs_jobcard = $this->paginate('Jobcard');
			$this->set(compact('nregs_jobcard'));
		}
		function editjobcard($id){
			if(!empty($id)){
				$this->Jobcard->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->Jobcard->read();
	      }else{
	      	$old_data = $this->Jobcard->findById($this->data['Jobcard']['id']);
					$jobcard_to_change = 0;
					$flag = 0;
					if((int)$old_data['Jobcard']['jobcard_quantity'] > (int)$this->data['Jobcard']['jobcard_quantity']){
						$jobcard_to_change = (int)$old_data['Jobcard']['jobcard_quantity'] - (int)$this->data['Jobcard']['jobcard_quantity'];
						$flag =0;						
					}elseif((int)$old_data['Jabcard']['jobcard_quantity'] < (int)$this->data['Jabcard']['jobcard_quantity']){
						$jobcard_to_change = (int)$this->data['Jobcard']['jobcard_quantity'] - (int)$old_data['Jobcard']['jobcard_quantity'];
						$flag =1;
					}
					if($jobcard_to_change > 0){
						$nrgsstock = $this->NregsStock->findById('1');
						if($flag==0){
							$nrgsstock['NregsStock']['item_quantity'] =(int)$nrgsstock['NregsStock']['item_quantity'] - $jobcard_to_change; 
						}else{
						  $nrgsstock['NregsStock']['item_quantity'] =(int)$nrgsstock['NregsStock']['item_quantity'] + $jobcard_to_change;	
						}
						$this->NregsStock->save($nrgsstock);
					}
	        if($this->Jobcard->save($this->data)){
	          $this->Session->setFlash(__('Job card(s) updated successfully', true));    
	          $this->redirect(array('action'=>'jobcardindex'));       
	        }
				}
	    }else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'jobcardindex'));
			}
		}
		function deletejobcard($id, $quantity){
			if(!empty($id) && !empty($quantity)){
				$this->Jobcard->delete($id);
				$stock = $this->NregsStock->findById('1');
				$stock['NregsStock']['item_quantity'] = (int)($stock['NregsStock']['item_quantity']) - (int)($quantity);
				$this->NregsStock->save($stock);
				$this->Session->setFlash(__('Job card(s) deleted successfully', true));
				$this->redirect(array('action'=>'jobcardindex'));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'jobcardindex'));
			}
		}
	}
?>