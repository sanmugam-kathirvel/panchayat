<h2>புதிய வீட்டு வரி கேட்பு</h2>
<?php
	echo $form->create('HtDemand', array( 'url' => array('controller' => 'demands', 'action' => 'addhtdemand')));
	echo $form->input('demand_number', array('label' => 'கேட்பு எண்'));
	echo $form->input('demand_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('door_number', array('label' => 'கதவு எண்'));
	echo $form->input('name', array('label' => 'பெயர்'));
	echo $form->input('father_name', array('label' => 'தந்தை பெயர்'));
	echo $form->input('address', array('label' => 'முகவரி'));
	echo $form->input('hamlet_id', array('type' => 'select','options'=> $hamlet, 'label' => 'குக்கிராமத்தின் குறியீடு'));
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>நிலுவை</td>";
			echo "<td>நடப்பு</td>";
		echo "</tr><tr>";
			echo "<td><label>வீட்டு வரி</label></td>";
			echo '<td>'.$form->input('ht_pending', array('label' => false, 'class' => 'small')).'</td>';
			echo '<td>'.$form->input('ht_current', array('label' => false, 'class' => 'small')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td><label>நூலக வரி</label></td>";

		echo '<td>'.$form->input('lc_pending', array('label' => false, 'class' => 'small')).'</td>';
		echo '<td>'.$form->input('lc_current', array('label' => false, 'class' => 'small')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo $form->end('அனுப்பு');
?>
