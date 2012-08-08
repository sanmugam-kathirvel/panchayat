<h2 class="hightitle"><?php __('Forget Password'); ?></h2>
<div class="forgetpwd form" >
<?php echo $this->Form->create('User', array('action' => 'forgetpwd')); ?>
<?php echo $this->Form->input('email',array('style'=>'float:left'));?>
<?php echo $this->Form->end('Recover');?>
</div>