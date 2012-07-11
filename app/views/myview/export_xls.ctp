<style type="text/css">
	.tableTd {
	   	border-width: 0.5pt; 
		border: solid; 
	}
	.tableTdContent{
		border-width: 0.5pt; 
		border: solid;
	}
	#titles{
		font-weight: bolder;
	}
</style>
<table>
	<tr>
		<td><b>Export To Excel Sample<b></td>
	</tr>
	<tr>
		<td><b>Date:</b></td>
		<td><?php echo date("F j, Y, g:i a"); ?></td>
	</tr>
	<tr>
		<td><b>Number of Rows:</b></td>
		<td style="text-align:left"><?php echo count($rows);?></td>
	</tr>
	<tr>
		<td></td>
	</tr>
		<tr id="titles">
			<td class="tableTd" align="center"><b>Book Name</b></td>
			<td class="tableTd" align="center"><b>Purchase Date</b></td>
			<td class="tableTd" align="center"><b>Company Name</b></td>
			<td class="tableTd" align="center"><b>Book Number</b></td>
			<td class="tableTd" align="center"><b>Start Receipt Number</b></td>
			<td class="tableTd" align="center"><b>End Receipt Number</b></td>
			<td class="tableTd" align="center"><b>Status</b></td>
		</tr>		
		<?php foreach($rows as $row):
			echo '<tr>';
			echo '<td class="tableTdContent">'.$row['Book']['book_name'].'</td>';
			echo '<td class="tableTdContent">'.$row['BookDetail']['purchase_date'].'</td>';
			echo '<td class="tableTdContent">'.$row['BookDetail']['company_name'].'</td>';
			echo '<td class="tableTdContent">'.$row['BookDetail']['book_number'].'</td>';
			echo '<td class="tableTdContent">'.$row['BookDetail']['start_receipt_number'].'</td>';
			echo '<td class="tableTdContent">'.$row['BookDetail']['end_receipt_number'].'</td>';
			echo '<td class="tableTdContent">'.$row['BookDetail']['status'].'</td>';
			echo '</tr>';
			endforeach;
		?>
</table>

