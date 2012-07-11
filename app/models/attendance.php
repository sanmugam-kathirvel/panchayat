<?php
	class Attendance extends AppModel{
		var $name = 'Attendance';
		var $belongsTo = array('AttendanceRegister');
	}
?>