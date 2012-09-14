<div id='falsh-notice-login'>
	<?php echo $this->Session->flash('auth'); ?>
</div>
<h2>கடவுச்சொல் , பயனீட்டாளர் பெயர் மாற்றம்</h2>
<?php

    echo $this->Form->create('User',array('url' => array('action'=>'update'), 'class' => 'login-form'));
		echo $this->Form->hidden('id', array('value' => $session->read('Auth.User.id')));
    echo $this->Form->input('username', array('label' => 'பயனீட்டாளர் பெயர்'));
    echo $this->Form->input('password', array('label' => 'கடவுச்சொல்'));
    echo $this->Form->end('மாற்று');
?>
