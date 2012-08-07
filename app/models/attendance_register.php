<?php
	class AttendanceRegister extends AppModel{
		var $name = 'AttendanceRegister';
		var $hasMany = array('Attendance');
		var $belongsTo = array('Workdetail');
		var $actsAs = array('Containable');
		var $validate = array(
			'from_date' => array(
				'rule' => 'notEmpty'
			),
			'to_date' => array(
				'rule' => 'notEmpty'
			),
		);
	}
?>