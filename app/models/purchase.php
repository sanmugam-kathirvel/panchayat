<?php
	class Purchase extends AppModel{
		var $name = 'Purchase';
		var $hasMany = array('PurchaseItem' => array('className' => 'PurchaseItem', 'foreignKey' => 'purchase_id','dependent'=> true));
		var $validate = array(
				'company_name' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				)
			);
	}
?>