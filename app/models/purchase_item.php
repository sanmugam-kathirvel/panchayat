<?php
	class PurchaseItem extends AppModel{
		var $name = 'PurchaseItem';
		var $belongsTo = array('Purchase' => array('className'=> 'Purchase','foreignKey'=> 'purchase_id'));
		var $validate = array(
				'company_name' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				)
			);
	}
?>