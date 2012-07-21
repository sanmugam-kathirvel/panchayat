<?php
	class Attendance extends AppModel{
		var $name = 'Attendance';
		var $belongsTo = array('AttendanceRegister');
		// var $validate = array(
			// 'family_number' => array(
				// 'rule' => 'notEmpty'
			// ),
		// );
	}
?>