<?php
	class Jobcard extends AppModel{
		var $name = 'Jobcard';
		var $belongsTo = array('NregsStock');
		var $validate = array(
			'jobcard_date' => array(
				'rule' => 'date',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'jobcard_quantity' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);
	}
?>