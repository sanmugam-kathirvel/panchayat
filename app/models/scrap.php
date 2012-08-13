<?php
	class Scrap extends AppModel{
		var $name = 'Scrap';
		//var $belongsTo = array('AttendanceRegister');
		var $validate = array(
			'scrap_detail' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Please give valid detail'
			),
			'quantity' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please give valid quantity'
			),
			'estimation_date' => array(
				'rule' => 'date',
				'allowEmpty' => false,
				'message' => 'Please select valid date'
			),
			'estimation_amount' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please give valid amount'
			),
			'tender_date' => array(
				'rule' => 'date',
				'allowEmpty' => false,
				'message' => 'Please select valid date'
			),
			'tender_amount' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please give valid amount'
			),
			'tender_confirmation_date' => array(
				'rule' => 'date',
				'allowEmpty' => false,
				'message' => 'Please select valid date'
			),
			'tender_confirmation_amount' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please give valid amount'
			),
			'tender_taken_by' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Please give valid name'
			),
		);
	}
?>