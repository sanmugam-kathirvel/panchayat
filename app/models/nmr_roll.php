<?php
	class NmrRoll extends AppModel{
		var $name = 'NmrRoll';
		#var $hasMany = array('Jobcard');
		var $validate = array(
				'starting_roll_no' => array(
				  'rule' => 'numeric',
					'allowEmpty' => false,
					'message' => 'Enter valid input'
				),
				'ending_roll_no' => array(
				  'rule' => 'numeric',
					'allowEmpty' => false,
					'message' => 'Enter valid input'
				),
				'role_date' => array(
				  'rule' => 'date',
					'allowEmpty' => false,
					'message' => 'Enter valid input'
				)
			);
			
			function beforeSave(){
				var_dump($this->data);
				if(!isset($this->data['NmrRoll']['rollentry']) || isset($this->data[0]['NmrRoll']['rollentry'])){
					$this->data['NmrRoll']['currently_available_roll_no'] = $this->data['NmrRoll']['starting_roll_no'];
					$this->data['NmrRoll']['roll_entry_status'] = 'available';
				}else{
					return true;
				}
				return true;
			}
	}
?>