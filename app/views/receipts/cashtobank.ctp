<p>Transfer Cash To Bank</p>
<?php
	echo $form->create('CashToBank', array( 'url' => array('controller' => 'receipts', 'action' => 'cashtobank')));
	echo $form->input('bank_detail_id', array('type' => 'hidden', 'value' => $bankid));
	echo $form->input('transfer_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('transfer_amount');
	echo $form->input('avail_cash_bals', array('value' => $cashbals, 'label' => 'Available cash balance is Rs.', 'disabled' => true));
	echo $form->end('Submit');
?>