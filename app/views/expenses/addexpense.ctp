<p>Adding Expense</p>
<?php
	echo $form->create('Expense', array( 'url' => array('controller' => 'menus', 'action' => 'addexpenses')));
	echo $form->input('voucher_number');
	echo $form->input('header');
	echo $form->input('amount');
	echo $form->input('drawee_name');
	echo $form->input('cheque_number');
	echo $form->input('cheque_date');
	echo $form->input('remarks');
	echo $form->end('Submit');
?>