<p>Opening Balance</p>
<?php
	$options = array('account_1' => 'Account I', 'account_2' => 'Account II', 'account_3' => 'Account III', 'account_4' => 'Account IV', 'account_5' => 'Account V', 'account_6' => 'Account VI', );
	echo $form->create('OpeningBalance', array( 'url' => array('controller' => 'menus', 'action' => 'addopeningbals')));
	//echo $form->select('account_name', $options);
	echo $form->input('account_name',array('type'=>'select','options'=> $options)); 
	echo $form->input('account_number');
	echo $form->input('bank_name');
	echo $form->input('branch');
	echo $form->input('cash_balance');
	echo $form->input('bank_balance');
	echo $form->end('Submit');
?>