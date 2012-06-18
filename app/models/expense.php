<?php
	class Expense extends AppModel{
		var $name = 'Expense';
		var $belongsTo = array('Header', 'Account');
	}
?>