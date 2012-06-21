<?php
	class ReceiptsController extends AppController{
		var $uses = array('Hamlet', 'HousetaxReceipt','HtDemand', 'WatertaxReceipt', 'WtDemand'/*, 'ProfessionaltaxReceipt', 'PtDemand', 'DotaxReceipt', 'DoDemand'*/);
		function beforeFilter(){
			parent::beforeFilter();
		}
		function index(){
			
		}
		function addhousetaxreceipt(){
			$hamlet = $this->Hamlet->find('all');
			$this->set(compact('hamlet'));
			if(!empty($this->data)){
				$this->HousetaxReceipt->save($this->data);
				$this->Session->setFlash(__('Receipt added successfully', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function get_housetax_family_demand(){
			$this->layout = false;
			$htdemand = $this->HtDemand->find('first', array(
				'conditions' => array(
					'HtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']),
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
				var_dump($this->data);
				$this->WatertaxReceipt->save($this->data);
				$this->Session->setFlash(__('Receipt added successfully', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function get_watertax_family_demand(){
			$this->layout = false;
			$wtdemand = $this->WtDemand->find('all', array(
				'conditions' => array(
					'WtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']),
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
				$this->WatertaxReceipt->save($this->data);
				$this->Session->setFlash(__('Receipt added successfully', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function get_professionaltax_family_demand(){
			$this->layout = false;
			$ptdemand = $this->PtDemand->find('all', array(
				'conditions' => array(
					'PtDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']),
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
				$this->DotaxReceipt->save($this->data);
				$this->Session->setFlash(__('Receipt added successfully', true));
				$this->redirect(array('action'=>'index'));
			}
		}
		function get_dotax_family_demand(){
			$this->layout = false;
			$dodemand = $this->DoDemand->find('all', array(
				'conditions' => array(
					'DoDemand.demand_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']),
					'DoDemand.demand_number' => $_POST['demand_number']
				)
			));
			echo json_encode($dodemand);
			exit;	
		}
	}
?>