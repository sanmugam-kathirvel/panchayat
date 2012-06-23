<p><h3><?php __('Add Account-'.$acc_id.' Bill Estimation'); ?></h3></p>
<?php
	echo $form->create('ContractBillEstimation', array( 'url' => array('controller' => 'bills', 'action' => 'addbill')));
	echo $form->input('account_id', array('type' => 'hidden', 'value' => $acc_id));
	echo $form->input('contractor_name');
	echo $form->input('address');
	echo $form->input('estimation_amt', array('label' => 'Estimation amount'));
	echo $form->input('workdone_amt', array('class' => 'workdone_amt', 'label' => 'Work Done amount'));
	echo $form->input('emd', array('class' => 'emd','label' => 'EMD 5%'));
	echo $form->input('it', array('class' => 'it','label' => 'IT 2%'));
	echo $form->input('scst', array('class' => 'scst','label' => 'SC on ST 10%'));
	echo $form->input('ec', array('class' => 'ec','label' => 'EC 3%'));
	echo $form->input('vat', array('class' => 'vat','label' => 'Vat 4%'));
	echo $form->input('lwf', array('class' => 'lwf','label' => 'LWF 3%'));
	echo $form->input('deduction_amt', array('class' => 'deduction_amt'));
	echo $form->input('total_amt', array('class' => 'total_amt'));
	echo $form->end('Submit');
?>

<script>
$(document).ready(function(){
	$('.workdone_amt').focusout(function(){
		var deduction_amount = 0;
	  var workdone_amount = parseInt($('.workdone_amt').val());
	  $('.emd').val(workdone_amount * 5 / 100)
	  deduction_amount += parseInt($('.emd').val());
	  $('.it').val(workdone_amount * 2 / 100)
	  deduction_amount += parseInt($('.it').val());
	  $('.scst').val(workdone_amount * 10 / 100)
	  deduction_amount += parseInt($('.scst').val());
	  $('.ec').val(workdone_amount * 3 / 100)
	  deduction_amount += parseInt($('.ec').val());
	  $('.vat').val(workdone_amount * 4 / 100)
	  deduction_amount += parseInt($('.vat').val());
	  $('.lwf').val(workdone_amount * 3 / 100)
	  deduction_amount += parseInt($('.lwf').val());
	  $('.deduction_amt').val(deduction_amount);
	  $('.total_amt').val(workdone_amount - deduction_amount);
	});
});
</script>
