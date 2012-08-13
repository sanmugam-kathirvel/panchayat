<h2>புதிய தலைப்பு சேர்த்தல்</h2>
<?php
	$options2 = array('income' => 'வரவு', 'expense' => 'செலவு');
	$receipt_op = array('no' => 'இல்லை', 'yes' => 'ஆம்');
	echo $form->create('Header', array( 'url' => array('controller' => 'menus', 'action' => 'addheader')));
	echo $form->input('account_id', array('label' => 'கணக்கின் பெயர்', 'type'=>'select', 'empty' => true, 'options'=> $account_op));
	echo $form->input('header_name', array('label' => 'தலைப்பின் பெயர்'));
	echo $form->input('header_type', array('label' => 'தலைப்பின் வகை', 'type'=>'select', 'empty' => true, 'options'=> $options2));
	echo $form->input('receipt', array('label' => 'ரசீது', 'type'=>'select', 'empty' => true, 'empty' => true, 'options'=> $receipt_op));
	echo $form->end('அனுப்பு');
?>
