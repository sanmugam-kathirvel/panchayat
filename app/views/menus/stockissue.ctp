<p>Stock Issue</p>
<?php
	$stock_info = array();
	foreach($stock as $item){
		$stock_info[$item['Stock']['id']] =  $item['Stock']['item_name'];
	}
	echo $form->create('StockIssue', array( 'url' => array('controller' => 'menus', 'action' => 'stockissue')));
	echo $form->input('stock_id', array('type' => 'select','options'=> $stock_info, 'label' => 'Item Name', 'empty' => true, 'class' => 'stock'));
	echo $form->input('available_quantity', array('disabled' => true, 'class' => 'avail_stock'));
	echo $form->input('issue_date', array('id' => 'datepicker', 'type' => 'text'));
	echo $form->input('item_quantity', array('label' => 'Item Quantity'));
	echo $form->input('description');
	echo $form->end('Submit');
?>

<script>
	Webroot = 'http://localhost/myapp/panchayat';
	$(document).ready(function(){
	$('.stock').change(function(){
	  var stock_id = $('.stock').val();
		var form_data = $("#StockIssueStockissueForm").serialize();
		  $.ajax({
		  	type: 'POST',
		  	url: Webroot+"/menus/stockissue_avail/",
		  	data: {'stock_id': stock_id},
		  	success: function(data){
		  		output=JSON.parse(data);
		  	  $('.avail_stock').val(output[0].Stock.item_quantity);
		  	}
		  });
	  });
  });
</script>