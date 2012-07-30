<h2>நுழைவு பக்கம்</h2>
<?php
		$accounting_year = array('2012-04-01/2013-03-31' => '2012 - 2013');
    echo $this->Session->flash('auth');
    echo $this->Form->create('User',array('action'=>'login'));
    echo $this->Form->input('username', array('label' => 'பயனீட்டாளர் பெயர்'));
    echo $this->Form->input('password', array('label' => 'கடவுச்சொல்'));
		echo $this->Form->input('accounting_year', array('label' => 'கணக்கியல் காலம்', 'options' => $accounting_year));
    echo $this->Form->end('நுழை');
?>
