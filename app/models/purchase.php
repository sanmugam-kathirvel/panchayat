<?php
	class Purchase extends AppModel{
		var $name = 'Purchase';
		var $hasMany = array('PurchaseItem');
		var $validate = array(
				'company_name' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				)
			);
	}
?>