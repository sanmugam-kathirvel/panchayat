<?php
	class NmrRollentry extends AppModel{
		var $name = 'NmrRollentry';
		//var $belongs_to = array('NmrRoll');
		var $validate = array(
				'job_card_no' => array(
				  'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				)
			);
			
			function beforeSave(){
				//$this->NmrRoll = ClassRegistry::init('NmrRoll');
				/*$ongoing = $this->NmrRoll->findByRollEntryStatus('ongoing');
				if($ongoing['NmrRoll']['ending_roll_no'] == $ongoing['NmrRoll']['currently_available_roll_no']){
					$ongoing['NmrRoll']['rollentry'] = 'rollentry';
					$ongoing['NmrRoll']['roll_entry_status'] = 'closed';
					$this->NmrRoll->save($ongoing);
					$next_ongoing['NmrRoll']['rollentry'] = 'rollentry';
					$next_ongoing = $this->NmrRoll->find('first', array('conditions' => array('NmrRoll.roll_entry_status' => 'available')));
					$next_ongoing['NmrRoll']['roll_entry_status'] = 'ongoing';
					$this->NmrRoll->save($next_ongoing);
				}else{
					$ongoing['NmrRoll']['rollentry'] = 'rollentry';
					$ongoing['NmrRoll']['currently_available_roll_no'] = $ongoing['NmrRoll']['currently_available_roll_no'] + 1;
					$this->NmrRoll->save($ongoing); 
				} */
				//die();
				return true;	
				//DOTO :: update available number check 
			}
	}
?>