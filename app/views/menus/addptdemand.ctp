<p>Professional Tax Demand</p>
<?php
	echo $form->create('PtDemand', array( 'url' => array('controller' => 'menus', 'action' => 'addptdemand')));
	echo $form->input('demand_number');
	echo $form->input('door_number');
	echo $form->input('name');
	echo $form->input('father_name');
	echo $form->input('hamlet_code');
	echo $form->input('p1_demand', array('label' => 'Part I Demand'));
	echo $form->input('p2_demand', array('label' => 'Part II Demand'));
	echo $form->input('total_amount');
	echo $form->end('Submit');
?>
