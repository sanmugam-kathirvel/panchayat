<?php
class MyviewController extends AppController {

	var $uses = array('BookDetail', 'Book');

	// ...
	// Some code and methods
	// ... 
	function export_xls() {
		$this->BookDetail->recursive = 1;
		$data = $this->BookDetail->find('all',
		array('contain' => array('Book')));
		
		$this->set('rows',$data);
		$this->render('export_xls','export_xls');

	}
	// ...
	// Some code and methods
	// ...
}
?>