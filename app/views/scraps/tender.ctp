<h2>கழிவுப் பொருட்களை ஏலம் விடுதல்</h2>
<?php
	echo $form->create('Scrap', array( 'url' => array('controller' => 'scraps', 'action' => 'tender', $this->data['Scrap']['id'])));
	echo $form->input('id');
	echo $form->input('tender_date', array('label' => 'ஏலம் விடப்பட்ட தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('tender_amount', array('label' => 'ஏலத் தொகை'));
	echo $form->input('tender_confirmation_date', array('label' => 'ஏலம் உருதி செய்யப்பட்ட தேதி', 'id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('tender_confirmation_amount', array('label' => 'உருதி செய்யப்பட்ட ஏலத் தொகை'));
	echo $form->input('tender_taken_by', array('label' => 'ஏலம் எடுத்தவரின் பெயர்'));
	echo $form->hidden('tender_status', array('value' => 'sold'));
	echo $form->end('அனுப்பு');
?>	
