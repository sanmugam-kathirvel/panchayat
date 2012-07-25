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
	echo $form->input('item_quantity', array('class' => 'item_quantity'));
	echo $form->input('closing_item_quantity', array('class' => 'closing_item_quantity', 'readonly' => 'readonly'));
	echo $form->input('hand_over_name');
	echo $form->input('description');
	echo $form->end('Submit');
?>

<script>
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
	  $('.item_quantity').focusout(function(){
	  	if(parseInt($('.avail_stock').val()) > 0 && parseInt($('.item_quantity').val()) <= parseInt($('.avail_stock').val())){
	  		$('.closing_item_quantity').val(parseInt($('.avail_stock').val()) - parseInt($('.item_quantity').val()));
	  	}else if(parseInt($('.avail_stock').val()) > 0){
	  		$('.item_quantity').val(0);
	  		$('.closing_item_quantity').val(0);
	  	}
	  });
  });
</script>