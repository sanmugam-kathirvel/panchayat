<p><h3><?php __('Edit Account-'.$this->data['ContractBillEstimation']['account_id'].' Bill Estimation'); ?></h3></p>
<?php
	echo $form->create('ContractBillEstimation', array( 'url' => array('controller' => 'bills', 'action' => 'edit')));
	echo $form->input('id');
	echo $form->input('account_id', array('type' => 'hidden'));
	echo $form->input('bill_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('cheque_date', array('id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('cheque_number');
	echo $form->input('voucher_number');
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
	echo $form->input('emd', array('class' => 'emd','label' => 'EMD 5%'));
	echo $form->input('it', array('class' => 'it','label' => 'IT 2%'));
	echo $form->input('scst', array('class' => 'scst','label' => 'SC on ST 10%'));
	echo $form->input('ec', array('class' => 'ec','label' => 'EC 3%'));
	echo $form->input('vat', array('class' => 'vat','label' => 'Vat 4%'));
	echo $form->input('lwf', array('class' => 'lwf','label' => 'LWF 3%'));
	echo $form->input('deduction_amt', array('class' => 'deduction_amt', 'readonly' => 'readonly'));
	echo $form->input('cheque_amt', array('class' => 'total_amt', 'readonly' => 'readonly'));
	echo $form->end('Submit');
?>

<script>
$(document).ready(function(){
	$('.workdone_amt').focusout(function(){
		var deduction_amount = 0;
	  var workdone_amount = 0;
	  if($('.workdone_amt').val() == ''){
			$('.workdone_amt').val('0');
		}else{
			workdone_amount = parseInt($('.workdone_amt').val());
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
		  if(parseInt($('.cement').val()) >= 0){
			  deduction_amount += parseInt($('.cement').val());
			}
			if(parseInt($('.steel').val()) >= 0){
				deduction_amount += parseInt($('.steel').val());
			}
			if(parseInt($('.door').val()) >= 0){
				deduction_amount += parseInt($('.door').val());
			}
			if(parseInt($('.windows').val()) >= 0){
				deduction_amount += parseInt($('.windows').val());
			}
			if(parseInt($('.toilet_basin').val()) >= 0){
				deduction_amount += parseInt($('.toilet_basin').val());
			}
		  $('.deduction_amt').val(deduction_amount);
		  $('.total_amt').val(workdone_amount - deduction_amount);
		}
	});
	
	$('.cement, .steel, .door, .windows, .toilet_basin, .emd, .it, .scst, .ec, .vat, .lwf').focusout(function(){
		if($('.cement').val() == ''){
			$('.cement').val('0');
		}
		if($('.steel').val() == ''){
			$('.steel').val('0');
		}
		if($('.door').val() == ''){
			$('.door').val('0');
		}
		if($('.windows').val() == ''){
			$('.windows').val('0');
		}
		if($('.toilet_basin').val() == ''){
			$('.toilet_basin').val('0');
		}
		if($('.end').val() == ''){
			$('.end').val('0');
		}
		if($('.it').val() == ''){
			$('.it').val('0');
		}
		if($('.scst').val() == ''){
			$('.scst').val('0');
		}
		if($('.ec').val() == ''){
			$('.ec').val('0');
		}
		if($('.vat').val() == ''){
			$('.vat').val('0');
		}
		if($('.lwf').val() == ''){
			$('.lwf').val('0');
		}
		var deduction_amount = 0;
		var workdone_amount = parseInt($('.workdone_amt').val());
		if(parseInt($('.cement').val()) >= 0){
			  deduction_amount += parseInt($('.cement').val());
		}
		if(parseInt($('.steel').val()) >= 0){
			deduction_amount += parseInt($('.steel').val());
		}
		if(parseInt($('.door').val()) >= 0){
			deduction_amount += parseInt($('.door').val());
		}
		if(parseInt($('.windows').val()) >= 0){
			deduction_amount += parseInt($('.windows').val());
		}
		if(parseInt($('.toilet_basin').val()) >= 0){
			deduction_amount += parseInt($('.toilet_basin').val());
		}
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