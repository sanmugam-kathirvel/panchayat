<p>தொடக்க இருப்புத் தொகையை திருத்து</p>
<?php
	$account_op = array();
	foreach($account as $acc){
		$account_op[$acc['Account']['id']] =  $acc['Account']['account_name'];
	}
	echo $form->create('BankDetail', array( 'url' => array('controller' => 'menus', 'action' => 'editbalance')));
	echo $form->input('id');
	echo $form->input('account_id',array('label' => 'கணக்கின் பெயர்', 'type'=>'select','options'=> $account_op));
	echo $form->input('acc_openning_year', array('type' => 'hidden', 'value' => $GLOBALS['accounting_year']['acc_opening_year']));
	echo $form->input('acc_closing_year', array('type' => 'hidden', 'value' => $GLOBALS['accounting_year']['acc_closing_year']));
	echo $form->input('account_number', array('label' => 'கணக்கு எண்'));
	echo $form->input('bank_name', array('label' => 'வங்கியின் பெயர்'));
	echo $form->input('branch', array('label' => 'கிளை'));
	echo $form->input('opening_cash_balance', array('label' => 'தொடக்க ரொக்க இருப்பு'));
	echo $form->input('opening_bank_balance', array('label' => 'தொடக்க வங்கி இருப்பு'));
	echo $form->end('Submit');
?>