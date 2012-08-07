<h2>டி & ஓ வியாபாரிகள் வரி ரசீது விபரங்களைச் சேர்</h2>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('DotaxReceipt', array( 'url' => array('controller' => 'receipts', 'action' => 'adddotaxreceipt')));
	echo $form->input('receipt_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('receipt_number', array('label' => 'ரசீது எண்'));
	echo $form->input('demand_number', array('label' => 'கேட்பு எண்', 'class' => 'demand_number'));
	echo $form->input('name', array('label' => 'பெயர்', 'class' => 'name', 'readonly' => 'readonly'));
	echo $form->input('father_name', array('label' => 'தந்தையின் பெயர்', 'class' => 'father_name', 'readonly' => 'readonly'));
	echo $form->input('address', array('label' => 'முகவரி', 'class' => 'address', 'readonly' => 'readonly'));
	echo $form->input('emd', array('label' => 'வைப்புத் தொகை', 'class' => 'emd', 'readonly' => 'readonly'));
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>ஆரம்ப தேதி</td>";
			echo "<td>இருதி தேதி</td>";
		echo "</tr><tr>";
			echo "<td><label>காலம்</label></td>";
			echo '<td>'.$form->input('start_date', array('id' => 'datepicker1', 'label' => false, 'type' => 'text', 'class' => 'small')).'</td>';
			echo '<td>'.$form->input('end_date', array('id' => 'datepicker2', 'label' => false, 'type' => 'text', 'class' => 'small')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>நிலுவை</td>";
			echo "<td>நடப்பு</td>";
		echo "</tr><tr>";
			echo "<td><label>வசூலிக்கப்பட்ட தொகை</label></td>";
			echo '<td>'.$form->input('do_pending', array('label' => false, 'class' => 'small do_pending')).'</td>';
			echo '<td>'.$form->input('do_current', array('label' => false, 'class' => 'small do_current')).'</td>';
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
	  	url: Webroot+"/receipts/get_dotax_family_demand/",
	  	data: {'demand_number':demand_number},
	  	success: function(data){
	  		output=JSON.parse(data);
	  		if(output){
		  		$('.name').val(output.DoDemand.name);
		  		$('.father_name').val(output.DoDemand.father_name);
		  		$('.address').val(output.DoDemand.address);
		  		$('.emd').val(output.DoDemand.emd);
		  		$('.do_pending').val(output.DoDemand.do_pending);
		  		$('.do_current').val(output.DoDemand.do_current);
		  		$('.total_amount').val(parseInt(output.DoDemand.do_pending) + parseInt(output.DoDemand.do_current) + parseInt(output.DoDemand.emd));
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
	$('.do_pending, .do_current').focusout(function(){
		$('.total_amount').val(parseInt($('.do_pending').val()) + parseInt($('.do_current').val()) + parseInt($('.emd').val()));
	});
});
</script>
