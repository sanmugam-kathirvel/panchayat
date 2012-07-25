<?php
	class Scrap extends AppModel{
		var $name = 'Scrap';
		//var $belongsTo = array('AttendanceRegister');
		var $validate = array(
			'scrap_detail' => array(
				'rule' => 'notEmpty'
			),
			'quantity' => array(
				'rule' => 'numeric'
			),
			'estimation_date' => array(
				'rule' => 'date'
			),
			'estimation_amount' => array(
				'rule' => 'numeric'
			),
			'tender_date' => array(
				'rule' => 'date'
			),
			'tender_amount' => array(
				'rule' => 'numeric'
			),
			'tender_confirmation_date' => array(
				'rule' => 'date'
			),
			'tender_confirmation_amount' => array(
				'rule' => 'numeric'
			),
			'tender_taken_by' => array(
				'rule' => 'notEmpty'
			),
		);
	}
?>