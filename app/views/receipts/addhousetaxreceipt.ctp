<h2>புதிய வீட்டு வரி ரசீது விபரங்களைச் சேர்</h2>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('HousetaxReceipt', array( 'url' => array('controller' => 'receipts', 'receipts' => 'addhousetaxreceipt')));
	echo $form->input('receipt_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number', array('label' => 'ரசீது எண்'));
	echo $form->input('demand_number', array('label' => 'கேட்பு எண்', 'class' => 'demand_number'));
	echo $form->input('door_number', array('label' => 'கதவு எண்', 'class' => 'door_number', 'readonly' => 'readonly'));
	echo $form->input('name', array('class' => 'name', 'label' => 'பெயர்', 'readonly' => 'readonly'));
	echo $form->input('father_name', array('class' => 'father_name', 'label' => 'தந்தையின் பெயர்', 'readonly' => 'readonly'));
	echo $form->input('address', array('label' => 'முகவரி', 'class' => 'address', 'readonly' => 'readonly'));
	echo $form->input('hamlet_id', array('label' => 'குக்கிராமத்தின் குறியீடு', 'class' => 'hamlet_id', 'readonly' => 'readonly', 'type' => 'select','options'=> $hamlet_info));
	echo $form->input('survey_number', array('label' => 'சர்வே எண்'));
	echo $form->input('square_feet_estimation', array('label' => 'மதிப்பீடு - சதுர அடி'));
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>நிலுவை</td>";
			echo "<td>நடப்பு</td>";
		echo "</tr><tr>";
			echo "<td><label>வீட்டு வரி</label></td>";
			echo '<td>'.$form->input('ht_pending', array('label' => false, 'class' => 'small ht_pending')).'</td>';
			echo '<td>'.$form->input('ht_current', array('label' => false, 'class' => 'small ht_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td><label>நூலக வரி</label></td>";

		echo '<td>'.$form->input('lc_pending', array('label' => false, 'class' => 'small lc_pending')).'</td>';
		echo '<td>'.$form->input('lc_current', array('label' => false, 'class' => 'small lc_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';	
	
	//echo $form->input('house_tax', array('class' =>'house_tax', 'label' => 'House Tax'));
	// echo $form->input('library_charge', array('class' =>'library_charge', 'label' => 'Library Charge'));
	// echo $form->input('pending_amount', array('class' =>'pending_amount', 'label' => 'Pending Amount'));
	echo $form->input('total_amount', array('label' => 'மொத்தம் ரூ.', 'class' => 'total_amount', 'readonly' => 'readonly'));
	echo $form->end('அனுப்பு');
?>

<script>
$(document).ready(function(){
	c = 1;
	$('.demand_number').focusout(function(){
	  var demand_number = $('.demand_number').val();
	  var this_data = $(this);
		  $.ajax({
		  	type: 'POST',
		  	url: Webroot+"/receipts/get_housetax_family_demand/",
		  	data: {'demand_number':demand_number},
		  	success: function(data){
		  		var output=JSON.parse(data);
		  		if(output){
			  		$('.door_number').val(output.HtDemand.door_number);
			  		$('.name').val(output.HtDemand.name);
			  		$('.father_name').val(output.HtDemand.father_name);
			  		$('.address').val(output.HtDemand.address);
			  		$('.hamlet_id').val(output.HtDemand.hamlet_id);
			  		$('.ht_pending').val(output.HtDemand.ht_pending);
			  		$('.ht_current').val(output.HtDemand.ht_current);
			  		$('.lc_pending').val(output.HtDemand.lc_pending);
			  		$('.lc_current').val(output.HtDemand.lc_current);
			  		$('.total_amount').val(parseInt(output.HtDemand.ht_pending) + parseInt(output.HtDemand.ht_current) + parseInt(output.HtDemand.lc_pending) + parseInt(output.HtDemand.lc_current));
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
