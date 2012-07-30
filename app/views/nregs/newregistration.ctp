<h2>புதிய பணியாளர்களின் பதிவீடு விபரங்களைச் சேர்</h2>
<?php
	echo $form->create('NregsRegistration', array( 'url' => array('controller' => 'nregs', 'action' => 'newregistration'), 'type' => 'file'));
	echo $form->input('family_number', array('label' => 'குடும்ப எண்'));
	echo $form->input('job_card_number', array('label' => 'வேலை அடையாள அட்டை எண்'));
	echo $form->input('name', array('label' => 'பெயர்'));
	echo $form->input('father_or_husband_name', array('label' => 'தந்தை / கணவர் பெயர்'));
	echo $form->input('hamlet_id', array('label' => 'குக்கிராமத்தின் குறியீடு', 'type' => 'select', 'options' => $hamlet_op));
	echo $form->input('sex', array('label' => 'பாலினம்', 'type' => 'select', 'options' => array('ஆண்' => 'ஆண்', 'பெண்' => 'பெண்')));
	echo $form->input('age', array('label' => 'வயது'));
	echo $form->input('community', array('label' => 'சாதி'));
	echo $form->input('address', array('label' => 'முகவரி'));
	echo $form->input('ration_card_number', array('label' => 'குடும்ப அடையாள அட்டை எண்'));
	echo $form->input('voter_id_number', array('label' => 'வாக்காளர் அடையாள அட்டை எண் அட்டை எண்'));
	echo $form->input('bank_account_number', array('label' => 'வங்கி கணக்கு எண்'));
	echo $form->input('bank_name', array('label' => 'வங்கியின் பெயர்'));
	echo $form->input('bank_branch', array('label' => 'வங்கி கிளை'));
	echo $form->input('application_date', array('label' => 'விண்ணப்பம் வாங்கிய தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('job_card_issue_date', array('label' => 'வேலை அடையாள அட்டை வழங்கிய தேதி', 'id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('photo', array('type' => 'file', 'label' => 'புகைப்படத்தை தேர்வு செய்'));
	echo $form->end('அனுப்பு');
?>