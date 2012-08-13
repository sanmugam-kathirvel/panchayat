<?php
	class DoDemand extends AppModel{
		var $name = 'DoDemand';
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
			'emd' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied amount'
			),
			'father_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied name'
			),
			'do_current' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => ''
			),
			'do_pending' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => ''
			),
		);
	}
?>