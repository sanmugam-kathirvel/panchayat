<p>Add Others Receipt</p>
<?php
	$header_info = array();
	foreach($headers as $header){
		$header_info[$header['Header']['id']] =  $header['Header']['header_name'];
	}
	echo $form->create('OthersReceipt', array( 'url' => array('controller' => 'receipts', 'action' => 'addothersreceipt')));
	echo $form->input('receipt_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number');
	echo $form->input('name', array('class' => 'name'));
	echo $form->input('address', array('class' => 'address'));
	echo $form->input('header_id', array('class' => 'header_id', 'type' => 'select', 'options'=> $header_info, 'label' => 'Purpose'));
	echo $form->input('amount');
	echo $form->end('Submit');
?>