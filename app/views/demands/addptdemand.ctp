<p>Add Professional Tax Demand</p>
<?php
	$hamlet_info = array();
	foreach($hamlet as $ham){
		$hamlet_info[$ham['Hamlet']['id']] =  $ham['Hamlet']['hamlet_code'];
	}
	echo $form->create('PtDemand', array( 'url' => array('controller' => 'demands', 'action' => 'addptdemand')));
	echo $form->input('demand_number');
	echo $form->input('demand_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('door_number');
	echo $form->input('name');
	echo $form->input('father_name');
	echo $form->input('address');
	echo $form->input('hamlet_id', array('type' => 'select','options'=> $hamlet_info, 'label' => 'Hamlet Code'));
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>Pending</td>";
			echo "<td>Current</td>";
		echo "</tr><tr>";
			echo "<td><label>Part I Demand</label></td>";
			echo '<td>'.$form->input('part1_pending', array('label' => false, 'class' => 'small part1_pending')).'</td>';
			echo '<td>'.$form->input('part1_current', array('label' => false, 'class' => 'small part1_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>Pending</td>";
			echo "<td>Current</td>";
		echo "</tr><tr>";
			echo "<td><label>Part II Demand</label></td>";
			echo '<td>'.$form->input('part2_pending', array('label' => false, 'class' => 'small part2_pending')).'</td>';
			echo '<td>'.$form->input('part2_current', array('label' => false, 'class' => 'small part2_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo $form->end('Submit');
?>
