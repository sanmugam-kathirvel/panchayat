<h2>நுழைவு பக்கம்</h2>
<?php
		$accounting_year = array();
		$year = 2012;
		for($i = 0; $i < 8; $i++){
			$tmp = $year.'-04-01/'.($year + 1).'-03-31';
			$accounting_year[$tmp] = $year.' - '.($year + 1);
			$year++;
		}
    echo $this->Session->flash('auth');
    echo $this->Form->create('User',array('action'=>'login'));
    echo $this->Form->input('username', array('label' => 'பயனீட்டாளர் பெயர்'));
    echo $this->Form->input('password', array('label' => 'கடவுச்சொல்'));
		echo $this->Form->input('accounting_year', array('label' => 'கணக்கியல் காலம்', 'options' => $accounting_year));
    echo $this->Form->end('நுழை');
		echo $html->link('Forget password', array('action' => 'forgetpwd'))
?>
