<p>Adding Income</p>
<?php
	$account_op = array();
	foreach($account as $acc){
		$account_op[$acc['Account']['id']] =  $acc['Account']['account_name'];
	}
	echo $form->create('Income', array( 'url' => array('controller' => 'incomes', 'action' => 'addincome')));
	echo $form->input('account', array('options' => $account_op, 'class' => 'account'));
	echo $form->input('date', array('id' => 'datepicker'));
	echo $form->input('header', array('type' => 'select'));
	echo $form->input('amount');
	echo $form->input('remarks');
	echo $form->end('Submit');
?>