<p>Add Water Tax Receipt</p>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('WatertaxReceipt', array( 'url' => array('controller' => 'receipts', 'action' => 'addwatertaxreceipt')));
	echo $form->input('receipt_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number');
	echo $form->input('demand_number', array('class' => 'demand_number'));
	echo $form->input('door_number', array('class' => 'door_number', 'readonly' => 'readonly'));
	echo $form->input('name', array('class' => 'name', 'readonly' => 'readonly'));
	echo $form->input('father_name', array('class' => 'father_name', 'readonly' => 'readonly'));
	echo $form->input('address', array('class' => 'address', 'readonly' => 'readonly'));
	echo $form->input('hamlet_id', array('class' => 'hamlet_id', 'readonly' => 'readonly', 'type' => 'select','options'=> $hamlet_info, 'label' => 'Hamlet Code'));
	echo $form->input('water_tax', array('class' => 'water_tax','label' => 'Water Tax Demand'));
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
		  	url: Webroot+"/receipts/get_watertax_family_demand/",
		  	data: {'demand_number':demand_number},
		  	success: function(data){
		  		output=JSON.parse(data);
		  		$('.door_number').val(output.WtDemand.door_number);
		  		$('.name').val(output.WtDemand.name);
		  		$('.father_name').val(output.WtDemand.father_name);
		  		$('.address').val(output.WtDemand.address);
		  		$('.hamlet_id').val(output.WtDemand.hamlet_id);
		  		$('.water_tax').val(output.WtDemand.wt_demand);
		  		$('.pending_amount').val(output.WtDemand.pending_amount);
		  		$('.total_amount').val(parseInt(output.WtDemand.wt_demand) + parseInt(output.WtDemand.pending_amount));
		  	}
		  });
	});
});
</script>