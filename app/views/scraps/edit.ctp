<h2>கழிவுகளைத் திருத்துதல்</h2>

<?php
	echo $form->create('Scrap', array( 'url' => array('controller' => 'scraps', 'action' => 'add')));
	echo $form->input('id');
	echo $form->input('scrap_detail', array('label' => 'கழிவுகளின் விபரம்'));
	echo $form->input('quantity', array('label' => 'அளவு'));
	echo $form->input('estimation_date', array('label' => 'மத்திப்பீடு செய்த தேதி', 'id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('estimation_amount', array('label' => 'மத்திப்பீடு செய்த தொகை'));
	echo $form->hidden('tender_status', array('value' => 'available'));
	echo $form->end('அனுப்பு');
?>	
