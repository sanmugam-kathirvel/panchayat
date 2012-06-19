<p>Edit Professional Tax Demand</p>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('PtDemand', array( 'url' => array('controller' => 'demands', 'action' => 'ptedit')));
	echo $form->input('demand_number');
	echo $form->input('demand_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('door_number');
	echo $form->input('name');
	echo $form->input('father_name');
	echo $form->input('address');
	echo $form->input('hamlet_id', array('type' => 'select','options'=> $hamlet_info, 'label' => 'Hamlet Code'));
	echo $form->input('part_1_demand', array('label' => 'Part I Demand'));
	echo $form->input('part_2_demand', array('label' => 'Part II Demand'));
	echo $form->input('pending_amount');
	echo $form->end('Submit');
?>
