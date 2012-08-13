<?php
	class BookDetail extends AppModel{
		var $name = 'BookDetail';
		var $belongsTo = array('Book');
		var $actsAs = array('Containable');
		var $validate = array(
			'purchase_date' => array(
				'rule' => 'date',
				'allowEmpty' => false,
				'message' => 'Enter valied date'
			),
			'company_name' => array(
				'rule' => 'notEmpty',
				'allowEmpty' => false,
				'message' => 'Enter valied Company name'
			),
			'book_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied book number'
			),
			'start_receipt_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied starting receipt number'
			),
			'end_receipt_number' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Enter valied ending receipt number'
			),
			'book_id' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please select book name'
			),
			'book_detail_id' => array(
				'rule' => 'numeric',
				'allowEmpty' => false,
				'message' => 'Please select book number'
			),
		);
	}
?>