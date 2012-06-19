<p>Edit Hamlet</p>
<?php
	echo $form->create('Hamlet', array( 'url' => array('controller' => 'menus', 'action' => 'edithamlet')));
	echo $form->input('id');
	echo $form->input('hamlet_code');
	echo $form->input('hamlet_name');
	echo $form->input('description');
	echo $form->end('Submit');
?>