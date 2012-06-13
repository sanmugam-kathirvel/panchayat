<?php
/**
 *
 * PHP versions 4 and 5
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright 2005-2011, Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       cake
 * @subpackage    cake.cake.console.libs.templates.skel.views.layouts
 * @since         CakePHP(tm) v 0.10.0.1076
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */
?>
<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php __('CakePHP: the rapid development php framework:'); ?>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->Html->css(array('bootstrap', 'structure','jquery-ui-1.8.21.custom'));
		echo $this->Html->script(array('jquery-1.7.2.min', 'bootstrap-menu', 'jquery-ui-1.8.21.custom.min'));

		echo $scripts_for_layout;
	?>
</head>
<body>
  <div id ="wrapper">
  	<div id = "header-container">
  		<div id = "header">
  			<?= $this->Html->image("logo.png"); ?>
  		</div>
  	</div>
  	<div class="topbar">
  		<div class = "topbar-inner">
  			<div class = "container-fluid">
  				<?= $this->Html->link("Grama", "#", array("class" => "brand")) ?>
  				<ul class = "nav">
  					<li class = "dropdown" data-dropdown="dropdown">
  						<?= $this->Html->link("Expences", "#", array("class" => 'dropdown-toggle') ) ?>
  						<ul class = "dropdown-menu">
  							<li><?= $this->Html->link("Purchase", array('plugin' => false, "controller" => "products", "action" => "index", "manage" => true)); ?></li>
  							<li><?= $this->Html->link("Salary", array('plugin' => false, "controller" => "classifications", "action" => "index", "manage" => true)); ?></li>
  						</ul>
  					</li>
  					<li class = "dropdown" data-dropdown="dropdown">
  						<?= $this->Html->link("Users", "#", array("class" => 'dropdown-toggle') ) ?>
  						<ul class = "dropdown-menu">
  							<li><?= $this->Html->link("List", array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'index', 'manage' => true)); ?></li>
  							<li><?= $this->Html->link("Add", array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'addUser', 'manage' => true)); ?></li>
  						</ul>
  					</li>
  					<li class = "dropdown" data-dropdown="dropdown">
  						<?= $this->Html->link("Roles", "#", array("class" => 'dropdown-toggle') ) ?>
  						<ul class = "dropdown-menu">
  							<li><?= $this->Html->link("List", array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'index', 'manage' => true)); ?></li>
  							<li><?= $this->Html->link("Add", array('plugin' => 'usermgmt', 'controller' => 'user_groups', 'action' => 'addGroup', 'manage' => true)); ?></li>
  							<li><?= $this->Html->link("Permission", array('plugin' => 'usermgmt', 'controller' => 'user_group_permissions', 'action' => 'index', 'manage' => true)); ?></li>
  						</ul>
  					</li>
  					<li class = "dropdown" data-dropdown="dropdown">
  						<?//= $this->Html->link($this->User->display("username"), "#", array("class" => 'dropdown-toggle') ) ?>
  						<ul class = "dropdown-menu">
  							<li><?= $this->Html->link("Signout", array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'logout', 'manage' => false)); ?></li>
  							<li><?//= $this->Html->link("Edit", array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'editUser', $this->User->display("id"))); ?></li>
  							<li><?= $this->Html->link("Change password", array('plugin' => 'usermgmt', 'controller' => 'users', 'action' => 'changePassword', 'manage' => false)); ?></li>
  						</ul>
  					</li>
  				</ul>
  			</div>
  		</div>
  	</div>
  	<div id = "container">
  		<div class = "content">
  			<?php echo $content_for_layout; ?>
  		</div>	
  	</div>
  </div>
  <script>
    $(function() {
      $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd", showAnim: "show"});
    });
  </script>
</body>
</html>
