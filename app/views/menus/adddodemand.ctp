<p>D & O Traders Demand</p>
<?php
	echo $form->create('DoDemand', array( 'url' => array('controller' => 'menus', 'action' => 'adddodemand')));
	echo $form->input('demand_number');
	echo $form->input('door_number');
	echo $form->input('name');
	echo $form->input('father_name');
	echo $form->input('hamlet_code');
	echo $form->input('do_demand', array('label' => 'D & O Traders Demand'));
	echo $form->end('Submit');
?>
