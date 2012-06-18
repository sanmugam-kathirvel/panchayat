<p>Purchase</p>
<?php
	echo $form->create('Purchase', array( 'url' => array('controller' => 'purchases', 'action' => 'purchase')));
	echo $form->input('purchase_date', array('type' => 'text', 'id' => 'datepicker1'));
	echo $form->input('company_name');
	echo $form->input('voucher_number');
	echo $form->input('cheque_number');
	echo $form->input('cheque_date', array('type' => 'text', 'id' => 'datepicker'));
	echo $form->input('total_amt', array('value' => 0, 'disabled' => true, 'class' => 'grand_total'));
	echo "<div class='new_field'>";
		echo "<table>";
			echo "<tbody class= 'add_new_field'>";
					echo "<tr>";
						echo "<th>Item Description</th>";
						echo "<th>Item Quantity</th>";
						echo "<th>Unit Cost</th>";
						echo "<th>Total Amount</th>";
					echo "</tr>";
				  echo "<tr>";
						echo '<td>'.$form->input('PurchaseItem.0.item_description', array('label' => false)).'</td>';
						echo '<td>'.$form->input('PurchaseItem.0.item_quantity', array('label' => false, 'class' => 'quantity', 'value' => 0)).'</td>';
						echo '<td>'.$form->input('PurchaseItem.0.item_rate', array('label' => false, 'class' => 'unit_cost', 'value' => 0)).'</td>';
						echo '<td>'.$form->input('PurchaseItem.0.item_tot_amount', array('label' => false, 'class' => 'tot_amount', 'value' => 0, 'disabled' => true)).'</td>';
					echo "</tr>";
			echo "</tbody>";
		echo "</table>";
		echo "</div>";
	echo "<div class='link'>";	
		echo $html->link('add new', '', array('class' => 'add_field'));
		echo " | ";
		echo $html->link('remove', '', array('class' => 'remove_field'));
	echo "</div>";
	echo $form->end('Submit');
?>
<script>
		var i=1;
		$('a.add_field').click(function(){
		 	var new_field = "<tr class ='new_field' id='new_field_"+i+"'>";
		 	new_field +=  "<div class ='new_field' id='new_field_"+i+"'>";
		 	new_field += "<td><div class='input text'><input name='data[PurchaseItem]["+i+"][item_description]' type='text' maxlength='50' id='PurchaseItem"+i+"ItemDescription'></div></td>";
		 	 new_field += "<td><div class='input text'><input name='data[PurchaseItem]["+i+"][item_quantity]' type='text' maxlength='11' id='PurchaseItem"+i+"ItemQuantity' class='quantity' value='0'></div></td>";
       new_field += "<td><div class='input text'><input name='data[PurchaseItem]["+i+"][item_rate]' type='text' maxlength='11' id='PurchaseItem"+i+"ItemRate'></div></td>";
       new_field += "<td><div class='input text'><input name='data[PurchaseItem]["+i+"][item_tot_amount]' type='text' id='PurchaseItem"+i+"ItemTotAmount' value=0 disabled='disabled'></div>";
       new_field += "</div>";
       new_field += "</tr>";
       
       // if(i == 1){
       	 // $('a.remove_field').css({'display':'block'});
       // }
       $('.add_new_field').append(new_field);
       i++;
       return false;
    });
    $('a.remove_field').click(function(){
    	$('#new_field_'+(i-1)).remove();
    	i=i-1;
    	return false;
    });
    $('.unit_cost').focusout(function() {
    		var quantity = parseInt($('.quantity').val());
    		var unit_cost = parseInt($(this).val());
    		var tot_amount = parseInt($('.tot_amount').val());
    		var grand_total = parseInt($('.grand_total').val());
    		if(tot_amount != 0 || grand_total != 0){
	    		grand_total -= tot_amount;
	    		$('.grand_total').val(grand_total);
	    	}
    		if($('.quantity').val() == 0 || $('.unit_cost').val() == 0){
    			$('.tot_amount').val(0);
    		}else{
    			$('.tot_amount').val(quantity*unit_cost);
    			grand_total = grand_total + (quantity * unit_cost);
    			$('.grand_total').val(grand_total);
    		}
    });
</script>