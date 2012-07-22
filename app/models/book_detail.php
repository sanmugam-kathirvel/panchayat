<?php
	class BookDetail extends AppModel{
		var $name = 'BookDetail';
		var $belongsTo = array('Book');
		var $validate = array(
			'purchase_date' => array(
				'rule' => 'date',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'company_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'book_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'start_receipt_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
			'end_receipt_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied input'
			),
		);
	}
?>