<p><h3><?php __('Edit Account-'.$this->data['ContractBillEstimation']['account_id'].' Bill Estimation'); ?></h3></p>
<?php
	echo $form->create('ContractBillEstimation', array( 'url' => array('controller' => 'bills', 'action' => 'edit')));
	echo $form->input('id');
	echo $form->input('account_id', array('type' => 'hidden'));
	echo $form->input('contractor_name');
	echo $form->input('address');
	echo $form->input('estimation_amt');
	echo $form->input('workdone_amt', array('class' => 'workdone_amt', 'label' => 'Work Done amount'));
	if($this->data['ContractBillEstimation']['account_id'] > 1){
		echo $form->input('cement', array('class' => 'cement'));
		echo $form->input('steel', array('class' => 'steel'));
		echo $form->input('door', array('class' => 'door'));
		echo $form->input('windows', array('class' => 'windows'));
		echo $form->input('toilet_basin', array('class' => 'toilet_basin'));
	}
	echo $form->input('emd', array('class' => 'emd','label' => 'EMD 5%', 'readonly' => 'readonly'));
	echo $form->input('it', array('class' => 'it','label' => 'IT 2%', 'readonly' => 'readonly'));
	echo $form->input('scst', array('class' => 'scst','label' => 'SC on ST 10%', 'readonly' => 'readonly'));
	echo $form->input('ec', array('class' => 'ec','label' => 'EC 3%', 'readonly' => 'readonly'));
	echo $form->input('vat', array('class' => 'vat','label' => 'Vat 4%', 'readonly' => 'readonly'));
	echo $form->input('lwf', array('class' => 'lwf','label' => 'LWF 3%', 'readonly' => 'readonly'));
	echo $form->input('deduction_amt', array('class' => 'deduction_amt', 'readonly' => 'readonly'));
	echo $form->input('total_amt', array('class' => 'total_amt', 'readonly' => 'readonly'));
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
	  deduction_amount += parseInt($('.cement').val());
		deduction_amount += parseInt($('.steel').val());
		deduction_amount += parseInt($('.door').val());
		deduction_amount += parseInt($('.windows').val());
		deduction_amount += parseInt($('.toilet_basin').val());
	  $('.deduction_amt').val(deduction_amount);
	  $('.total_amt').val(workdone_amount - deduction_amount);
	});
	$('.cement').focusout(function(){
		var deduction_amount = 0;
		var workdone_amount = parseInt($('.workdone_amt').val());
		deduction_amount += parseInt($('.cement').val());
		deduction_amount += parseInt($('.steel').val());
		deduction_amount += parseInt($('.door').val());
		deduction_amount += parseInt($('.windows').val());
		deduction_amount += parseInt($('.toilet_basin').val());
		deduction_amount += parseInt($('.emd').val());
		deduction_amount += parseInt($('.it').val());
		deduction_amount += parseInt($('.scst').val());
		deduction_amount += parseInt($('.ec').val());
		deduction_amount += parseInt($('.vat').val());
		deduction_amount += parseInt($('.lwf').val());
	  $('.deduction_amt').val(deduction_amount);
	  $('.total_amt').val(workdone_amount - deduction_amount);
	});
	$('.steel').focusout(function(){
		var deduction_amount = 0;
		var workdone_amount = parseInt($('.workdone_amt').val());
		deduction_amount += parseInt($('.cement').val());
		deduction_amount += parseInt($('.steel').val());
		deduction_amount += parseInt($('.door').val());
		deduction_amount += parseInt($('.windows').val());
		deduction_amount += parseInt($('.toilet_basin').val());
		deduction_amount += parseInt($('.emd').val());
		deduction_amount += parseInt($('.it').val());
		deduction_amount += parseInt($('.scst').val());
		deduction_amount += parseInt($('.ec').val());
		deduction_amount += parseInt($('.vat').val());
		deduction_amount += parseInt($('.lwf').val());
	  $('.deduction_amt').val(deduction_amount);
	  $('.total_amt').val(workdone_amount - deduction_amount);
	});
	$('.door').focusout(function(){
		var deduction_amount = 0;
		var workdone_amount = parseInt($('.workdone_amt').val());
		deduction_amount += parseInt($('.cement').val());
		deduction_amount += parseInt($('.steel').val());
		deduction_amount += parseInt($('.door').val());
		deduction_amount += parseInt($('.windows').val());
		deduction_amount += parseInt($('.toilet_basin').val());
		deduction_amount += parseInt($('.emd').val());
		deduction_amount += parseInt($('.it').val());
		deduction_amount += parseInt($('.scst').val());
		deduction_amount += parseInt($('.ec').val());
		deduction_amount += parseInt($('.vat').val());
		deduction_amount += parseInt($('.lwf').val());
	  $('.deduction_amt').val(deduction_amount);
	  $('.total_amt').val(workdone_amount - deduction_amount);
	});
	$('.windows').focusout(function(){
		var deduction_amount = 0;
		var workdone_amount = parseInt($('.workdone_amt').val());
		deduction_amount += parseInt($('.cement').val());
		deduction_amount += parseInt($('.steel').val());
		deduction_amount += parseInt($('.door').val());
		deduction_amount += parseInt($('.windows').val());
		deduction_amount += parseInt($('.toilet_basin').val());
		deduction_amount += parseInt($('.emd').val());
		deduction_amount += parseInt($('.it').val());
		deduction_amount += parseInt($('.scst').val());
		deduction_amount += parseInt($('.ec').val());
		deduction_amount += parseInt($('.vat').val());
		deduction_amount += parseInt($('.lwf').val());
	  $('.deduction_amt').val(deduction_amount);
	  $('.total_amt').val(workdone_amount - deduction_amount);
	});
	$('.toilet_basin').focusout(function(){
		var deduction_amount = 0;
		var workdone_amount = parseInt($('.workdone_amt').val());
		deduction_amount += parseInt($('.cement').val());
		deduction_amount += parseInt($('.steel').val());
		deduction_amount += parseInt($('.door').val());
		deduction_amount += parseInt($('.windows').val());
		deduction_amount += parseInt($('.toilet_basin').val());
		deduction_amount += parseInt($('.emd').val());
		deduction_amount += parseInt($('.it').val());
		deduction_amount += parseInt($('.scst').val());
		deduction_amount += parseInt($('.ec').val());
		deduction_amount += parseInt($('.vat').val());
		deduction_amount += parseInt($('.lwf').val());
	  $('.deduction_amt').val(deduction_amount);
	  $('.total_amt').val(workdone_amount - deduction_amount);
	});
});
</script>
