<div class="blocks form">
    <h2><?php __('View Scrap Details'); ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('Back to Scrap Register', true), array('action' => 'index')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0" align="center">
    		<tr>
    			<td>Scrap Detail</td>
    			<td><?php echo $this->data['Scrap']['scrap_detail']; ?></td>
    		</tr>
    		<tr>
    			<td>Quantity</td>
    			<td><?php echo $this->data['Scrap']['quantity']; ?></td>
    		</tr>
    		<tr>
    			<td>Estimation Date</td>
    			<td><?php echo $this->data['Scrap']['estimation_date']?></td>
    		</tr>
    		<tr>
    			<td>Estimation Amount</td>
    			<td><?php echo $this->data['Scrap']['estimation_amount']?></td>
    		</tr>
    		<tr>
    			<td>Tender Date</td>
    			<td><?php echo $this->data['Scrap']['tender_date']?></td>
    		</tr>
    		<tr>
    			<td>Tender Amount</td>
    			<td><?php echo $this->data['Scrap']['tender_amount']?></td>
    		</tr>
    		<tr>
    			<td>Tender Confirmation Date</td>
    			<td><?php echo $this->data['Scrap']['tender_confirmation_date']?></td>
    		</tr>
    		<tr>
    			<td>Tender Confirmation Amount</td>
    			<td><?php echo $this->data['Scrap']['tender_confirmation_amount']?></td>
    		</tr>
    		<tr>
    			<td>Tender Taken By</td>
    			<td><?php echo $this->data['Scrap']['tender_taken_by']?></td>
    		</tr>
    </table>
</div>
