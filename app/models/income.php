<?php
	class Income extends AppModel{
		var $name = 'Income';
		var $validate = array(
				'date' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
					
				),
				'header' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
					
				),
				'amount' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
					
				)
			);
	}
?>