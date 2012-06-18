<p>Salary</p>
<?php
	echo $form->create('Salary', array( 'url' => array('controller' => 'salaries', 'action' => 'salary')));
	echo $form->input('salary_date', array('type' => 'text', 'id' => 'datepicker'));
	echo $form->input('drawee_name');
	echo $form->input('voucher_number');
	echo $form->input('cheque_number');
	echo $form->input('cheque_date', array('type' => 'text', 'id' => 'datepicker1'));
	echo $form->input('cheque_amount');
	echo $form->input('EmployeeSalary.0.employee_name');
	echo $form->input('EmployeeSalary.0.employee_designation');
	echo $form->input('EmployeeSalary.0.employee_pay');
	echo $html->link('add new', '', array('class' => 'add_field'));
	echo $html->link('remove', '', array('class' => 'remove_field'));
	echo $form->end('Submit');
?>
<script>
		var i=1;
		$('a.add_field').click(function(){
		 	var new_field = "<div id='new_field_"+i+"'>";
		 	 new_field += "<div class='input text'><label for='EmployeeSalary"+i+"EmployeeName'>Employee Name</label><input name='data[EmployeeSalary]["+i+"][employee_name]' type='text' maxlength='50' id='EmployeeSalary"+i+"EmployeeName'></div>";
       new_field += "<div class='input text'><label for='EmployeeSalary"+i+"EmployeeDesignation'>Employee Designation</label><input name='data[EmployeeSalary]["+i+"][employee_designation]' type='text' maxlength='50' id='EmployeeSalary"+i+"EmployeeDesignation'></div>";
       new_field += "<div class='input text'><label for='EmployeeSalary"+i+"EmployeePay'>Employee Pay</label><input name='data[EmployeeSalary]["+i+"][employee_pay]' type='text' maxlength='20' id='EmployeeSalary"+i+"EmployeePay'></div>";
       new_field += "</div>";
       if(i == 1){
       	 $('a.remove_field').css({'display':'block'});
       }
       $(this).before(new_field);
       i++;
       return false;
    });
    $('a.remove_field').click(function(){
    	$('#new_field_'+(i-1)).remove();
    	i=i-1;
    	return false;
    });
</script>
