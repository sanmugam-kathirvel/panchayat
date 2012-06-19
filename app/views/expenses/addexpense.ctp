<p><h3><?php __('Add Account-'.$acc_id.' Expense'); ?></h3></p>
<?php
	$header_op = array();
	foreach($header as $head){
		$header_op[$head['Header']['id']] =  $head['Header']['header_name'];
	}
	echo $form->create('Expense', array( 'url' => array('controller' => 'expenses', 'action' => 'addexpense')));
	echo $form->input('account_id', array('type' => 'hidden', 'value' => $acc_id));
	echo $form->input('header_id', array('label' => 'Header', 'type' => 'select','option' => '', 'options' => $header_op));
	echo $form->input('expense_date', array('label' => 'Date', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('voucher_number');
	echo $form->input('expense_amount', array('label' => 'Amount'));
	echo $form->input('drawee_name');
	echo $form->input('cheque_number');
	echo $form->input('cheque_date', array('id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('description');
	echo $form->end('Submit');
?>