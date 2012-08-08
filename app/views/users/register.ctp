<h2>புதிய பயனீட்டாளரைப் பதிவு செய்யும் பக்கம்</h2>
<?php
    echo $this->Form->create('User',array('action'=>'register'));
		echo $this->Form->input('name', array('label' => 'பெயர்'));
		echo $this->Form->input('email', array('label' => 'மின் அஞ்சல்'));
    echo $this->Form->input('username', array('label' => 'பயனீட்டாளர் பெயர்'));
    echo $this->Form->input('password', array('label' => 'கடவுச்சொல்'));
		echo $this->Form->input('password_conformation', array('label' => 'கடவுச்சொல்லினை உறுதி செய்'));
		echo $this->Form->hidden('active', array('value' => 1));
    echo $this->Form->end('பதிவு செய்');
?>
