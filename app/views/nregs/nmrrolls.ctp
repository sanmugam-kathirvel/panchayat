<p> NMR Roll Slips</p>
<?php
	echo $form->create('NmrRoll', array( 'url' => array('controller' => 'nregs', 'action' => 'nmrrolls')));
	  echo $form->input('role_date', array('id' => 'datepicker', 'type' => 'text'));
		echo $form->input('starting_roll_no', array('class' => 'from'));
		echo $form->input('ending_roll_no', array('class' => 'to'));
		echo $form->input('role_total_numbers', array('class' => 'total'));
	echo $form->end('Submit');

?>
<script>
	$('.to').blur(function(){
		$('.total').val(parseInt($(this).val()) - parseInt($('.from').val()));
	});	
</script>