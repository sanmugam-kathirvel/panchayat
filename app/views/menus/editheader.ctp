<p>Edit Header</p>
<?php
	$account_op = array();
	foreach($account as $acc){
		$account_op[$acc['Account']['id']] =  $acc['Account']['account_name'];
	}
	$options2 = array('income' => 'Income', 'expense' => 'Expense');
	echo $form->create('Header', array( 'url' => array('controller' => 'menus', 'action' => 'addheader')));
	echo $form->input('id');
	echo $form->input('account_id', array('type'=>'select','options'=> $account_op));
	echo $form->input('header_name');
	echo $form->input('header_type', array('type'=>'select','options'=> $options2));
	echo $form->end('Submit');
?>
