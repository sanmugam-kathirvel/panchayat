<?php
class UsersController extends AppController {
	function beforeFilter(){
		$this->Auth->autoRedirect = false;
		$this->Auth->allow('register');
	}
	function register(){
		if(!empty($this->data) && $this->data['User']['password'] == $this->Auth->password($this->data['User']['password_conformation'])){
			if($this->User->validates()){
				if($this->User->save($this->data)){
					$this->redirect(array('controller' => 'users', 'action' => 'login'));
				}
			}
		}
	}
	function login() {
		if(!empty($this->data) && isset($this->data['User']['accounting_year'])){
			$years = explode("/",$this->data['User']['accounting_year']);
			$this->Session->write('User.acc_opening_year', $years[0]);
			$this->Session->write('User.acc_closing_year', $years[1]);
			//$year = split('[/]', $this->data['User']['accounting_year']);
			$this->redirect(array('controller' => 'accounts', 'action'=>'index'));
		}
	}
	function logout() {
		 $this->redirect($this->Auth->logout());
	}
}
?>