<p>Purchase</p>
<?php
	echo $form->create('Purchase', array( 'url' => array('controller' => 'expenses', 'action' => 'purchase')));
	echo $form->input('company_name');
	echo $form->input('voucher_number');
	echo $form->input('cheque_number');
	echo $form->input('cheque_date', array('type' => 'text', 'id' => 'datepicker'));
	echo $form->input('PurchaseItem.0.item_description');
	echo $form->input('PurchaseItem.0.item_quantity');
	echo $form->input('PurchaseItem.0.item_rate');
	echo $form->input('total_amt');
	echo $html->link('add new', '', array('class' => 'add_field'));
	echo $html->link('remove', '', array('class' => 'remove_field'));
	echo $form->end('Submit');
?>
<script>
		var i=1;
		$('a.add_field').click(function(){
		 	var new_field = "<div id='new_field_"+i+"'>";
		 	 new_field += "<div class='input text'><label for='PurchaseItem"+i+"ItemQuantity'>Item Quantity</label><input name='data[PurchaseItem]["+i+"][item_quantity]' type='text' maxlength='11' id='PurchaseItem"+i+"ItemQuantity'></div>";
       new_field += "<div class='input text'><label for='PurchaseItem"+i+"ItemRate'>Item Rate</label><input name='data[PurchaseItem]["+i+"][item_rate]' type='text' maxlength='11' id='PurchaseItem"+i+"ItemRate'></div>";
       new_field += "<div class='input text'><label for='PurchaseItem"+i+"ItemDescription'>Item Description</label><input name='data[PurchaseItem]["+i+"][item_description]' type='text' maxlength='50' id='PurchaseItem"+i+"ItemDescription'></div>";
       new_field += "</div>";
       if(i == 1){
       	 $('a.remove_field').css({'display':'block'});
       }
       $(this).before(new_field);
       i++;
       return false;
    });
    $('a.remove_field').click(function(){
    	$('#new_field_'+(i-1)).remove();
    	i=i-1;
    	return false;
    });
</script>