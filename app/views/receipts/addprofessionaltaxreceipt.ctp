<h2>புதிய தொழில் வரி ரசீது விபரங்களைச் சேர்</h2>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('ProfessionaltaxReceipt', array( 'url' => array('controller' => 'receipts', 'action' => 'addprofessionaltaxreceipt')));
	echo $form->input('receipt_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number', array('label' => 'ரசீது எண்'));
	echo $form->input('demand_number', array('label' => 'கேட்பு எண்', 'class' => 'demand_number'));
	echo $form->input('door_number', array('label' => 'கதவு எண்', 'class' => 'door_number', 'readonly' => 'readonly'));
	echo $form->input('name', array('label' => 'பெயர்', 'class' => 'name', 'readonly' => 'readonly'));
	echo $form->input('father_name', array('label' => 'தந்தையின் பெயர்', 'class' => 'father_name', 'readonly' => 'readonly'));
	echo $form->input('address', array('label' => 'முகவரி', 'class' => 'address', 'readonly' => 'readonly'));
	echo $form->input('hamlet_id', array('class' => 'hamlet_id', 'readonly' => 'readonly', 'type' => 'select','options'=> $hamlet_info, 'label' => 'குக்கிராமத்தின் குறியீடு'));
	echo $form->input('company_name', array('label' => 'நிறுவனத்தின் பெயர்', 'class' => 'company_name', 'readonly' => 'readonly'));
	echo $form->input('half_yearly_income', array('label' => 'அரையாண்டு வருமானம்', 'class' => 'half_yearly_income', 'readonly' => 'readonly'));
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>நிலுவை</td>";
			echo "<td>நடப்பு</td>";
		echo "</tr><tr>";
			echo "<td><label>பாகம் I வரித் தொகை</label></td>";
			echo '<td>'.$form->input('part1_pending', array('label' => false, 'class' => 'small part1_pending')).'</td>';
			echo '<td>'.$form->input('part1_current', array('label' => false, 'class' => 'small part1_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td><label>பாகம் II வரித் தொகை</label></td>";
			echo '<td>'.$form->input('part2_pending', array('label' => false, 'class' => 'small part2_pending')).'</td>';
			echo '<td>'.$form->input('part2_current', array('label' => false, 'class' => 'small part2_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo $form->input('total_amount', array('label' => 'மொத்தம் ரூ.', 'class' => 'total_amount', 'readonly' => 'readonly'));
	echo $form->end('அனுப்பு');
?>

<script>
$(document).ready(function(){
	c=1;
	$('.demand_number').focusout(function(){
	  var demand_number = $('.demand_number').val();
	  var this_data = $(this);
	  $.ajax({
	  	type: 'POST',
	  	url: Webroot+"/receipts/get_professionaltax_family_demand/",
	  	data: {'demand_number':demand_number},
	  	success: function(data){
	  		output=JSON.parse(data);
	  		if(output){
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
	  		}else{
	  			if(c==1){
	  				this_data.parent().append('<div class="error-message">This Demand number not found</div>');
		  			$('div.error-message').delay(5000).hide(1000);
		  			c++;
	  			}
	  			this_data.val('');
		  		this_data.focus();
	  		}
	  	}
	  });
	});
	$('.part1_pending, .part1_current, .part2_pending, .part2_current').focusout(function(){
		$('.total_amount').val(parseInt($('.part1_pending').val()) + parseInt($('.part1_current').val()) + parseInt($('.part2_pending').val()) + parseInt($('.part2_current').val()));
	});
});
</script>