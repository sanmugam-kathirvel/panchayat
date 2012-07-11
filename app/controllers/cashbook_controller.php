<?php
	class CashbookController extends AppController{
		var $uses = array('CashBook');
		function beforeFilter(){
			parent::beforeFilter();
		}
		function index(){
			
		}
	}
?>