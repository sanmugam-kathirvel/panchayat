<?php
	class Header extends AppModel{
		var $name = 'Header';
		var $belongsTo = array('Account' => array('className'=> 'Account','foreignKey'=> 'account_id'));
	}
?>