<p>Adding Income</p>
<?php
	echo $form->create('Income', array( 'url' => array('controller' => 'incomes', 'action' => 'addincome')));
	echo $form->input('date');
	echo $form->input('header');
	echo $form->input('amount');
	echo $form->input('remarks');
	echo $form->end('Submit');
?>