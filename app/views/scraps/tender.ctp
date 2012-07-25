<p>Attendance</p>

<?php
	echo $form->create('Scrap', array( 'url' => array('controller' => 'scraps', 'action' => 'tender')));
	echo $form->input('id', array('value' => $this->params['named']['id']));
	echo $form->input('tender_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('tender_amount');
	echo $form->input('tender_confirmation_date', array('id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('tender_confirmation_amount');
	echo $form->input('tender_taken_by');
	echo $form->hidden('tender_status', array('value' => 'sold'));
	echo $form->end('Submit');
?>	
