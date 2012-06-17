<?php
	class BankDetail extends AppModel{
		var $name = 'BankDetail';
		var $belongsTo = array('Account');
	}
?>