<div class="blocks form">
    <h2><?php echo 'கழிவுகளின் விபரம்'; ?></h2>
    <div class="actions">
        <ul>
            <li><?php echo $html->link(__('கழிவுகளின் பதிவேடு பக்கத்திற்கு திரும்பிச் செல்', true), array('action' => 'index')); ?></li>
        </ul>
    </div>
    <table cellpadding="0" cellspacing="0" align="center">
    		<tr>
    			<td>கழிவுகளின் விபரம்</td>
    			<td><?php echo $this->data['Scrap']['scrap_detail']; ?></td>
    		</tr>
    		<tr>
    			<td>அளவு</td>
    			<td><?php echo $this->data['Scrap']['quantity']; ?></td>
    		</tr>
    		<tr>
    			<td>மத்திப்பீடு செய்த தேதி</td>
    			<td><?php echo $this->data['Scrap']['estimation_date']?></td>
    		</tr>
    		<tr>
    			<td>மத்திப்பீடு செய்த தொகை</td>
    			<td><?php echo $this->data['Scrap']['estimation_amount']?></td>
    		</tr>
    		<tr>
    			<td>ஏலம் விடப்பட்ட தேதி</td>
    			<td><?php echo $this->data['Scrap']['tender_date']?></td>
    		</tr>
    		<tr>
    			<td>ஏலத் தொகை</td>
    			<td><?php echo $this->data['Scrap']['tender_amount']?></td>
    		</tr>
    		<tr>
    			<td>ஏலம் உருதி செய்யப்பட்ட தேதி</td>
    			<td><?php echo $this->data['Scrap']['tender_confirmation_date']?></td>
    		</tr>
    		<tr>
    			<td>உருதி செய்யப்பட்ட ஏலத் தொகை</td>
    			<td><?php echo $this->data['Scrap']['tender_confirmation_amount']?></td>
    		</tr>
    		<tr>
    			<td>ஏலம் எடுத்தவரின் பெயர்</td>
    			<td><?php echo $this->data['Scrap']['tender_taken_by']?></td>
    		</tr>
    </table>
</div>
