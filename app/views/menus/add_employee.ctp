<h2>புதிய ஊழியரின் தகவலைச் சேர்த்தல்</h2>
<?php
	echo $form->create('Employee', array( 'url' => array('controller' => 'menus', 'action' => 'add_employee')));
	echo $form->input('name', array('label' => 'பெயர்'));
	echo $form->input('designation', array('label' => 'பதவி'));
	echo $form->input('address', array('label' => 'முகவரி'));
	echo $form->input('phone_number', array('label' => 'கைபேசி எண்'));
	echo $form->end('அனுப்பு');
?>