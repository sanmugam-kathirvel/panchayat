<h2>புதிய NMR பட்டியல் விபரங்களைச் சேர்</h2>
<?php
	echo $form->create('NmrRoll', array( 'url' => array('controller' => 'nregs', 'action' => 'nmrrolls')));
  echo $form->input('role_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('starting_roll_no', array('label' => 'ஆரம்ப NMR பட்டியல் எண்', 'class' => 'from'));
	echo $form->input('ending_roll_no', array('label' => 'இருதி NMR பட்டியல் எண்', 'class' => 'to'));
	echo $form->end('அனுப்பு');
?>