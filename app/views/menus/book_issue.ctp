<h2>ரசீது புத்தகத்தை உபயோகிப்பதற்கு வழங்கு</h2>
<?php
	echo $form->create('BookDetail', array( 'url' => array('controller' => 'menus', 'action' => 'book_issue')));
	echo $form->input('book_id', array('type' => 'select', 'empty' => true, 'class' => 'book_type', 'options' => $book_names, 'label' => 'புத்தகத்தின் பெயர்'));
	echo $form->input('book_detail_id', array('type' => 'select', 'class' => 'book_detail', 'options' => '', 'label' => 'புத்தகத்தின் எண்'));
	echo $form->end('அனுப்பு');
?>
<script>
$('.book_type').change(function(){
  	var book_type_id = $(this).val();
	  $.ajax({
	  	type: 'POST',
	  	url: Webroot+"/menus/get_book_details/",
	  	data: {'book_type_id': book_type_id},
	  	success: function(data){
	  		output=JSON.parse(data);
	  		console.log(output)
	  		if(output){
	  		   options_html = "<option value></option>";
	  		   for(j=0;j < output.length;j++){
	  		      options_html += '<option value="'+output[j].BookDetail.id+'">'+output[j].BookDetail.book_number+'</option>';
	  		   }
	  		   $('.book_detail').html(options_html);
	  		}else{
	  			alert('Please choose valid family number');
	  		}
	  	}
	  });
  });
</script>
