<?php
	class User extends AppModel{
		var $name = 'User';
		var $validate = array(
				'name' => array(
					'rule' => 'notEmpty',
					'message' => 'This Field Not Empty'
				),
				'email' => array(        
					'rule' => array('email', true),
					'message' => 'Please supply a valid email address.'
				),
				'username' => array(
					'rule' => 'isUnique',
					'allowEmpty' => false,
					'message' => 'This username has already been taken.'
				),
				'password_conformation' => array(
					'rule' => 'notEmpty',
					'message' => 'This Field Not Empty'
				),
				'password' => array(
					'rule' => 'notEmpty',
					'message' => 'This Field Not Empty'
				)
			);
	}
?>