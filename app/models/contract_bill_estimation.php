<?php
	class ContractBillEstimation extends AppModel{
		var $name = 'ContractBillEstimation';
		var $validate = array(
				'estimation_amt' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
					
				),
			);
	}
?>