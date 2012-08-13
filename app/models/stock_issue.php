<?php
	class StockIssue extends AppModel{
		var $name = 'StockIssue';
		var $belongsTo = array('Stock');
		var $validate = array(
			'stock_id' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please select stock name'
			),
			'issue_date' => array(
				'rule' => 'date',
				'allowEmpty' => false,
				'message' => 'Please select valid date'
			),
			'item_quantity' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please give valid quantity'
			),
			'hand_over_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Please give valid name'
			),
		);
	}
?>