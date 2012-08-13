<?php
	class PurchaseItem extends AppModel{
		var $name = 'PurchaseItem';
		var $belongsTo = array('Purchase', 'Stock');
		var $validate = array(
				'stock_id' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'Please select stock name'
				),
				'item_quantity' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'Please Enter valid quantity'
				),
				'item_rate' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'Please Enter valid rate'
				)
			);
	}
?>