<?php
	class ContractBillEstimation extends AppModel{
		var $name = 'ContractBillEstimation';
		var $belongsTo = array('Account');
		var $validate = array(
				'bill_date' => array(
					'rule' => 'notEmpty',
					'message' => 'This Field Not Empty'
				),
				'cheque_date' => array(
					'rule' => 'notEmpty',
					'message' => 'This Field Not Empty'
				),
				'cheque_number' => array(
					'rule' => 'notEmpty',
					'message' => 'This Field Not Empty'
				),
				'voucher_number' => array(
					'rule' => 'notEmpty',
					'message' => 'This Field Not Empty'
				),
				'contractor_name' => array(
					'rule' => 'notEmpty',
					'message' => 'This Field Not Empty'
				),
				'address' => array(
					'rule' => 'notEmpty',
					'message' => 'This Field Not Empty'
				),
				'estimation_amt' => array(
					'rule' => 'numeric',
					'message' => 'This Field Not Empty'
				),
				'workdone_amt' => array(
					'rule' => 'numeric',
					'message' => 'This Field Not Empty'
				),
				'cement' => array(
					'rule' => 'numeric',
					'message' => 'This Field Not Empty'
				),
				'steel' => array(
					'rule' => 'numeric',
					'message' => 'This Field Not Empty'
				),
				'door' => array(
					'rule' => 'numeric',
					'message' => 'This Field Not Empty'
				),
				'steel' => array(
					'rule' => 'numeric',
					'message' => 'This Field Not Empty'
				),
				'windows' => array(
					'rule' => 'numeric',
					'message' => 'This Field Not Empty'
				),
				'toilet_basin' => array(
					'rule' => 'numeric',
					'message' => 'This Field Not Empty'
				),
			);
	}
?>