<p>Adding Income</p>
<?php
	$account_op = array();
	foreach($account as $acc){
		$account_op[$acc['Account']['id']] =  $acc['Account']['account_name'];
	}
	echo $form->create('Income', array( 'url' => array('controller' => 'incomes', 'action' => 'addincome')));
	echo $form->input('account', array('options' => $account_op, 'class' => 'account', 'empty' => true));
	echo $form->input('date', array('id' => 'datepicker'));
	echo $form->input('header', array( 'type' => 'select','option' => '', 'empty' => true));
	echo $form->input('amount');
	echo $form->input('remarks');
	echo $form->end('Submit');
?>

<script>
Webroot = 'http://localhost/myapp/panchayat';
$(document).ready(function(){
	$('.account').change(function(){
	  var account = $('.account').val();
		var form_data = $("#IncomeAddincomeForm").serialize();
		  $.ajax({
		  	type: 'POST',
		  	url: Webroot+"/incomes/avail_header/"+account,
		  	data: form_data,
		  	success: function(data){
		  		output=JSON.parse(data);
		  		var htmldata = "<option></option>";
		  		for(var i = 0; i < output.length; i++){
			 			htmldata = htmldata+"<option value='"+output[i].Header.id+"'>"+output[i].Header.header_name+"</option>";
			 		}
		  	  console.log(htmldata);
		  	  $('#IncomeHeader').html(htmldata);	
		  	}
		  });
		 /*$.getJSON(Webroot + '/incomes/avail_header/' + account, function(data){
		 		var htmldata = "";
		 		for(var i = 0; i < data.length; i++){
		 			htmldata = htmldata+"<options value='"+data[i].Header.id+"'>"+data[i].Header.header_name+"</options>";
		 		}
		 		 alert(htmldata);
		 		//document.getElementById('IncomeHeader').innerHTML = htmldata;
        // $('select#IncomeHeader').add(htmldata);
        //$('div#age').text(data.Student.age);
        //$('div#class').text(data.Student.class);
   }); */

	});
});
</script>