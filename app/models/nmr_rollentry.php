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
				$this->NmrRoll = ClassRegistry::init('NmrRoll');
				// $this->NmrRoll->find('all', array(
					// 'conditions' => array('NmrRoll.roll_entry_status' => 'ongoing', 'NmrRoll.ending_roll_no'),
				// ));
				//return true;	
				//DOTO :: update available number check 
			}
	}
?>