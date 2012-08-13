<h2>ஊதியம்</h2>
<?php
  $employee_name = array();
	$employee_designation = array();
	foreach($employees as $employee){
		$employee_name[$employee['Employee']['name']] =  $employee['Employee']['name'];
		$employee_designation[$employee['Employee']['designation']] =  $employee['Employee']['designation'];
	}
	echo $form->create('Salary', array( 'url' => array('controller' => 'salaries', 'action' => 'salary')));
	echo $form->input('salary_date', array('label' => 'தேதி', 'type' => 'text', 'id' => 'datepicker'));
	echo $form->input('drawee_name', array('label' => 'காசோலைக்குரியவர் பெயர்'));
	echo $form->input('voucher_number', array('label' => 'செலவுச் சீட்டு எண்'));
	echo $form->input('cheque_number', array('label' => 'காசோலை எண்'));
	echo $form->input('cheque_date', array('label' => 'காசோலை வழங்கிய தேதி', 'type' => 'text', 'id' => 'datepicker1'));
	echo $form->input('cheque_amount', array('value' => 0, 'label' => 'மொத்த தொகை', 'class' => 'cheque_amount', 'readonly' => 'readonly'));
	//echo "<div class = 'submit'><input type = 'submit' value = 'அனுப்பு'></div>";
	echo $form->submit('அனுப்பு');
	echo "<div class='new_field salary'>";
		echo "<table>";
			echo "<tbody class= 'add_new_field'>";
					echo "<tr>";
						echo "<th>ஊழியரின் பெயர்</th>";
						echo "<th>ஊழியரின் பதவி</th>";
						echo "<th>ஊதியம்</th>";
					echo "</tr>";
					for($i = 0; $i < 20 ; $i++){
					  echo "<tr id ='new_field' class='new_field_".$i."'>";
							echo '<td>'.$form->input('EmployeeSalary.'.$i.'.employee_name', array('options' => $employee_name, 'label' => false, 'empty' => true)).'</td>';
							echo '<td>'.$form->input('EmployeeSalary.'.$i.'.employee_designation', array('options' => $employee_designation, 'label' => false, 'class' => 'employee_designation', 'empty' => true)).'</td>';
							echo '<td>'.$form->input('EmployeeSalary.'.$i.'.employee_pay', array('label' => false, 'class' => 'small employee_pay', 'value' => 0, 'id' => 'employee_pay')).'</td>';
						echo "</tr>";
					}	
			echo "</tbody>";
		echo "</table>";
		echo "</div>";
	echo "<div class='link salary'>";	
		echo $html->link('புதிதாக சேர்', '', array('class' => 'add_field'));
		echo " | ";
		echo $html->link('நீக்கு', '', array('class' => 'remove_field'));
	echo "</div>";
	echo $form->end();
?>

<script>
$(document).ready(function(){
	$('tr#new_field').hide();
	$('tr#new_field.new_field_0').show();
	var $i = 1;
	$('.add_field').click(function(){
		$('tr#new_field.new_field_'+$i).show();
		$i = $i +1;
		return false;
	});
	$('.remove_field').click(function(){
		$i = $i -1;
		$('tr#new_field.new_field_'+$i).hide();
		grand_total = 0;
		grand_total = parseInt($('.cheque_amount').val()) - parseInt($('tr#new_field.new_field_'+$i).find('.employee_pay').val());
		$('.cheque_amount').val(grand_total);
		$('tr#new_field.new_field_'+$i).find('.employee_pay').val(0);
		$('tr#new_field.new_field_0').show();
		return false;
	});
	//calculation
	$('.employee_pay').focusout(function() {
		grand_total = 0;
		flag = 0;
		$('div.new_field div.input').children('#employee_pay').each(function(){
			if(parseInt($(this).val()) > 0){
				flag = 1;
				grand_total += parseInt($(this).val());
				$('.cheque_amount').val(grand_total);
			}
		});
		if(flag == 0){
			$('.cheque_amount').val(0);
		}
	});
});
</script>


