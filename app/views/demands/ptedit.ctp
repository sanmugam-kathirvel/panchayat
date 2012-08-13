<h2>தொழில் வரி கேட்பு விபரங்களைத் திருத்து</h2>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('PtDemand', array( 'url' => array('controller' => 'demands', 'action' => 'ptedit', $this->data['PtDemand']['id'])));
	echo $form->input('id');
	echo $form->input('demand_number', array('label' => 'கேட்பு எண்'));
	echo $form->input('demand_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('door_number', array('label' => 'கதவு எண்'));
	echo $form->input('name', array('label' => 'பெயர்'));
	echo $form->input('father_name', array('label' => 'தந்தை பெயர்'));
	echo $form->input('address', array('label' => 'முகவரி'));
	echo $form->input('hamlet_id', array('type' => 'select','options'=> $hamlet_info, 'label' => 'குக்கிராமத்தின் குறியீடு'));
	echo $form->input('company_name', array('class' => 'company_name', 'label' => 'நிறுவனத்தின் பெயர்'));
	echo $form->input('half_yearly_income', array('class' => 'half_yearly_income', 'label' => 'அரையாண்டு வருமானம்'));
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>நிலுவை</td>";
			echo "<td>நடப்பு</td>";
		echo "</tr><tr>";
			echo "<td><label>பாகம் I கேட்புத் தொகை</label></td>";
			echo '<td>'.$form->input('part1_pending', array('label' => false, 'class' => 'small part1_pending')).'</td>';
			echo '<td>'.$form->input('part1_current', array('label' => false, 'class' => 'small part1_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td><label>பாகம் II கேட்புத் தொகை</label></td>";
			echo '<td>'.$form->input('part2_pending', array('label' => false, 'class' => 'small part2_pending')).'</td>';
			echo '<td>'.$form->input('part2_current', array('label' => false, 'class' => 'small part2_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo $form->end('அனுப்பு');
?>
