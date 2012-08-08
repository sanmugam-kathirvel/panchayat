<?php
	class User extends AppModel{
		var $name = 'User';
		var $validate = array(
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