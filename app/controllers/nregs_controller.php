<?php
	class NregsController extends AppController{
		var $uses = array('NregsRegistration', 'Hamlet', 'Jobcard', 'NregsStock', 'NmrRoll', 'NmrRollentry','Attendance','Workdetail','AttendanceRegister');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function newregistration(){
			$hamlet_op = $this->Hamlet->find('list', array(
				'fields' => array('Hamlet.hamlet_code')
			));
			$this->set(compact('hamlet_op'));
			if(!empty($this->data)){
				$this->NregsRegistration->set($this->data);
				if($this->NregsRegistration->validates()){
					if($this->NregsRegistration->save($this->data)){
						$stock = $this->NregsStock->findById('1');
						$stock['NregsStock']['item_quantity'] = (int)($stock['NregsStock']['item_quantity']) - 1;
						$this->NregsStock->save($stock);
						$this->Session->setFlash(__('Registration completed successfully', true));    
		        $this->redirect(array('action'=>'registrationindex'));
					}
				}else{
					$this->Session->setFlash(__('Registration cound not be saved, Please check form for error', true)); 
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
		function view($id){
			if(!empty($id)){
				$this->NregsRegistration->id=$id;
	      if(empty($this->data)) {
	        $registration_detail = $this->NregsRegistration->find('first', array(
	        	'conditions' => array('NregsRegistration.id' => $id)
					));
					$hamlets = $this->Hamlet->find('all');
					$this->set(compact('hamlets', 'registration_detail'));
	      }//else{
	        // if($this->NregsRegistration->save($this->data)){
	          // $this->Session->setFlash(__('Registration updated successfully', true));    
	          // $this->redirect(array('action'=>'registrationindex'));
	        // }  
				// }
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
	    }else{
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
		function nmrrolls(){
			if(!empty($this->data)){
				if($this->NmrRoll->save($this->data)){
					$this->Session->setFlash(__('Nmr Rolls added', true));
					$this->redirect(array('action'=>'nmr_roll_index'));
				}
			}
		}
		function edit_nmrrolls($id){
			if(!empty($id)){
				$this->NmrRoll->id=$id;
	      if(empty($this->data)) {
	        $this->data = $this->NmrRoll->read();
	      }else{
	      	if($this->NmrRoll->save($this->data)){
	          $this->Session->setFlash(__('NMR Roll(s) updated successfully', true));    
	          $this->redirect(array('action'=>'nmr_roll_index'));       
	        }
				}
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'nmr_roll_index'));
			}
		}
		function nmr_roll_index(){
			$this->paginate = array(
				'order' => 'NmrRoll.role_date',
			);
			$nregs_rolls = $this->paginate('NmrRoll');
			$this->set(compact('nregs_rolls'));
		}
		// function rollentry(){
			// $hamlets = $this->Hamlet->find('all');
			// $nmr_roll_no = $this->NmrRoll->findByRollEntryStatus('ongoing');
			// $this->set(compact('hamlets','nmr_roll_no'));
			// if(!empty($this->data)){
				// if($this->NmrRollentry->save($this->data)){
					// $ongoing = $this->NmrRoll->findByRollEntryStatus('ongoing');
					// if($ongoing['NmrRoll']['ending_roll_no'] == $ongoing['NmrRoll']['currently_available_roll_no']){
						// $ongoing['NmrRoll']['rollentry'] = 'rollentry';
						// $ongoing['NmrRoll']['roll_entry_status'] = 'closed';
						// $this->NmrRoll->save($ongoing);
						// $next_ongoing = $this->NmrRoll->find('first', array('conditions' => array('NmrRoll.roll_entry_status' => 'available')));
						// $next_ongoing['NmrRoll']['rollentry'] = 'rollentry';
						// $next_ongoing['NmrRoll']['roll_entry_status'] = 'ongoing';
						// $this->NmrRoll->save($next_ongoing);
					// }else{
						// $ongoing['NmrRoll']['rollentry'] = 'rollentry';
						// $ongoing['NmrRoll']['currently_available_roll_no'] = $ongoing['NmrRoll']['currently_available_roll_no'] + 1;
						// $this->NmrRoll->save($ongoing);
					// }
				// }
			// }
		// }
		function add_workdetails(){
			if(!empty($this->data)){
				if($this->Workdetail->save($this->data)){
					$this->Session->setFlash(__('Work Details added', true));
					$this->redirect(array('action'=>'index_workdetails'));
				}
			}
		}
		function edit_workdetails($id){
			if(!empty($id)){
				if(empty($this->data)){
					$this->Workdetail->id = $id;
					$this->data = $this->Workdetail->read();
				}else{
					if($this->Workdetail->save($this->data)){
						$this->Session->setFlash(__('Work Details updated successfully', true));
						$this->redirect(array('action'=>'index_workdetails'));
					}
				}
			}else{
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index_workdetails'));
			}
		}
		function delete_workdetails($id){
			if(!empty($id)){
				$this->Workdetail->delete($id);
				$this->Session->setFlash(__('Work detail deleted successfully', true));
				$this->redirect(array('action'=>'index_workdetails'));
			}else {
				$this->Session->setFlash(__('Invalid operation', true));
				$this->redirect(array('action'=>'index_workdetails'));
			}
		}
		function index_workdetails() {
			$this->paginate = array(
				'conditions' => array('Workdetail.year BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']),),
				'order' => 'Workdetail.year DESC',
			);
			$workdetails = $this->paginate('Workdetail');
			$this->set(compact('workdetails'));		
		}
		function attendance(){
			$work_details = $this->Workdetail->find('list', array(
				'fields' => array('Workdetail.name_of_work')
			));
			$this->set(compact('work_details'));
		  if(!empty($this->data)){
				if($this->AttendanceRegister->saveAll($this->data)){
					$this->Session->setFlash(__('Attendance Register Saved', true));
					$this->redirect(array('action'=>'attendance_index'));
				}
			}
		}
    function attendance_index(){
      $this->paginate = array(
        'conditions' => array('AttendanceRegister.to_date BETWEEN ? AND ?' => array($GLOBALS['accounting_year']['acc_opening_year'], $GLOBALS['accounting_year']['acc_closing_year']),),
        'order' => 'AttendanceRegister.id DESC',
        //'contain' => 'Workdetail',
      );
      
      $attendances = $this->paginate('AttendanceRegister');
      $this->set(compact('attendances'));   
    }
    function get_jobcard(){
      $this->layout = false;
      $jobcard = $this->NregsRegistration->find('all', array(
        'fields' => array('NregsRegistration.job_card_number'),
        'conditions' => array('NregsRegistration.family_number' => $_POST['family_id']),
      ));
       echo json_encode($jobcard);
       exit;  
    }
		function autofill_attendance(){
			$this->layout = false;
			$details = $this->NregsRegistration->find('first', array(
				'conditions' => array('NregsRegistration.job_card_number' => $_POST['jobcard_no'])
			));
			 echo json_encode($details);
			 exit;	
		}
		function hundred_days_check(){
			$this->layout = false;
			$no_of_days = $this->Attendance->find('first', array(
				'conditions' => array('Attendance.family_number' => $_POST['family_id']),
				'fields' => array(
					'SUM(Attendance.no_of_days_worked) AS no_of_days_worked'
				),
			));
			echo json_encode($no_of_days);
			exit;
		}
    function payment(){
      if(empty($this->data)){
        $attendance = $this->AttendanceRegister->find('all', array(
          'conditions' => array('AttendanceRegister.id' => $this->params['named']['attendance_id']),
          'contain' => array('Attendance' => array(
              'fields' => array(
                'SUM(Attendance.no_of_days_worked) AS no_of_days_worked'
              ),
            ))
        ));
        $this->set(compact('attendance'));
      }else{
				$attendance = $this->AttendanceRegister->find('first', array(
					'conditions' => array('AttendanceRegister.id' => $this->data['Payment']['attendance_register_id']),
					'contain' => false,
				));
				$attendance['AttendanceRegister']['payment_status'] = $this->data['Payment']['payment_status'];
				$attendance['AttendanceRegister']['amount_per_head'] = $this->data['Payment']['amount_per_head'];
				$attendance['AttendanceRegister']['amount_paid'] = $this->data['Payment']['amount_paid'];
				$this->AttendanceRegister->save($attendance);
				$this->Session->setFlash(__('Amount paid', true));
				$this->redirect(array('action'=>'attendance_index'));
        
      }
    }
	}
?>