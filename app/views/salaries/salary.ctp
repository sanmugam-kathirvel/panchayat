<p>Salary</p>
<?php
  $stock_list = array();
	echo $form->create('Salary', array( 'url' => array('controller' => 'salaries', 'action' => 'salary')));
	echo $form->input('salary_date', array('type' => 'text', 'id' => 'datepicker'));
	echo $form->input('drawee_name');
	echo $form->input('voucher_number');
	echo $form->input('cheque_number');
	echo $form->input('cheque_date', array('type' => 'text', 'id' => 'datepicker1'));
	echo $form->input('cheque_amount', array('class' => 'cheque_amount', 'readonly' => 'readonly'));
	echo "<div class='new_field'>";
		echo "<table>";
			echo "<tbody class= 'add_new_field'>";
					echo "<tr>";
						echo "<th>Employee Name</th>";
						echo "<th>Employee Designation</th>";
						echo "<th>Salary</th>";
					echo "</tr>";
					for($i = 0; $i < 20 ; $i++){
					  echo "<tr id ='new_field' class='new_field_".$i."'>";
							echo '<td>'.$form->input('EmployeeSalary.'.$i.'.employee_name', array('options' => $stock_list, 'label' => false)).'</td>';
							echo '<td>'.$form->input('EmployeeSalary.'.$i.'.employee_designation', array('label' => false, 'class' => 'quantity')).'</td>';
							echo '<td>'.$form->input('EmployeeSalary.'.$i.'.employee_pay', array('label' => false, 'class' => 'employee_pay', 'value' => 0, 'id' => 'employee_pay')).'</td>';
						echo "</tr>";
					}	
			echo "</tbody>";
		echo "</table>";
		echo "</div>";
	echo "<div class='link'>";	
		echo $html->link('add new', '', array('class' => 'add_field'));
		echo " | ";
		echo $html->link('remove', '', array('class' => 'remove_field'));
	echo "</div>";
	echo $form->end('Submit');
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
		return false;
	});
	//calculation
	$('.employee_pay').focusout(function() {
		grand_total = 0;
		$('div.new_field div.input').children('#employee_pay').each(function(){
			if(parseInt($(this).val()) > 0){
				grand_total += parseInt($(this).val());
				$('.cheque_amount').val(grand_total);
			}
		});
	});
});
</script>


