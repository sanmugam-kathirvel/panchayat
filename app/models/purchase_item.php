<?php
	class PurchaseItem extends AppModel{
		var $name = 'PurchaseItem';
		var $belongsTo = array('Purchase');
		var $validate = array(
				'company_name' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
				)
			);
	}
?>