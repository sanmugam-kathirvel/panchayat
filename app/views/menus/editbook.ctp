<p>Edit Book Details</p>
<?php
	$book_names = array();
	foreach($books as $book){
		$book_names[$book['Book']['id']] =  $book['Book']['book_name'];
	}
	echo $form->create('BookDetail', array( 'url' => array('controller' => 'menus', 'action' => 'editbook')));
	echo $form->input('id');
	echo $form->input('book_id', array('type' => 'select', 'options' => $book_names, 'label' => 'Book Name'));
	echo $form->input('purchase_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('company_name');
	echo $form->input('book_number');
	echo $form->input('start_receipt_number');
	echo $form->input('end_receipt_number');
	echo $form->input('status', array('type' => 'hidden', 'value' => 'available'));
	echo $form->end('Submit');
?>