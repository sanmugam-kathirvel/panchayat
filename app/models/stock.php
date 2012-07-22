<?php
	class Stock extends AppModel{
		var $name = 'Stock';
		var $hasMany = array('StockIssue','PurchaseItem');
		var $validate = array(
			'item_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'item_quantity' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);
	}
?>