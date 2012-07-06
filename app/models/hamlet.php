<?php
	class Hamlet extends AppModel{
		var $name = 'Hamlet';
		var $hasMany = array('HtDemand', 'WtDemand', 'PtDemand', 'HousetaxReceipt');
	}
?>