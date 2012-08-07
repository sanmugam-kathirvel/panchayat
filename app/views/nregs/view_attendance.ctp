<div class="blocks form">
	<h2><?php echo 'பணம் வழங்கிய விபரம்'; ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('வருகைப் பதிவேடு பக்கத்திற்கு திரும்பிச் செல்', true), array('action' => 'attendance_index')); ?></li>
		</ul>
	</div>
	<table>
		<tr>
			<td align="right">ஆரம்ப தேதி</td>
			<td><?php echo $this->data['AttendanceRegister']['from_date']; ?></td>
		</tr>
		<tr>
			<td>இருதி தேதி</td>
			<td><?php echo $this->data['AttendanceRegister']['to_date']; ?></td>
		</tr>
		<tr>
			<td>AS எண்</td>
			<td><?php echo $this->data['Workdetail']['as_number']?></td>
		</tr>
		<tr>
			<td>வேலையின் பெயர்</td>
			<td><?php echo $this->data['Workdetail']['name_of_work']?></td>
		</tr>
		<tr>
			<td>மதிப்பீடு செய்யப்பட்ட தொகை</td>
			<td><?php echo $this->data['Workdetail']['estimation_amount']?></td>
		</tr>
		<tr>
			<?php
				if($this->data['AttendanceRegister']['payment_status'] == 'yes'){
					echo "\n\t\t\t<td>ஒருவருக்கான ஊதியத் தொகை</td>";
					echo "\n\t\t\t<td>".$this->data['AttendanceRegister']['amount_per_head']."</td>";
					echo "\n\t\t</tr>\n\t\t<tr>";
					echo "\n\t\t\t<td>மொத்த ஊதியத் தொகை</td>";
					echo "\n\t\t\t<td>".$this->data['AttendanceRegister']['amount_paid']."</td>\n";
				}
			?>
		</tr>
	</table>
	<br><br>
	<table>
		<tr>
			<th>குடும்ப எண்</th>
			<th>வேலை அடையாள அட்டை எண்</th>
			<th>பெயர்</th>
			<th>தந்தை / கணவர் பெயர்</th>
			<th>வேலை செய்த நாட்களின் எண்ணிக்கை</th>
			<?php
				if($this->data['AttendanceRegister']['payment_status'] == 'yes'){
					echo "\n\t\t\t<th>ஊதியத் தொகை</th>\n";
				}
			?>
		</tr>
		<?php
			foreach($workers as $worker){
				echo "\n\t\t<tr>";
				echo "\n\t\t\t<td>". $worker['family_number']."</td>";
				echo "\n\t\t\t<td>". $worker['job_card_number']."</td>";
				echo "\n\t\t\t<td>". $worker['name']."</td>";
				echo "\n\t\t\t<td>". $worker['father_or_husband_name']."</td>";
				echo "\n\t\t\t<td>". $worker['no_of_days_worked']."</td>";
				if($this->data['AttendanceRegister']['payment_status'] == 'yes'){
					echo "\n\t\t\t<td>".((double)$worker['no_of_days_worked'] * (double)$this->data['AttendanceRegister']['amount_per_head'])."</td>\n";
				}
				echo "\n\t\t</tr>";
			}
			echo "\n";
		?>
	</table>
</div>
