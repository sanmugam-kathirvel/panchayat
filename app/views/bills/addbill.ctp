<p><h3><?php __('Add Account-'.$acc_id.' Bill Estimation'); ?></h3></p>
<?php
	echo $form->create('ContractBillEstimation', array( 'url' => array('controller' => 'bills', 'action' => 'addbill')));
	echo $form->input('account_id', array('type' => 'hidden', 'value' => $acc_id));
	echo $form->input('contractor_name');
	echo $form->input('address');
	echo $form->input('estimation_amt');
	echo $form->input('workdone_amt');
	echo $form->input('emd', array('label' => 'EMD 5%'));
	echo $form->input('it', array('label' => 'IT 2%'));
	echo $form->input('scst', array('label' => 'SC on ST 10%'));
	echo $form->input('ec', array('label' => 'EC 3%'));
	echo $form->input('vat', array('label' => 'Vat 4%'));
	echo $form->input('lwf', array('label' => 'LWF 3%'));
	echo $form->input('deduction_amt');
	echo $form->input('total_amt');
	echo $form->end('Submit');
?>