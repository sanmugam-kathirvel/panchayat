<p>Attendance</p>

<?php
	echo $form->create('Scrap', array( 'url' => array('controller' => 'scraps', 'action' => 'add')));
	echo $form->input('scrap_detail');
	echo $form->input('quantity');
	echo $form->input('estimation_date', array('id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('estimation_amount');
	echo $form->hidden('tender_status', array('value' => 'available'));
	echo $form->end('Submit');
?>	
