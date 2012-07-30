<h2>மற்ற ரசீதுகளின் விபரங்களைச் சேர்</h2>
<?php
	$header_info = array();
	foreach($headers as $header){
		$header_info[$header['Header']['id']] =  $header['Header']['header_name'];
	}
	echo $form->create('OthersReceipt', array( 'url' => array('controller' => 'receipts', 'action' => 'addothersreceipt')));
	echo $form->input('receipt_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number', array('label' => 'ரசீது எண்'));
	echo $form->input('name', array('label' => 'பெயர்', 'class' => 'name'));
	echo $form->input('address', array('label' => 'முகவரி', 'class' => 'address'));
	echo $form->input('header_id', array('class' => 'header_id', 'type' => 'select', 'options'=> $header_info, 'label' => 'தலைப்பு'));
	echo $form->input('amount', array('label' => 'வசூலிக்கப்பட்ட தொகை'));
	echo $form->end('அனுப்பு');
?>