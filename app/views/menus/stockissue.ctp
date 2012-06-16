<p>Stock Issue</p>
<?php
	$stock_info = array();
	foreach($stock as $item){
		$stock_info[$item['Stock']['id']] =  $item['Stock']['item_name'];
	}
	echo $form->create('StockIssue', array( 'url' => array('controller' => 'menus', 'action' => 'stockissue')));
	echo $form->input('stock_id', array('type' => 'select','options'=> $stock_info, 'label' => 'Item Name', 'empty' => true));
	echo $form->input('issue_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('item_quantity', array('label' => 'Item Quantity'));
	echo $form->input('description');
	echo $form->end('Submit');
?>