<p>House Tax Demand</p>
<?php
	echo $form->create('HtDemand', array( 'url' => array('controller' => 'menus', 'action' => 'addhtdemand')));
	echo $form->input('demand_number');
	echo $form->input('door_number');
	echo $form->input('name');
	echo $form->input('father_name');
	echo $form->input('hamlet_code');
	echo $form->input('ht_demand', array('label' => 'House Tax Demand'));
	echo $form->input('lc_demand', array('label' => 'Library Charge Demand'));
	echo $form->input('total_amount');
	echo $form->end('Submit');
?>
