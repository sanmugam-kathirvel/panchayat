<?php
		$accounting_year = array('2012-04-01/2013-03-31' => '2012 - 2013');
    echo $this->Session->flash('auth');
    echo $this->Form->create('User',array('action'=>'login'));
    echo $this->Form->input('username');
    echo $this->Form->input('password');
		echo $this->Form->input('accounting_year', array('options' => $accounting_year));
    echo $this->Form->end('Login');
?>
