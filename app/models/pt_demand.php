<?php
	class PtDemand extends AppModel{
		var $name = 'PtDemand';
		var $belongsTo = array('Hamlet');
		var $validate = array(
			'demand_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied demand number'
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
			'company_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied Company Name'
			),
			'half_yearly_income' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied Amount'
			),
			'hamlet_id' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please select Hamlet code'
			),
			'part1_current' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => ''
			),
			'part2_current' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => ''
			),
			'part1_pending' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => ''
			),
			'part2_pending' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => ''
			),
		);
	}
?>