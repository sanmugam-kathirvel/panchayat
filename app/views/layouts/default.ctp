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
	<script>
	var	Webroot = 'http://localhost/myapp/panchayat';
	</script>
</head>
<body>
  <div id ="wrapper">
  	<div id = "header-container">
  		<div id = "header">
  			<?php //echo $this->Html->image("logo.png"); ?>
  		</div>
  	</div>
  	<div class="topbar">
  		<div class = "topbar-inner">
  			<div class = "container-fluid">
  				<?= $this->Html->link("கிராம பஞ்சாயத்து", "#", array("class" => "brand")) ?>
  				<ul class = "nav">
  					<li class = "dropdown" data-dropdown="dropdown">
  						<?= $this->Html->link("முதன்மை", "#", array("class" => 'dropdown-toggle') ) ?>
  						<ul class = "dropdown-menu">
  							<li><?= $this->Html->link("ஊழியர்கள்", array('plugin' => false, "controller" => "menus", "action" => "employees_index")); ?></li>
  							<li><?= $this->Html->link("தலைப்புகள்", array('plugin' => false, "controller" => "menus", "action" => "headerindex")); ?></li>
  							<li><?= $this->Html->link("குக்கிராமங்கள்", array('plugin' => false, "controller" => "menus", "action" => "hamletindex")); ?></li>
  							<li><?= $this->Html->link("கழிவுகளின் விபரம்", array('plugin' => false, "controller" => "scraps", "action" => "index")); ?></li>
  							<li><?= $this->Html->link("கையிருப்பு விபரம்", array('plugin' => false, "controller" => "menus", "action" => "stock_index")); ?></li>
  							<li><?= $this->Html->link("தொடக்கக் கையிருப்பு", array('plugin' => false, "controller" => "menus", "action" => "addopeningstock")); ?></li>
  							<li><?= $this->Html->link("கையிருப்பு விநியோகம்", array('plugin' => false, "controller" => "menus", "action" => "stockissue")); ?></li>
  							<li><?= $this->Html->link("தொடக்க இருப்புத் தொகை", array('plugin' => false, "controller" => "menus", "action" => "balanceindex")); ?></li>
  							<li><?= $this->Html->link("புத்தகக் கையிருப்பு விபரம்", array('plugin' => false, "controller" => "menus", "action" => "bookindex")); ?></li>
  						</ul>
  					</li>
  					<li class = "dropdown" data-dropdown="dropdown">
  						<?= $this->Html->link("கேட்புகள்", "#", array("class" => 'dropdown-toggle') ) ?>
  						<ul class = "dropdown-menu">
  							<li><?= $this->Html->link("வீட்டு வரி", array('plugin' => false, "controller" => "demands", "action" => "htindex")); ?></li>
  							<li><?= $this->Html->link("குடிநீர் வரி", array('plugin' => false, "controller" => "demands", "action" => "wtindex")); ?></li>
  							<li><?= $this->Html->link("தொழில் வரி", array('plugin' => false, "controller" => "demands", "action" => "ptindex")); ?></li>
  							<li><?= $this->Html->link("டி & ஓ வியாபாரிகள்", array('plugin' => false, "controller" => "demands", "action" => "doindex")); ?></li>
  						</ul>
  					</li>
  					<li class = "dropdown" data-dropdown="dropdown">
  						<?= $this->Html->link("கணக்குகள்", "#", array("class" => 'dropdown-toggle') ) ?>
  						<ul class = "dropdown-menu">
  							<li><?= $this->Html->link("கணக்கு எண் 1", array('plugin' => false, "controller" => "accounts", "action" => "account1")); ?></li>
  							<li><?= $this->Html->link("கணக்கு எண் 2", array('plugin' => false, "controller" => "accounts", "action" => "account2")); ?></li>
  							<li><?= $this->Html->link("கணக்கு எண் 3", array('plugin' => false, "controller" => "accounts", "action" => "account3")); ?></li>
  							<li><?= $this->Html->link("கணக்கு எண் 4", array('plugin' => false, "controller" => "accounts", "action" => "account4")); ?></li>
  							<li><?= $this->Html->link("கணக்கு எண் 5", array('plugin' => false, "controller" => "accounts", "action" => "account5")); ?></li>
  							<li><?= $this->Html->link("கணக்கு எண் 6", array('plugin' => false, "controller" => "accounts", "action" => "account6")); ?></li>
  						</ul>
  					</li>
  					<li><?= $this->Html->link("அறிக்கைகள்", array('plugin' => false, "controller" => "reports", "action" => "index")); ?></li>
  				</ul>
  				<ul class = "nav">
  					<?php if($session->check('Auth.User.id')){
  						$user = $session->read('Auth.User'); 
  						echo '<li><a><b>'.$user['username'].'</b> - தங்களது பயன்பாட்டுத் தளத்திற்குள் நுழைந்துள்ளீர்கள்</a></li>';
  						echo '<li>'.$this->Html->link("வெளியேறு", array('plugin' => false, "controller" => "users", "action" => "logout")).'</li>';
  					}else{
  						echo '<li>'.$this->Html->link("நுழை", array('plugin' => false, "controller" => "users", "action" => "login")).'</li>';
							echo '<li>'.$this->Html->link("பதிவு செய்", array('plugin' => false, "controller" => "users", "action" => "register")).'</li>';
  					}?>
  				</ul>
  			</div>
  		</div>
  	</div>
  	<div id = "container">
  		<div class = "content">
  			<?php echo $this->Session->flash(); ?>
  			<?php echo $content_for_layout; ?>
  		</div>	
  	</div>
  </div>
  <script>
  $('.required').children('label').append('<span style = "color:red">*</span>');
  $('div#flashMessage.message').delay(10000).toggle(1000);
  //$('div.error-message').delay(5000).hide(1000);
    $(function() {
      $( "#datepicker" ).datepicker({dateFormat: "yy-mm-dd", showAnim: "show"});
      $( "#datepicker1" ).datepicker({dateFormat: "yy-mm-dd", showAnim: "show"});
      $( "#datepicker2" ).datepicker({dateFormat: "yy-mm-dd", showAnim: "show"});
    });
    $("table tr:nth-child(even)").not('.controller-row').addClass("striped");
    $('.container-fluid>ul>li').mouseover(function(){
		  $(this).addClass('open');
		});
		$('.container-fluid>ul>li').mouseout(function(){
		  $(this).removeClass('open');
		});
  </script>
</body>
</html>
