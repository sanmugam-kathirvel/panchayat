<h2 class="hightitle"><?php __('Forget Password'); ?></h2>
<div>
 
<form method="post">
<?php
	echo $this->Form->input('password',array("type"=>"password","name"=>"data[User][password]"));
	echo $this->Form->input('password_confirm',array("type"=>"password","name"=>"data[User][password_confirm]"));
	echo $this->Form->end('Reset');

?>

 
</form>
</div>