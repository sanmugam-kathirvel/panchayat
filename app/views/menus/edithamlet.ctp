<h2>குக்கிராமத்தின் விபரங்களைத் திருத்து</h2>
<?php
	echo $form->create('Hamlet', array( 'url' => array('controller' => 'menus', 'action' => 'edithamlet', $this->data['Hamlet']['id'])));
	echo $form->input('id');
	echo $form->input('hamlet_code', array('label' => 'குக்கிராமத்தின் குறியீடு'));
	echo $form->input('hamlet_name', array('label' => 'குக்கிராமத்தின் பெயர்'));
	echo $form->input('description', array('label' => 'விவரிப்பு'));
	echo $form->end('அனுப்பு');
?>