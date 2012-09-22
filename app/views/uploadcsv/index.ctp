<h2>Upload csv files</h2>
<?php
	$table_name = array('House Tax' => 'House Tax', 'Water Tax' => 'Water Tax', 'Pt Tax' => 'Pt Tax', 'Do Tax' => 'Do Tax', 'NRGS Registration' => 'NRGS Registration');
	echo $form->create('Uploadcsv', array( 'url' => array('controller' => 'Uploadcsv', 'action' => 'index'), 'type' => 'file'));
	echo $form->input('table_name', array('type' => 'select','options'=> $table_name));
	echo $form->input('file', array('type' => 'file'));
	echo $form->end('submit');