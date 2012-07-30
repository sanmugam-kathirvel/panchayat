<h2>வேலை அடையாள அட்டைகளின் விபரங்களை திருத்து</h2>
<?php
	echo $form->create('Jobcard', array( 'url' => array('controller' => 'nregs', 'action' => 'editjobcard')));
	echo $form->input('id');
	echo $form->input('nregs_stock_id', array('type' => 'hidden', 'value' => '1'));
	echo $form->input('jobcard_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('jobcard_quantity', array('label' => 'அட்டைகளின் எண்ணிக்கை'));
	echo $form->end('அனுப்பு');
?>