<h2 class="hightitle"><?php __('கடவுச்சொல் மீளமைவு'); ?></h2>
<div>
 
<form method="post">
<?php
	echo $this->Form->input('password',array('label' => 'கடவுச்சொல்', "type"=>"password","name"=>"data[User][password]"));
	echo $this->Form->input('password_confirm',array('label' => 'கடவுச்சொல்லினை உறுதி செய்க', "type"=>"password","name"=>"data[User][password_confirm]"));
	echo $this->Form->end('மீளமை');
?>
</form>
</div>