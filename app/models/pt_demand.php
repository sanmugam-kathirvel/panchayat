<?php
	class PtDemand extends AppModel{
		var $name = 'PtDemand';
		var $belongsTo = array('Hamlet');
		var $validate = array(
			'demand_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'demand_date' => array(
				'rule' => 'date',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'door_number' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'father_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'company_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'half_yearly_income' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'part1_current' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'part2_current' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);
	}
?>