<?php
	class BankDetail extends AppModel{
		var $name = 'BankDetail';
		var $hasOne = array('Account' => array('className'=> 'Account','foreignKey'=> 'account_id'));
	}
?>