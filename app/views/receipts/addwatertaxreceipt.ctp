<h2>புதிய குடிநீர் வரி ரசீது விபரங்களைச் சேர்</h2>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('WatertaxReceipt', array( 'url' => array('controller' => 'receipts', 'action' => 'addwatertaxreceipt')));
	echo $form->input('receipt_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number', array('label' => 'ரசீது எண்'));
	echo $form->input('demand_number', array('label' => 'கேட்பு எண்', 'class' => 'demand_number'));
	echo $form->input('door_number', array('label' => 'கதவு எண்', 'class' => 'door_number', 'readonly' => 'readonly'));
	echo $form->input('name', array('label' => 'பெயர்', 'class' => 'name', 'readonly' => 'readonly'));
	echo $form->input('father_name', array('label' => 'தந்தையின் பெயர்', 'class' => 'father_name', 'readonly' => 'readonly'));
	echo $form->input('address', array('label' => 'முகவரி', 'class' => 'address', 'readonly' => 'readonly'));
	echo $form->input('hamlet_id', array('class' => 'hamlet_id', 'readonly' => 'readonly', 'type' => 'select','options'=> $hamlet_info, 'label' => 'குக்கிராமத்தின் குறியீடு'));
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>நிலுவை</td>";
			echo "<td>நடப்பு</td>";
		echo "</tr><tr>";
			echo "<td><label>வசூலிக்கப்பட்ட தொகை</label></td>";
			echo '<td>'.$form->input('wt_pending', array('label' => false, 'class' => 'small wt_pending')).'</td>';
			echo '<td>'.$form->input('wt_current', array('label' => false, 'class' => 'small wt_current')).'</td>';
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
	    this_data = $(this);
		  $.ajax({
		  	type: 'POST',
		  	url: Webroot+"/receipts/get_watertax_family_demand/",
		  	data: {'demand_number':demand_number},
		  	success: function(data){
		  		output=JSON.parse(data);
		  		if(output){
			  		$('.door_number').val(output.WtDemand.door_number);
			  		$('.name').val(output.WtDemand.name);
			  		$('.father_name').val(output.WtDemand.father_name);
			  		$('.address').val(output.WtDemand.address);
			  		$('.hamlet_id').val(output.WtDemand.hamlet_id);
			  		$('.wt_pending').val(output.WtDemand.wt_pending);
			  		$('.wt_current').val(output.WtDemand.wt_current);
			  		$('.total_amount').val(parseInt(output.WtDemand.wt_current) + parseInt(output.WtDemand.wt_pending));
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
});
</script>