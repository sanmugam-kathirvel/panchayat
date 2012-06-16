<p>Adding Stock</p>
<?php
	echo $form->create('Stock', array( 'url' => array('controller' => 'menus', 'action' => 'addopeningstock')));
	echo $form->input('item_name');
	echo $form->input('item_quantity');
	echo $form->input('description');
	echo $form->end('Submit');
?>