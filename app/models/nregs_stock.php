<?php
	class NregsStock extends AppModel{
		var $name = 'NregsStock';
		var $hasMany = array('Jobcard');
	}
?>