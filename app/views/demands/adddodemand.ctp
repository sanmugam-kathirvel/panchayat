<p>Add D & O Traders Demand</p>
<?php
	echo $form->create('DoDemand', array( 'url' => array('controller' => 'demands', 'action' => 'adddodemand')));
	echo $form->input('demand_number');
	echo $form->input('demand_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('name');
	echo $form->input('father_name');
	echo $form->input('address');
	echo $form->input('emd');
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>Pending</td>";
			echo "<td>Current</td>";
		echo "</tr><tr>";
			echo "<td><label>D&O Traders Demand</label></td>";
			echo '<td>'.$form->input('do_pending', array('label' => false, 'class' => 'small do_pending')).'</td>';
			echo '<td>'.$form->input('do_current', array('label' => false, 'class' => 'small do_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo $form->end('Submit');
?>
