<?php
	class StockIssue extends AppModel{
		var $name = 'StockIssue';
		var $belongsTo = array('Stock');
		var $validate = array(
			'issue_date' => array(
				'rule' => 'date',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'item_quantity' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'hand_over_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);
	}
?>