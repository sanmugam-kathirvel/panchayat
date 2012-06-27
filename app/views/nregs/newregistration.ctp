<p>New Registration</p>
<?php
	$hamlet_op = array();
	foreach($hamlets as $hamlet){
		$hamlet_op[$hamlet['Hamlet']['id']] =  $hamlet['Hamlet']['hamlet_code'];
	}
	echo $form->create('NregsRegistration', array( 'url' => array('controller' => 'nregs', 'action' => 'newregistration'), 'type' => 'file'));
	echo $form->input('family_number');
	echo $form->input('serial_number');
	echo $form->input('job_card_number');
	echo $form->input('name');
	echo $form->input('father_or_husband_name', array('label' => 'Father/Husband Name'));
	echo $form->input('hamlet_id', array('type' => 'select', 'options' => $hamlet_op));
	echo $form->input('sex', array('type' => 'select', 'options' => array('Male' => 'Male', 'Female' => 'Female')));
	echo $form->input('age');
	echo $form->input('community');
	echo $form->input('address');
	echo $form->input('ration_card_number');
	echo $form->input('voter_id_number');
	echo $form->input('bank_account_number', array('label' => 'Account Number'));
	echo $form->input('bank_name');
	echo $form->input('bank_branch');
	echo $form->input('application_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('job_card_issue_date', array('id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('photo', array('type' => 'file', 'label' => 'Upload Photo'));
	echo $form->end('Submit');
?>