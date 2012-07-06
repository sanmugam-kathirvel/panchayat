<?php
	class Header extends AppModel{
		var $name = 'Header';
		var $belongsTo = array('Account');
		var $hasMany = array('OthersReceipt');
	}
?>