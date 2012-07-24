<p> NMR Roll Slips</p>
<?php
	echo $form->create('NmrRoll', array( 'url' => array('controller' => 'nregs', 'action' => 'edit_nmrrolls')));
	echo $form->input('id');
  echo $form->input('role_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('starting_roll_no', array('class' => 'from'));
	echo $form->input('ending_roll_no', array('class' => 'to'));
	echo $form->end('Submit');
?>