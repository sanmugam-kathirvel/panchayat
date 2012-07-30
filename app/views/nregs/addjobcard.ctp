<h2>புதிய வேலை அடையாள அட்டைகளின் விபரம்</h2>
<?php
	echo $form->create('Jobcard', array( 'url' => array('controller' => 'nregs', 'action' => 'addjobcard')));
	echo $form->input('nregs_stock_id', array('type' => 'hidden', 'value' => '1'));
	echo $form->input('jobcard_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('jobcard_quantity', array('label' => 'அட்டைகளின் எண்ணிக்கை'));
	echo $form->end('அனுப்பு');
?>