<h2><?php echo 'கணக்கு எண் - '.$this->data['Expense']['account_id'].', செலவு விபரங்களைத் திருத்து'; ?></h2>
<?php
	$header_op = array();
	foreach($header as $head){
		$header_op[$head['Header']['id']] =  $head['Header']['header_name'];
	}
	echo $form->create('Expense', array( 'url' => array('controller' => 'expenses', 'action' => 'edit', $this->data['Expense']['id'])));
	echo $form->input('id');
	echo $form->input('account_id', array('type' => 'hidden'));
	echo $form->input('header_id', array('label' => 'செலவின் தலைப்பு', 'type' => 'select','option' => '', 'options' => $header_op));
	echo $form->input('expense_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('voucher_number', array('label' => 'செலவுச் சீட்டு எண்'));
	echo $form->input('expense_amount', array('label' => 'செலவிடப்பட்ட தொகை'));
	echo $form->input('drawee_name', array('label' => 'காசோலைக்குரியவர் பெயர்'));
	echo $form->input('cheque_number', array('label' => 'காசோலை எண்'));
	echo $form->input('cheque_date', array('label' => 'காசோலை வழங்கிய தேதி', 'id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('description', array('label' => 'விபரம்'));
	echo $form->end('அனுப்பு');
?>