<p>Attendance</p>

<?php
	echo $form->create('Workdetail', array( 'url' => array('controller' => 'nregs', 'action' => 'add_workdetails')));
	echo $form->input('year', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('name_of_work');
	echo $form->input('estimation_amount');
	echo $form->input('as_number', array('label' => 'A.S Number'));
	echo $form->end('Submit');

?>