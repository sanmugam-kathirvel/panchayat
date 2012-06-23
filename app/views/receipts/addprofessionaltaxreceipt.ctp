<p>Add Professional Tax Receipt</p>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('ProfessionaltaxReceipt', array( 'url' => array('controller' => 'receipts', 'action' => 'addprofessionaltaxreceipt')));
	echo $form->input('receipt_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number');
	echo $form->input('demand_number', array('class' => 'demand_number'));
	echo $form->input('door_number', array('class' => 'door_number', 'readonly' => 'readonly'));
	echo $form->input('name', array('class' => 'name', 'readonly' => 'readonly'));
	echo $form->input('father_name', array('class' => 'father_name', 'readonly' => 'readonly'));
	echo $form->input('address', array('class' => 'address', 'readonly' => 'readonly'));
	echo $form->input('hamlet_id', array('class' => 'hamlet_id', 'readonly' => 'readonly', 'type' => 'select','options'=> $hamlet_info, 'label' => 'Hamlet Code'));
	echo $form->input('part_1_amount', array('class' => 'part_1_amount','label' => 'Part I Demand'));
	echo $form->input('part_2_amount', array('class' => 'part_2_amount','label' => 'Part II Demand'));
	echo $form->input('pending_amount', array('class' => 'pending_amount'));
	echo $form->input('total_amount', array('class' => 'total_amount', 'readonly' => 'readonly'));
	echo $form->end('Submit');
?>

<script>
$(document).ready(function(){
	$('.demand_number').focusout(function(){
	  var demand_number = $('.demand_number').val();
		  $.ajax({
		  	type: 'POST',
		  	url: Webroot+"/receipts/get_professionaltax_family_demand/",
		  	data: {'demand_number':demand_number},
		  	success: function(data){
		  		output=JSON.parse(data);
		  		$('.door_number').val(output.PtDemand.door_number);
		  		$('.name').val(output.PtDemand.name);
		  		$('.father_name').val(output.PtDemand.father_name);
		  		$('.address').val(output.PtDemand.address);
		  		$('.hamlet_id').val(output.PtDemand.hamlet_id);
		  		$('.part_1_amount').val(output.PtDemand.part_1_demand);
		  		$('.part_2_amount').val(output.PtDemand.part_2_demand);
		  		$('.pending_amount').val(output.PtDemand.pending_amount);
		  		$('.total_amount').val(parseInt(output.PtDemand.part_1_demand) + parseInt(output.PtDemand.part_2_demand) + parseInt(output.PtDemand.pending_amount));
		  	}
		  });
	});
});
</script>