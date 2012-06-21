<p>Add Professional Tax Demand</p>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('PtDemand', array( 'url' => array('controller' => 'demands', 'action' => 'addptdemand')));
	echo $form->input('receipt_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number');
	echo $form->input('demand_number', array('class' => 'demand_number'));
	echo $form->input('door_number', array('class' => 'door_number'));
	echo $form->input('name', array('class' => 'name'));
	echo $form->input('father_name', array('class' => 'father_name'));
	echo $form->input('hamlet_id', array('class' => 'hamlet_id', 'type' => 'select','options'=> $hamlet_info, 'label' => 'Hamlet Code'));
	echo $form->input('part_1_demand', array('label' => 'Part I Demand'));
	echo $form->input('part_2_demand', array('label' => 'Part II Demand'));
	echo $form->input('pending_amount');
	echo $form->end('Submit');
?>

<script>
$(document).ready(function(){
	$('.demand_number').focusout(function(){
	  var demand_number = $('.demand_number').val();
		  $.ajax({
		  	type: 'POST',
		  	url: Webroot+"/receipts/get_dotax_family_demand/",
		  	data: {'demand_number':demand_number},
		  	success: function(data){
		  		output=JSON.parse(data);
		  		$('.door_number').val(output.DoDemand.door_number);
		  		$('.name').val(output.DoDemand.name);
		  		$('.father_name').val(output.DoDemand.father_name);
		  		$('.hamlet_id').val(output.DoDemand.hamlet_id);
		  		$('.do_tax').val(output.DoDemand.do_demand);
		  		$('.pending_amount').val(output.DoDemand.pending_amount);
		  		$('.total_amount').val(parseInt(output.DoDemand.do_demand) + parseInt(output.DoDemand.pending_amount));
		  	}
		  });
	});
});
</script>