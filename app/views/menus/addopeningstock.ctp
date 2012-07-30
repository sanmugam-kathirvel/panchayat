<h2>தொடக்க கையிருப்பு விபரங்களைச் சேர்த்தல்</h2>
<?php
	echo $form->create('Stock', array( 'url' => array('controller' => 'menus', 'action' => 'addopeningstock')));
	echo $form->input('item_name', array('label' => 'பொருளின் பெயர்'));
	echo $form->input('item_quantity', array('label' => 'பொருளின் அளவு'));
	echo $form->input('description', array('label' => 'விவரிப்பு'));
	echo $form->end('அனுப்பு');
?>