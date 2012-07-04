<?php
	class NmrRoll extends AppModel{
		var $name = 'NmrRoll';
		#var $hasMany = array('Jobcard');
		var $validate = array(
				'starting_roll_no' => array(
				  'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
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