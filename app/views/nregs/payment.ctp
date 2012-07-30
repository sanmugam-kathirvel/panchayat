<h2>ஊதியம் வழங்குதல்</h2>
<?php
  echo $form->create('Payment', array( 'url' => array('controller' => 'nregs', 'action' => 'payment')));
  //echo $form->input('workdetail_id', array('class' => 'workdetail','type' => 'text'));
  echo $form->hidden('attendance_register_id', array('value' => $attendance[0]['AttendanceRegister']['id']));
  echo $form->input('from_date', array('label' => 'ஆரம்ப தேதி', 'id' => 'datepick', 'type' => 'text', 'value' => $attendance[0]['AttendanceRegister']['from_date'], 'readonly' => 'readonly'));
  echo $form->input('to_date', array('label' => 'இருதி தேதி', 'id' => 'datepick', 'type' => 'text', 'value' => $attendance[0]['AttendanceRegister']['to_date'], 'readonly' => 'readonly'));
  echo $form->input('total_employee', array('class' => 'total_employee', 'label' =>'மொத்த ஊழியர்கள்', 'value' => $attendance[0]['Attendance'][0]['Attendance'][0]['no_of_days_worked'], 'readonly' => 'readonly'));
  echo $form->input('amount_per_head', array('label' => 'ஒருவருக்கான ஊதியத் தொகை', 'class' => 'amount_per_head'));
  echo $form->input('amount_paid', array('label' => 'மொத்த ஊதியத் தொகை', 'class' => 'total_amount', 'readonly' => 'readonly'));
  echo $form->hidden('payment_status', array('value' => 'yes'));
  echo $form->end('அனுப்பு');
?>
<script>
  $('.amount_per_head').blur(function(){
    if($(this).val() == ''){
      $(this).val(0);
    }
    var amount_per_head = parseInt($(this).val());
    var total_employee = parseInt($('.total_employee').val());
    $('.total_amount').val(amount_per_head * total_employee);
  });
</script>