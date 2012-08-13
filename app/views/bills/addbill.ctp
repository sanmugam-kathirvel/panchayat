<h2><?php __('கணக்கு எண் - '.$acc_id.', புதிய வரைவு மதிப்பீடு விபரங்களைச் சேர்'); ?></h2>
<?php
	echo $form->create('ContractBillEstimation', array( 'url' => array('controller' => 'bills', 'action' => 'addbill')));
	echo $form->input('account_id', array('class' => 'account_id', 'type' => 'hidden', 'value' => $acc_id));
	echo $form->input('bill_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('cheque_date', array('label' => 'காசோலை வழங்கிய தேதி', 'id' => 'datepicker1', 'type' => 'text'));
	echo $form->input('cheque_number', array('label' => 'காசோலை எண்'));
	echo $form->input('voucher_number', array('label' => 'செலவுச் சீட்டு எண்'));
	echo $form->input('contractor_name', array('label' => 'ஒப்பந்தக்காரரின் பெயர்'));
	echo $form->input('address', array('label' => 'முகவரி'));
	echo $form->input('estimation_amt', array('label' => 'மதிப்பிடப்பட்ட தொகை', 'value' => '0'));
	echo $form->input('workdone_amt', array('class' => 'workdone_amt', 'label' => 'செலவிடப்பட்ட தொகை', 'value' => '0'));
	if($acc_id > 1){
		echo $form->input('cement', array('label' => 'சிமெண்ட்', 'class' => 'cement', 'value' => '0'));
		echo $form->input('steel', array('label' => 'இரும்பு', 'class' => 'steel', 'value' => '0'));
		echo $form->input('door', array('label' => 'கதவு', 'class' => 'door', 'value' => '0'));
		echo $form->input('windows', array('label' => 'ஜன்னல்', 'class' => 'windows', 'value' => '0'));
		echo $form->input('toilet_basin', array('label' => 'கழிவறை தொட்டி', 'class' => 'toilet_basin', 'value' => '0'));
	}
	echo $form->input('emd', array('class' => 'emd','label' => 'வைப்புத் தொகை 5%', 'value' => '0'));
	echo $form->input('it', array('class' => 'it','label' => 'வருமாண வரி 2%', 'value' => '0'));
	echo $form->input('scst', array('class' => 'scst','label' => 'SC on ST 10%', 'value' => '0'));
	echo $form->input('ec', array('class' => 'ec','label' => 'EC 3%', 'value' => '0'));
	echo $form->input('vat', array('class' => 'vat','label' => 'Vat 4%', 'value' => '0'));
	echo $form->input('lwf', array('class' => 'lwf','label' => 'LWF 3%', 'value' => '0'));
	echo $form->input('deduction_amt', array('label' => 'கழிவுத் தொகை', 'class' => 'deduction_amt', 'value' => '0', 'readonly' => 'readonly'));
	echo $form->input('cheque_amt', array('label' => 'காசோலைத் தொகை', 'class' => 'total_amt', 'value' => '0', 'readonly' => 'readonly'));
	echo $form->end('அனுப்பு');
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
