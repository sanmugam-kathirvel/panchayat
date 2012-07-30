<h2>ரசீது புத்தகத் தகவலை திருத்து</h2>
<?php
	$book_names = array();
	foreach($books as $book){
		$book_names[$book['Book']['id']] =  $book['Book']['book_name'];
	}
	echo $form->create('BookDetail', array( 'url' => array('controller' => 'menus', 'action' => 'editbook')));
	echo $form->input('id');
	echo $form->input('book_id', array('type' => 'select', 'options' => $book_names, 'label' => 'புத்தகத்தின் பெயர்'));
	echo $form->input('purchase_date', array('label' => 'வாங்கிய தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('company_name', array('label' => 'நிறுவனத்தின் பெயர்'));
	echo $form->input('book_number', array('label' => 'புத்தகத்தின் எண்'));
	echo $form->input('start_receipt_number', array('label' => 'ஆரம்ப ரசீது எண்'));
	echo $form->input('end_receipt_number', array('label' => 'இருதி ரசீது எண்'));
	echo $form->input('status', array('type' => 'hidden', 'value' => 'available'));
	echo $form->end('அனுப்பு');
?>