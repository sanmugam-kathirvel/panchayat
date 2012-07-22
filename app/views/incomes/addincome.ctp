<p><h3><?php __('Account-'.$acc_id.' Income'); ?></h3></p>
<!-- <p>இந்த தலைப்புகளின் விளக்க்கள்</p> -->
<?php
	$header_op = array();
	foreach($header as $head){
		$header_op[$head['Header']['id']] =  $head['Header']['header_name'];
	}
	echo $form->create('Income', array( 'url' => array('controller' => 'incomes', 'action' => 'addincome')));
	echo $form->input('account_id', array('type' => 'hidden', 'value' => $acc_id));
	echo $form->input('header_id', array('label' => 'Header', 'options' => $header_op, 'type' => 'select','option' => ''));
	echo $form->input('income_date', array('label' => 'Date', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('income_amount', array('label' => 'Amount'));
	echo $form->input('description');
	echo $form->end('Submit');
?>