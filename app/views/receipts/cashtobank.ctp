<h2>ரொக்கத் தொகையை வங்கி கணக்கிற்கு மாற்று</h2>
<?php
	echo $form->create('CashToBank', array( 'url' => array('controller' => 'receipts', 'action' => 'cashtobank')));
	echo $form->input('bank_detail_id', array('type' => 'hidden', 'value' => $bankid));
	echo $form->input('transfer_date', array('label' => 'தேதி', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('transfer_amount', array('label' => 'வங்கிக் கணக்கிற்கு மாற்றவிருக்கும் தொகை'));
	echo $form->input('avail_cash_bals', array('value' => $cashbals, 'label' => 'கையில் உள்ள ரொக்கத் தொகை', 'disabled' => true));
	echo $form->end('அனுப்பு');
?>