<?php
	class DemandsController extends AppController{
		var $uses = array('Hamlet', 'HtDemand', 'WtDemand', 'PtDemand', 'DoDemand');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function addhtdemand(){
			$hamlet = $this->Hamlet->find('all');
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->HtDemand->save($this->data);
			}
		}
		function addwtdemand(){
			$hamlet = $this->Hamlet->find('all');
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->WtDemand->save($this->data);
			}
		}
		function addptdemand(){
			$hamlet = $this->Hamlet->find('all');
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->PtDemand->save($this->data);
			}
		}
		function adddodemand(){
			$hamlet = $this->Hamlet->find('all');
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->DoDemand->save($this->data);
			}
		}
	}
?>