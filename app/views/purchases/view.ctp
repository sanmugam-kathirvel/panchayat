<div class="blocks form">
	<h2><?php echo 'கொள்முதல் விபரம்'; ?></h2>
	<div class="actions">
		<ul>
			<li><?php echo $html->link(__('திரும்பிச் செல்', true), array('action' => 'index')); ?></li>
		</ul>
	</div>
	<table>
		<tr>
			<td align="right">வாங்கிய தேதி</td>
			<td><?php echo $this->data['purchase_date']; ?></td>
		</tr>
		<tr>
			<td>நிறுவனத்தின் பெயர்</td>
			<td><?php echo $this->data['company_name']; ?></td>
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
			<td>வரித் தொகை</td>
			<td><?php echo $this->data['tax_amount']?></td>
		</tr>
		<tr>
			<td>மொத்தத் தொகை</td>
			<td><?php echo $this->data['total_amt']?></td>
		</tr>
	</table>
	<br><br>
	<table>
		<tr>
			<th>பொருளின் விபரம்</th>
			<th>பொருளின் அளவு</th>
			<th>ஒன்றின் விலை</th>
			<th>மொத்த விலை</th>
		</tr>
		<?php
			foreach($items as $item){
				echo "\n\t\t<tr>";
				echo "\n\t\t\t<td>".$item['Stock']['item_name'];
				if($item['Stock']['description'] != "")
					echo " - ".$item['Stock']['description'];
				echo "</td>";
				echo "\n\t\t\t<td>".$item['PurchaseItem']['item_quantity']."</td>";
				echo "\n\t\t\t<td>".$item['PurchaseItem']['item_rate']."</td>";
				echo "\n\t\t\t<td>".$item['PurchaseItem']['item_tot_amount']."</td>";
				echo "\n\t\t</tr>";
			}
			echo "\n";
		?>
	</table>
</div>
