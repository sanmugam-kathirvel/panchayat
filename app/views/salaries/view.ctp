<div class="blocks form">
	<h2><?php echo 'ஊதியம் வழங்கப்பட்ட விபரம்'; ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('திரும்பிச் செல்', true), array('action' => 'index')); ?></li>
		</ul>
	</div>
	<table>
		<tr>
			<td align="right">தேதி</td>
			<td><?php echo $this->data['salary_date']; ?></td>
		</tr>
		<tr>
			<td>காசோலைக்குரியவரின் பெயர்</td>
			<td><?php echo $this->data['drawee_name']; ?></td>
		</tr>
		<tr>
			<td>செலவுச் சீட்டு எண்</td>
			<td><?php echo $this->data['voucher_number']?></td>
		</tr>
		<tr>
			<td>காசோலை எண்</td>
			<td><?php echo $this->data['cheque_number']?></td>
		</tr>
		<tr>
			<td>காசோலை வழங்கிய தேதி</td>
			<td><?php echo $this->data['cheque_date']?></td>
		</tr>
		<tr>
			<td>காசோலையில் குறிப்பிடப்பட்ட தொகை</td>
			<td><?php echo $this->data['cheque_amount']?></td>
		</tr>
	</table>
	<br><br>
	<table>
		<tr>
			<th>ஊழியரின் பெயர்</th>
			<th>ஊழியரின் பதவி</th>
			<th>ஊதியம்</th>
		</tr>
		<?php
			foreach($items as $item){
				echo "\n\t\t<tr>";
				echo "\n\t\t\t<td>".$item['EmployeeSalary']['employee_name']."</td>";
				echo "\n\t\t\t<td>".$item['EmployeeSalary']['employee_designation']."</td>";
				echo "\n\t\t\t<td>".$item['EmployeeSalary']['employee_pay']."</td>";
				echo "\n\t\t</tr>";
			}
			echo "\n";
		?>
	</table>
</div>
