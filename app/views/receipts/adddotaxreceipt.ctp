<p>Add D & O Traders Receipt</p>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('DotaxReceipt', array( 'url' => array('controller' => 'receipts', 'action' => 'adddotaxreceipt')));
	echo $form->input('receipt_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number');
	echo $form->input('demand_number', array('class' => 'demand_number'));
	echo $form->input('door_number', array('class' => 'door_number', 'readonly' => 'readonly'));
	echo $form->input('name', array('class' => 'name', 'readonly' => 'readonly'));
	echo $form->input('father_name', array('class' => 'father_name', 'readonly' => 'readonly'));
	echo $form->input('address', array('class' => 'address', 'readonly' => 'readonly'));
	echo $form->input('hamlet_id', array('class' => 'hamlet_id', 'readonly' => 'readonly', 'type' => 'select','options'=> $hamlet_info, 'label' => 'Hamlet Code'));
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>Pending</td>";
			echo "<td>Current</td>";
		echo "</tr><tr>";
			echo "<td><label>D&O Traders Demand</label></td>";
			echo '<td>'.$form->input('do_pending', array('label' => false, 'class' => 'small do_pending')).'</td>';
			echo '<td>'.$form->input('do_current', array('label' => false, 'class' => 'small do_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo $form->input('total_amount', array('class' => 'total_amount', 'readonly' => 'readonly'));
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
		  		$('.address').val(output.DoDemand.address);
		  		$('.hamlet_id').val(output.DoDemand.hamlet_id);
		  		$('.do_pending').val(output.DoDemand.do_pending);
		  		$('.do_current').val(output.DoDemand.do_current);
		  		$('.total_amount').val(parseInt(output.DoDemand.do_pending) + parseInt(output.DoDemand.do_current));
		  	}
		  });
	});
});
</script>
