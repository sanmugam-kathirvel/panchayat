<h2 class="hightitle"><?php __('கடவுச்சொல் மறந்துவிட்டது'); ?></h2>
<div class="forgetpwd form" >
<?php echo $this->Form->create('User', array('action' => 'forgetpwd')); ?>
<?php echo $this->Form->input('email',array('label' => 'மின்னஞ்சல்', 'style'=>'float:left'));?>
<?php echo $this->Form->end('திரும்பப்பெறு');?>
</div>