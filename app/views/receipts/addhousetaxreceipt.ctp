<p>Add House Tax Demand</p>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('HousetaxReceipt', array( 'url' => array('controller' => 'receipts', 'receipts' => 'addhousetaxreceipt')));
	echo $form->input('receipt_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number');
	echo $form->input('demand_number', array('class' => 'demand_number'));
	echo $form->input('door_number', array('class' => 'door_number'));
	echo $form->input('name', array('class' => 'name'));
	echo $form->input('father_name', array('class' => 'father_name'));
	echo $form->input('hamlet_id', array('class' => 'hamlet_id', 'type' => 'select','options'=> $hamlet_info, 'label' => 'Hamlet Code'));
	echo $form->input('house_tax', array('class' =>'house_tax', 'label' => 'House Tax'));
	echo $form->input('library_charge', array('class' =>'library_charge', 'label' => 'Library Charge'));
	echo $form->input('pending_amount', array('class' =>'pending_amount', 'label' => 'Pending Amount'));
	echo $form->input('total_amount', array('class' => 'total_amount'));
	echo $form->end('Submit');
?>

<script>
$(document).ready(function(){
	$('.demand_number').focusout(function(){
	  var demand_number = $('.demand_number').val();
		  $.ajax({
		  	type: 'POST',
		  	url: Webroot+"/receipts/get_housetax_family_demand/",
		  	data: {'demand_number':demand_number},
		  	success: function(data){
		  		var output=JSON.parse(data);
		  		$('.door_number').val(output.HtDemand.door_number);
		  		$('.name').val(output.HtDemand.name);
		  		$('.father_name').val(output.HtDemand.father_name);
		  		$('.hamlet_id').val(output.HtDemand.hamlet_id);
		  		$('.house_tax').val(output.HtDemand.ht_demand);
		  		$('.library_charge').val(output.HtDemand.lc_demand);
		  		$('.pending_amount').val(output.HtDemand.pending_amount);
		  		$('.total_amount').val(parseInt(output.HtDemand.ht_demand) + parseInt(output.HtDemand.lc_demand) + parseInt(output.HtDemand.pending_amount));
		  	}
		  });
	});
});
</script>
