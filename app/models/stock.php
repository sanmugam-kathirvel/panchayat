<?php
	class Stock extends AppModel{
		var $name = 'Stock';
		var $hasMany = array('StockIssue','PurchaseItem');
	}
?>