<?php
	class Workdetail extends AppModel{
		var $name = 'Workdetail';
		var $hasMany = array('AttendanceRegister');
	}
?>