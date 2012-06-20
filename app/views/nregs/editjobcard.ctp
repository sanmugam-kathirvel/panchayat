<p>Add New Job Cards</p>
<?php
	echo $form->create('Jobcard', array( 'url' => array('controller' => 'nregs', 'action' => 'editjobcard')));
	echo $form->input('id');
	echo $form->input('nregs_stock_id', array('type' => 'hidden', 'value' => '1'));
	echo $form->input('jobcard_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('jobcard_quantity', array('label' => 'Number of job cards'));
	echo $form->end('Submit');
?>