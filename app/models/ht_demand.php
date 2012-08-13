<?php
	class HtDemand extends AppModel{
		var $name = 'HtDemand';
		var $belongsTo = array('Hamlet');
		var $validate = array(
			'demand_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied Demand number'
			),
			'demand_date' => array(
				'rule' => 'date',
				'allowEmpty' => false,
				'message' => 'Enter valied Date'
			),
			'name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied Name'
			),
			'door_number' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied Door number'
			),
			'father_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied Name'
			),
			'hamlet_id' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please select hamlet code'
			),
			'ht_current' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => ''
			),
			'lc_current' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => ''
			),
			'ht_pending' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => ''
			),
			'lc_pending' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => ''
			),
		);
	}
?>