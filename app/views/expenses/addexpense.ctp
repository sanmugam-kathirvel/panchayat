<p>Adding Expense</p>
<?php
	$account_op = array();
	foreach($account as $acc){
		$account_op[$acc['Account']['id']] =  $acc['Account']['account_name'];
	}
	echo $form->create('Expense', array( 'url' => array('controller' => 'expenses', 'action' => 'addexpense')));
	echo $form->input('account_id', array('label' => 'Account', 'options' => $account_op, 'class' => 'account', 'empty' => true));
	echo $form->input('header_id', array('label' => 'Header', 'type' => 'select','option' => '', 'empty' => true));
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
			  		var htmldata = "<option></option>";
			  		for(var i = 0; i < output.length; i++){
				 			htmldata = htmldata+"<option value='"+output[i].Header.id+"'>"+output[i].Header.header_name+"</option>";
				 		}
			  	  $('#ExpenseHeaderId').html(htmldata);	
			  	}
			  });
		});
	});
</script>