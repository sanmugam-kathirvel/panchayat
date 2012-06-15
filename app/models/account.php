<?php
	class Account extends AppModel{
		var $name = 'Account';
		var $hasMany = array('BankDetail','Header');
	}
?>