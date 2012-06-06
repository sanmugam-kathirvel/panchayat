<p>Adding Hamlet</p>
<?php
	echo $form->create('Hamlet', array( 'url' => array('controller' => 'menus', 'action' => 'addhamlet')));
	echo $form->input('hamlet_code');
	echo $form->input('hamlet_name');
	echo $form->input('description');
	echo $form->end('Submit');
?>