<p>Opening Balance</p>
<?php
	$account_op = array();
	foreach($account as $acc){
		$account_op[$acc['Account']['id']] =  $acc['Account']['account_name'];
	}
	echo $form->create('BankDetail', array( 'url' => array('controller' => 'menus', 'action' => 'addopeningbals')));
	//echo $form->select('account_name', $options);
	echo $form->input('account_id',array('type'=>'select','options'=> $account_op));
	echo $form->input('accounting_year', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('account_number');
	echo $form->input('bank_name');
	echo $form->input('branch');
	echo $form->input('opening_cash_balance', array('label' => 'Cash Balance'));
	echo $form->input('opening_bank_balance', array('label' => 'Bank Balance'));
	echo $form->end('Submit');
?>