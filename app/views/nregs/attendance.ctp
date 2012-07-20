<p>Attendance</p>

<?php
	echo $form->create('AttendanceRegister', array( 'url' => array('controller' => 'nregs', 'action' => 'attendance')));
	echo $form->input('workdetail_id', array('class' => 'workdetail','type' => 'select', 'options' => $work_details));
	echo $form->input('from_date', array('id' => 'datepicker', 'type' => 'text'));
  echo $form->input('to_date', array('id' => 'datepicker1', 'type' => 'text'));
	echo $form->hidden('payment_status', array('value' => 'no'));
	echo "<div class='new_field'>";
		echo "<table>";
			echo "<tbody class= 'add_new_field'>";
					echo "<tr>";
						echo "<th>family Id</th>";
						echo "<th>Job Card Number</th>";
						echo "<th>Name</th>";
						echo "<th>Father/Husband Name</th>";
            echo "<th>No.of Days Worked</th>";
					echo "</tr>";
					  echo "<tr id ='new_field' class='new_field_0'>";
							echo '<td>'.$form->input('Attendance.0.family_number', array('class' => 'family_number', 'label' => false)).'</td>';
							echo '<td>'.$form->input('Attendance.0.job_card_number', array('type' => 'select', 'label' => false, 'class' => 'job_card_number','empty' => true)).'</td>';
							echo '<td>'.$form->input('Attendance.0.name', array('label' => false, 'class' => 'name', 'readonly' =>'readonly')).'</td>';
							echo '<td>'.$form->input('Attendance.0.father_or_husband_name', array('label' => false, 'class' => 'father_or_husband_name', 'readonly' => 'readonly')).'</td>';
              echo '<td>'.$form->input('Attendance.0.no_of_days_worked', array('label' => false, 'class' => 'no_of_working_days')).'</td>';
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
		 	new_field += "<td><div class='input select'><select name='data[Attendance]["+i+"][job_card_number]' class='job_card_number' id='Attendance"+i+"JobCardNumber'><option value=''></option></select></div></td>";
      new_field += "<td><div class='input text'><input name='data[Attendance]["+i+"][name]' type='text' class='name' readonly='readonly' id='Attendance"+i+"Name'></div></td>";
      new_field += "<td><div class='input text'><input name='data[Attendance]["+i+"][father_or_husband_name]' type='text' class='father_or_husband_name' readonly='readonly' id='Attendance"+i+"FatherOrHusbandName'></div></td>";
      new_field += "<td><div class='input text'><input name='data[Attendance]["+i+"][no_of_days_worked]' type='text' class='no_of_working_days' id='Attendance"+i+"NoOfDaysWorked'></div></td>";
      new_field += "</tr>";
       
      $('.add_new_field').append(new_field);
      $('.family_number').focusout(function(){
        var family_id = $(this).val();
        var this_data = $(this);
        $.ajax({
          type: 'POST',
          url: Webroot+"/nregs/get_jobcard/",
          data: {'family_id': family_id},
          success: function(data){
            output=JSON.parse(data);
            if(output){
               options_html = "<option value></option>";
               for(i=0;i < output.length;i++){
                  options_html += '<option value="'+output[i].NregsRegistration.job_card_number+'">'+output[i].NregsRegistration.job_card_number+'</option>';
               }
               console.log(options_html);
               $(this_data).parent().parent().next().find('.job_card_number').html(options_html);
            }else{
              alert('Please choose valid family number');
            }
          }
        });
      });
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
    $('.family_number').focusout(function(){
		  var family_id = $(this).val();
		  var this_data = $(this);
		  $.ajax({
		  	type: 'POST',
		  	url: Webroot+"/nregs/get_jobcard/",
		  	data: {'family_id': family_id},
		  	success: function(data){
		  		output=JSON.parse(data);
		  		if(output){
		  		   options_html = "<option value></option>";
		  		   for(i=0;i < output.length;i++){
		  		      options_html += '<option value="'+output[i].NregsRegistration.job_card_number+'">'+output[i].NregsRegistration.job_card_number+'</option>';
		  		   }
		  		   console.log(options_html);
		  		   $('.job_card_number').html(options_html);
		  		}else{
		  			alert('Please choose valid family number');
		  		}
		  	}
		  });
		});
		$('.job_card_number').change(function(){
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
            $(this_data).parent().parent().next().next().next().find('.no_of_working_days').focus();
          }else{
            alert('Please choose valid Jobcard number');
          }
        }
      });
    });
    $('.no_of_working_days').focusout(function(){
      var this_data = $(this);
    	var family_id = $(this).parent().parent().prev().prev().prev().prev().find('.family_number').val();
    	var add_no_of_days_worked = $(this).val();
    	$.ajax({
        type: 'POST',
        url: Webroot+"/nregs/hundred_days_check/",
        data: {'family_id':family_id},
        success: function(data){
          output=JSON.parse(data);
          if(output){
            if((parseInt(add_no_of_days_worked) + parseInt(output[0].no_of_days_worked)) > 100){
              alert('This Family Members worked '+output[0].no_of_days_worked+' days');
              $(this_data).val('').focus();
            }
          }else{
            alert('Please choose valid Jobcard number');
          }
        }
      });
    });
</script>
