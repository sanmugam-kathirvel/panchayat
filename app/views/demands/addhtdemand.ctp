<p>House Tax Demand</p>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('HtDemand', array( 'url' => array('controller' => 'demands', 'action' => 'addhtdemand')));
	echo $form->input('demand_number');
	echo $form->input('demand_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('door_number');
	echo $form->input('name');
	echo $form->input('father_name');
	echo $form->input('hamlet_id', array('type' => 'select','options'=> $hamlet_info, 'label' => 'Hamlet Code'));
	echo $form->input('ht_demand', array('label' => 'House Tax'));
	echo $form->input('lc_demand', array('label' => 'Library Charge'));
	echo $form->input('total_amount', array('label' => 'Total Demand'));
	echo $form->end('Submit');
?>
