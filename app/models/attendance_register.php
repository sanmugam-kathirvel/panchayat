<?php
	class AttendanceRegister extends AppModel{
		var $name = 'AttendanceRegister';
		var $hasMany = array('Attendance');
		var $belongs_to = array('Workdetail');
		var $actsAs = array('Containable');
	}
?>