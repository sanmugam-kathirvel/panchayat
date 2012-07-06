<?php
	class CashToBank extends AppModel{
		var $name = 'CashToBank';
		var $belongsTo = array('BankDetail');
	}
?>