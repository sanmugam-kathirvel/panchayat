<p>Attendance</p>

<?php
	$work_detail_op = array();
	foreach($work_details as $work_detail){
		$work_detail_op[$work_detail['Workdetail']['id']] =  $work_detail['Workdetail']['name_of_work'];
	}
	echo $form->create('AttendanceRegister', array( 'url' => array('controller' => 'nregs', 'action' => 'attendance')));
	echo $form->input('workdetail_id', array('class' => 'workdetail','type' => 'select', 'options' => $work_detail_op));
	echo $form->input('date', array('id' => 'datepicker', 'type' => 'text'));
	
	echo "<div class='new_field'>";
		echo "<table>";
			echo "<tbody class= 'add_new_field'>";
					echo "<tr>";
						echo "<th>family Id</th>";
						echo "<th>Job Card Number</th>";
						echo "<th>Name</th>";
						echo "<th>Father/Husband Name</th>";
					echo "</tr>";
					  echo "<tr id ='new_field' class='new_field_0'>";
							echo '<td>'.$form->input('Attendance.0.family_number', array('class' => 'family_number', 'label' => false)).'</td>';
							echo '<td>'.$form->input('Attendance.0.job_card_number', array('label' => false, 'class' => 'job_card_number')).'</td>';
							echo '<td>'.$form->input('Attendance.0.name', array('label' => false, 'class' => 'name', 'readonly' =>'readonly')).'</td>';
							echo '<td>'.$form->input('Attendance.0.father_or_husband_name', array('label' => false, 'class' => 'father_or_husband_name', 'readonly' => 'readonly')).'</td>';
						echo "</tr>";
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
		var i=1;
		$('a.add_field').click(function(){
		 	var new_field = "<tr class ='new_field' id='new_field_"+i+"'>";
		 	new_field += "<td><div class='input text'><input name='data[Attendance]["+i+"][family_number]' type='text' class='family_number' maxlength='20' id='Attendance"+i+"FamilyNumber'></div></td>";
		 	 new_field += "<td><div class='input text'><input name='data[Attendance]["+i+"][job_card_number]' type='text' class='job_card_number' id='Attendance"+i+"JobCardNumber'></div></td>";
       new_field += "<td><div class='input text'><input name='data[Attendance]["+i+"][name]' type='text' class='name' readonly='readonly' id='Attendance"+i+"Name'></div></td>";
       new_field += "<td><div class='input text'><input name='data[Attendance]["+i+"][father_or_husband_name]' type='text' class='father_or_husband_name' readonly='readonly' id='Attendance"+i+"FatherOrHusbandName'></div></div>";
       new_field += "</tr>";
       
       $('.add_new_field').append(new_field);
       $('.job_card_number').focusout(function(){
       	 var this_data = $(this);
		  	 var jobcard_no = $(this).val();
				   $.ajax({
				  	type: 'POST',
				  	url: Webroot+"/nregs/autofill_attendance/",
				  	data: {'jobcard_no':jobcard_no},
				  	success: function(data){
				  		output=JSON.parse(data);
				  		if(output){
				  			$(this_data).parent().parent().next().find('.name').val(output.NregsRegistration.name);
				  			$(this_data).parent().parent().next().next().find('.father_or_husband_name').val(output.NregsRegistration.father_or_husband_name);
				  		}else{
				  			alert('Please choose valid Jobcard number');
				  			$(this_data).parent().parent().next().find('.name').val('');
				  			$(this_data).parent().parent().next().next().find('.father_or_husband_name').val('');
				  			$(this_data).val('');
				  			$(this_data).focus();
				  		}
				  	}
				  });
				});
       i++;
       return false;
    });
    $('a.remove_field').click(function(){
    	$('#new_field_'+(i-1)).remove();
    	i=i-1;
    	return false;
    });
    
    $('.job_card_number').focusout(function(){
		  var jobcard_no = $(this).val();
		  var this_data = $(this);
		  $.ajax({
		  	type: 'POST',
		  	url: Webroot+"/nregs/autofill_attendance/",
		  	data: {'jobcard_no':jobcard_no},
		  	success: function(data){
		  		output=JSON.parse(data);
		  		if(output){
		  			$(this_data).parent().parent().next().find('.name').val(output.NregsRegistration.name);
		  			$(this_data).parent().parent().next().next().find('.father_or_husband_name').val(output.NregsRegistration.father_or_husband_name);
		  		}else{
		  			alert('Please choose valid Jobcard number');
		  			$(this_data).parent().parent().next().find('.name').val('');
		  			$(this_data).parent().parent().next().next().find('.father_or_husband_name').val('');
		  			$(this_data).val('');
		  			$(this_data).focus();
		  		}
		  	}
		  });
		});
    
</script>
