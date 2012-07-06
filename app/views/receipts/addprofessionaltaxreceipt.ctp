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
	echo $form->input('company_name', array('class' => 'company_name', 'readonly' => 'readonly'));
	echo $form->input('half_yearly_income', array('class' => 'half_yearly_income', 'readonly' => 'readonly'));
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>Pending</td>";
			echo "<td>Current</td>";
		echo "</tr><tr>";
			echo "<td><label>Part I Demand</label></td>";
			echo '<td>'.$form->input('part1_pending', array('label' => false, 'class' => 'small part1_pending')).'</td>';
			echo '<td>'.$form->input('part1_current', array('label' => false, 'class' => 'small part1_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td><label>Part II Demand</label></td>";
			echo '<td>'.$form->input('part2_pending', array('label' => false, 'class' => 'small part2_pending')).'</td>';
			echo '<td>'.$form->input('part2_current', array('label' => false, 'class' => 'small part2_current')).'</td>';
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
		  	url: Webroot+"/receipts/get_professionaltax_family_demand/",
		  	data: {'demand_number':demand_number},
		  	success: function(data){
		  		output=JSON.parse(data);
		  		$('.door_number').val(output.PtDemand.door_number);
		  		$('.name').val(output.PtDemand.name);
		  		$('.father_name').val(output.PtDemand.father_name);
		  		$('.address').val(output.PtDemand.address);
		  		$('.hamlet_id').val(output.PtDemand.hamlet_id);
		  		$('.company_name').val(output.PtDemand.company_name);
		  		$('.half_yearly_income').val(output.PtDemand.half_yearly_income);
		  		$('.part1_pending').val(output.PtDemand.part1_pending);
		  		$('.part1_current').val(output.PtDemand.part1_current);
		  		$('.part2_pending').val(output.PtDemand.part2_pending);
		  		$('.part2_current').val(output.PtDemand.part2_current);
		  		$('.total_amount').val(parseInt(output.PtDemand.part1_pending) + parseInt(output.PtDemand.part1_current) + parseInt(output.PtDemand.part2_pending) + parseInt(output.PtDemand.part2_current));
		  	}
		  });
	});
});
</script>