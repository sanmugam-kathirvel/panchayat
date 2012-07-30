<h2><?php echo 'கணக்கு எண் - '.$this->data['Income']['account_id'].' வரவு விபரங்களைத் திருத்து'; ?></h2>
<?php
	$account_op = array();
	$header_op = array();
	foreach($header as $head){
		$header_op[$head['Header']['id']] =  $head['Header']['header_name'];
	}
	echo $form->create('Income', array( 'url' => array('controller' => 'incomes', 'action' => 'edit')));
	echo $form->input('id');
	echo $form->input('account_id', array('type' => 'hidden'));
	echo $form->input('header_id', array('label' => 'வரவின் தலைப்பு', 'options' => $header_op, 'type' => 'select','option' => ''));
	echo $form->input('income_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('income_amount', array('label' => 'வரப்பெற்ற தொகை'));
	echo $form->input('description' ,array('label' => 'விபரம்'));
	echo $form->end('அனுப்பு');
?>