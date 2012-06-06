<p>Adding Header</p>
<?php
	$options1 = array('account_1' => 'Account I', 'account_2' => 'Account II', 'account_3' => 'Account III', 'account_4' => 'Account IV', 'account_5' => 'Account V', 'account_6' => 'Account VI', );
	$options2 = array('income' => 'Income', 'expense' => 'Expense');
	echo $form->create('Header', array( 'url' => array('controller' => 'menus', 'action' => 'addheader')));
	echo $form->input('account_name', array('type'=>'select','options'=> $options1));
	echo $form->input('header_name');
	echo $form->input('header_type', array('type'=>'select','options'=> $options2));
	echo $form->end('Submit');
?>
