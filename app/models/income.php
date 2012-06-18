<?php
	class Income extends AppModel{
		var $name = 'Income';
		var $actsAs = array('Containable');
		var $belongsTo = array('Header', 'Account');
		var $validate = array(
				'income_date' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
					
				),
				'header_id' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
					
				),
				'income_amount' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
					
				),
				'account_id' => array(
					'rule' => 'notEmpty',
					'allowEmpty' => false,
					'message' => 'This Field Not Empty'
					
				)
			);
	}
?>