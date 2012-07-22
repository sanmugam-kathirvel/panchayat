<p>Adding Header</p>
<?php
	$options2 = array('income' => 'Income', 'expense' => 'Expense');
	$receipt_op = array('no' => 'No', 'yes' => 'Yes');
	echo $form->create('Header', array( 'url' => array('controller' => 'menus', 'action' => 'addheader')));
	echo $form->input('account_id', array('type'=>'select','options'=> $account_op));
	echo $form->input('header_name');
	echo $form->input('header_type', array('type'=>'select','options'=> $options2));
	echo $form->input('receipt', array('type'=>'select', 'empty' => true, 'options'=> $receipt_op));
	echo $form->end('Submit');
?>
