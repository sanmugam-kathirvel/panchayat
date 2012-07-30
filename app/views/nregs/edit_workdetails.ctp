<h2>வேலையின் விபரங்களை திருத்து</h2>

<?php
	echo $form->create('Workdetail', array( 'url' => array('controller' => 'nregs', 'action' => 'add_workdetails')));
	echo $form->input('id');
	echo $form->input('year', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('name_of_work', array('label' => 'வேலையின் பெயர்'));
	echo $form->input('estimation_amount', array('label' => 'மதிப்பீடு செய்யப்பட்ட தொகை'));
	echo $form->input('as_number', array('label' => 'AS எண்'));
	echo $form->end('அனுப்பு');
?>