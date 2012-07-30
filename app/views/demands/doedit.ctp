<h2>டி & ஓ வியாபாரிகளின் கேட்பு விபரங்களைத் திருத்து</h2>
<?php
	echo $form->create('DoDemand', array( 'url' => array('controller' => 'demands', 'action' => 'doedit')));
	echo $form->input('id');
	echo $form->input('demand_number', array('label' => 'கேட்பு எண்'));
	echo $form->input('demand_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('name', array('label' => 'பெயர்'));
	echo $form->input('father_name', array('label' => 'தந்தையின் பெயர்'));
	echo $form->input('address', array('label' => 'முகவரி'));
	echo $form->input('emd', array('label' => 'வைப்புத் தொகை'));
	echo "<div class='input inline'>";
		echo "<table><tr>";
			echo "<td></td>";
			echo "<td>நிலுவை</td>";
			echo "<td>நடப்பு</td>";
		echo "</tr><tr>";
			echo "<td><label>டி & ஓ வியாபாரிகளின் கேட்புத் தொகை</label></td>";
			echo '<td>'.$form->input('do_pending', array('label' => false, 'class' => 'small do_pending')).'</td>';
			echo '<td>'.$form->input('do_current', array('label' => false, 'class' => 'small do_current')).'</td>';
		echo '</tr></table>';
	echo '</div>';
	echo $form->end('அனுப்பு');
?>
