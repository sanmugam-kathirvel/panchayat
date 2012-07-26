<p>தொடக்க கையிருப்பு செர்த்தல்</p>
<?php
	echo $form->create('Stock', array( 'url' => array('controller' => 'menus', 'action' => 'addopeningstock')));
	echo $form->input('item_name', array('label' => 'பொருளின் பெயர்'));
	echo $form->input('item_quantity', array('label' => 'பொருளின் அளவு'));
	echo $form->input('description', array('label' => 'விவரிப்பு'));
	echo $form->end('Submit');
?>