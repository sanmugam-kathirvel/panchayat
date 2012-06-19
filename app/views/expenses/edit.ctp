<p><h3><?php __('Edit Account-'.$this->data['Expense']['account_id'].' Expense'); ?></h3></p>
<?php
	$header_op = array();
	foreach($header as $head){
		$header_op[$head['Header']['id']] =  $head['Header']['header_name'];
	}
	echo $form->create('Expense', array( 'url' => array('controller' => 'expenses', 'action' => 'edit')));
	echo $form->input('id');
	echo $form->input('account_id', array('type' => 'hidden'));
	echo $form->input('header_id', array('label' => 'Header', 'type' => 'select','option' => '', 'options' => $header_op));
	echo $form->input('expense_date', array('label' => 'Date', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('voucher_number');
	echo $form->input('expense_amount', array('label' => 'Amount'));
	echo $form->input('drawee_name');
	echo $form->input('cheque_number');
	echo $form->input('cheque_date', array('id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('description');
	echo $form->end('Submit');
?>

<script>
	Webroot = 'http://localhost/myapp/panchayat';
	$(document).ready(function(){
		$('.account').change(function(){
		  var account = $('.account').val();
			  $.ajax({
			  	type: 'POST',
			  	url: Webroot+"/expenses/avail_header/",
			  	data: {'account':account},
			  	success: function(data){
			  		output=JSON.parse(data);
			  		var htmldata = '';
			  		for(var i = 0; i < output.length; i++){
				 			htmldata = htmldata+"<option value='"+output[i].Header.id+"'>"+output[i].Header.header_name+"</option>";
				 		}
			  	  $('#ExpenseHeaderId').html(htmldata);	
			  	}
			  });
		});
	});
</script>