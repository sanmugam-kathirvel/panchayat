<p>Water Tax Demand</p>
<?php
	echo $form->create('HtDemand', array( 'url' => array('controller' => 'menus', 'action' => 'addhtdemand')));
	echo $form->input('demand_number');
	echo $form->input('door_number');
	echo $form->input('name');
	echo $form->input('father_name');
	echo $form->input('hamlet_code');
	echo $form->input('wt_demand', array('label' => 'Water Tax Demand'));
	echo $form->end('Submit');
?>
