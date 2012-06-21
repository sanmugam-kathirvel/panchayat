<?php
	class Hamlet extends AppModel{
		var $name = 'Hamlet';
		var $hasMany = array('HtDemand', 'DoDemand', 'WtDemand', 'PtDemand', 'HousetaxReceipt');
	}
?>