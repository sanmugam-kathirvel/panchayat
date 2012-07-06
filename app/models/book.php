<?php
	class Book extends AppModel{
		var $name = 'Book';
		var $hasMany = array('BookDetail');
	}
?>