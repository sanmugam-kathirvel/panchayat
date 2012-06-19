<p><h3><?php __('Account-'.$this->data['Income']['account_id'].' Income'); ?></h3></p>
<?php
	$account_op = array();
	$header_op = array();
	foreach($header as $head){
		$header_op[$head['Header']['id']] =  $head['Header']['header_name'];
	}
	echo $form->create('Income', array( 'url' => array('controller' => 'incomes', 'action' => 'edit')));
	echo $form->input('id');
	echo $form->input('account_id', array('type' => 'hidden'));
	echo $form->input('header_id', array('label' => 'Header', 'type' => 'select', 'options' => $header_op));
	echo $form->input('income_date', array('label' => 'Date', 'id' => 'datepicker', 'type' => 'text'));
	echo $form->input('income_amount', array('label' => 'Amount'));
	echo $form->input('description');
	echo $form->end('Submit');
?>