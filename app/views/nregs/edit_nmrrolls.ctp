<h2>NMR பட்டியல் விபரங்களை திருத்து</h2>
<?php
	echo $form->create('NmrRoll', array( 'url' => array('controller' => 'nregs', 'action' => 'edit_nmrrolls')));
	echo $form->input('id');
  echo $form->input('role_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('starting_roll_no', array('label' => 'ஆரம்ப NMR பட்டியல் எண்', 'class' => 'from'));
	echo $form->input('ending_roll_no', array('label' => 'இருதி NMR பட்டியல் எண்', 'class' => 'to'));
	echo $form->end('அனுப்பு');
?>