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
  						<?= $this->Html->link("Main", "#", array("class" => 'dropdown-toggle') ) ?>
  						<ul class = "dropdown-menu">
  							<li><?= $this->Html->link("Opening Balance", array('plugin' => false, "controller" => "menus", "action" => "addopeningbals")); ?></li>
  							<li><?= $this->Html->link("Hamlets", array('plugin' => false, "controller" => "menus", "action" => "addhamlet")); ?></li>
  							<li><?= $this->Html->link("Headers", array('plugin' => false, "controller" => "menus", "action" => "addheader")); ?></li>
  							<li><?= $this->Html->link("Opening Stocks", array('plugin' => false, "controller" => "menus", "action" => "addopeningstock")); ?></li>
  							<li><?= $this->Html->link("Stock Issue", array('plugin' => false, "controller" => "menus", "action" => "stockissue")); ?></li>
  						</ul>
  					</li>
  					<li class = "dropdown" data-dropdown="dropdown">
  						<?= $this->Html->link("Demands", "#", array("class" => 'dropdown-toggle') ) ?>
  						<ul class = "dropdown-menu">
  							<li><?= $this->Html->link("House Tax", array('plugin' => false, "controller" => "demands", "action" => "addhtdemand")); ?></li>
  							<li><?= $this->Html->link("Water Tax", array('plugin' => false, "controller" => "demands", "action" => "addwtdemand")); ?></li>
  							<li><?= $this->Html->link("Professional Tax", array('plugin' => false, "controller" => "demands", "action" => "addptdemand")); ?></li>
  							<li><?= $this->Html->link("D & O Traders", array('plugin' => false, "controller" => "demands", "action" => "adddodemand")); ?></li>
  						</ul>
  					</li>
  					<li class = "dropdown" data-dropdown="dropdown">
  						<?= $this->Html->link("Accounts", "#", array("class" => 'dropdown-toggle') ) ?>
  						<ul class = "dropdown-menu">
  							<li><?= $this->Html->link("Purchase", array('plugin' => false, "controller" => "expenses", "action" => "purchase")); ?></li>
  							<li><?= $this->Html->link("Salary", array('plugin' => false, "controller" => "expenses", "action" => "salary")); ?></li>
  							<li><?= $this->Html->link("Bill Estimation", array('plugin' => false, "controller" => "expenses", "action" => "addbill")); ?></li>
  							<li><?= $this->Html->link("Incomes", array('plugin' => false, "controller" => "incomes", "action" => "addincome")); ?></li>
  							<li><?= $this->Html->link("Expenses", array('plugin' => false, "controller" => "expenses", "action" => "addexpense")); ?></li>
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
