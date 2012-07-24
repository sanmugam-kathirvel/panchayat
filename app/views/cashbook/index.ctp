<p>Cash Book</p>
<?php
	$months = array();
	$years = array();
	for($i = 1; $i <= 12; $i++){
		if($i < 10){
			$months['0'.$i] = date('M', strtotime('2011-0'.$i.'-01'));
		}else{
			$months[$i] = date('M', strtotime('2011-'.$i.'-01'));
		}
	}
	for($i = 2012; $i <= 2016; $i++){
		$years[$i] = $i;
	}
	echo $form->create('Index', array('method' => 'get', 'url' => array('controller' => 'cashbook', 'action' => 'form'.$report_number.'_reoprt')));
	echo $form->input('month', array('name' => 'month', 'options' => $months));
	echo $form->input('year', array('name' => 'year', 'options' => $years));
	echo $form->end('Submit').'<a href="../../reports/index">Back to reports</a>'; 
?>