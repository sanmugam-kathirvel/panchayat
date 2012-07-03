<p>NMR Roll Entry</p>

<?php
	$hamlet_op = array();
	foreach($hamlets as $hamlet){
		$hamlet_op[$hamlet['Hamlet']['id']] =  $hamlet['Hamlet']['hamlet_code'];
	}
	echo $form->create('NmrRollentry', array( 'url' => array('controller' => 'nregs', 'action' => 'rollentry')));
	  echo $form->input('nmr_roll_no', array('class' => 'nmr_roll_no', 'value' => $nmr_roll_no['NmrRoll']['currently_available_roll_no'], 'readonly' => 'readonly'));
		echo $form->input('job_card_no', array('class' => 'job_card_no'));
		echo $form->input('name', array('class' => 'name'));
		echo $form->input('father_name', array('class' => 'father_name'));
		echo $form->input('date', array('id' => 'datepicker', 'type' => 'text'));
		echo $form->input('hamlet_id', array('class' => 'hamlet','type' => 'select', 'options' => $hamlet_op));
	echo $form->end('Submit');

?>