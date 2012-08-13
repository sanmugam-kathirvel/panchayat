<?php
	class AttendanceRegister extends AppModel{
		var $name = 'AttendanceRegister';
		var $hasMany = array('Attendance');
		var $belongsTo = array('Workdetail');
		var $actsAs = array('Containable');
		var $validate = array(
			'from_date' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'to_date' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);
	}
?>