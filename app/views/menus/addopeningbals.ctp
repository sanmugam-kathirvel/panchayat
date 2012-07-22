<p>Add Opening Balance</p>
<?php
	echo $form->create('BankDetail', array( 'url' => array('controller' => 'menus', 'action' => 'addopeningbals')));
	echo $form->input('account_id',array('type'=>'select','options'=> $account_op));
	echo $form->input('acc_openning_year', array('type' => 'hidden', 'value' => $GLOBALS['accounting_year']['acc_opening_year']));
	echo $form->input('acc_closing_year', array('type' => 'hidden', 'value' => $GLOBALS['accounting_year']['acc_closing_year']));
	echo $form->input('account_number');
	echo $form->input('bank_name');
	echo $form->input('branch');
	echo $form->input('opening_cash_balance', array('label' => 'Cash Balance'));
	echo $form->input('opening_bank_balance', array('label' => 'Bank Balance'));
	echo $form->end('Submit');
?>