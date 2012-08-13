<?php
	class Attendance extends AppModel{
		var $name = 'Attendance';
		var $belongsTo = array('AttendanceRegister');
		var $validate = array(
			'family_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'job_card_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'no_of_days_worked' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);
	}
?>