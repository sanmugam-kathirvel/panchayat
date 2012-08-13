<?php
/**
 * This file is loaded automatically by the app/webroot/index.php file after the core bootstrap.php
 *
 * This is an application wide file to load any function that is not used within a class
 * define. You can also use this to include or require any files in your application.
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
 * @subpackage    cake.app.config
 * @since         CakePHP(tm) v 0.10.8.2117
 * @license       MIT License (http://www.opensource.org/licenses/mit-license.php)
 */

/**
 * The settings below can be used to set additional paths to models, views and controllers.
 * This is related to Ticket #470 (https://trac.cakephp.org/ticket/470)
 *
 * App::build(array(
 *     'plugins' => array('/full/path/to/plugins/', '/next/full/path/to/plugins/'),
 *     'models' =>  array('/full/path/to/models/', '/next/full/path/to/models/'),
 *     'views' => array('/full/path/to/views/', '/next/full/path/to/views/'),
 *     'controllers' => array('/full/path/to/controllers/', '/next/full/path/to/controllers/'),
 *     'datasources' => array('/full/path/to/datasources/', '/next/full/path/to/datasources/'),
 *     'behaviors' => array('/full/path/to/behaviors/', '/next/full/path/to/behaviors/'),
 *     'components' => array('/full/path/to/components/', '/next/full/path/to/components/'),
 *     'helpers' => array('/full/path/to/helpers/', '/next/full/path/to/helpers/'),
 *     'vendors' => array('/full/path/to/vendors/', '/next/full/path/to/vendors/'),
 *     'shells' => array('/full/path/to/shells/', '/next/full/path/to/shells/'),
 *     'locales' => array('/full/path/to/locale/', '/next/full/path/to/locale/')
 * ));
 *
 */

/**
 * As of 1.3, additional rules for the inflector are added below
 *
 * Inflector::rules('singular', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 * Inflector::rules('plural', array('rules' => array(), 'irregular' => array(), 'uninflected' => array()));
 *
 */
 //global $accounting_year;
 //$accounting_year =array('acc_opening_year' => '2012-04-01', 'acc_closing_year' => '2013-03-31');
	global $flash_messages;
	$flash_messages = array();
	$flash_messages['email'] = 'தங்களது மின்னஞ்சல் முகவரியை கொடுக்கவும்';
	$flash_messages['added'] = 'ஆவணம் வெற்றிகரமாக சேர்க்கப்பட்டது';
	$flash_messages['low_stock'] = 'கையிருப்பு அளவு குறைவாக உள்ளது';
	$flash_messages['add_failed'] = 'ஆவணம் சேர்க்கப்படவில்லை';
	$flash_messages['low_balance'] = 'கணக்கில் போதுமான அளவு பணம் இல்லை';
	$flash_messages['low_cash'] = 'கையில் போதுமான அளவு பணம் இல்லை';
	$flash_messages['edited'] = 'ஆவணம் வெற்றிகரமாக புதுப்பிக்கப்பட்டது';
	$flash_messages['edit_failed'] = 'ஆவணம் புதுப்பிக்கப்படவில்லை';
	$flash_messages['deleted'] = 'ஆவணம் வெற்றிகரமாக நீக்கப்பட்டது';
	$flash_messages['invalid_operation'] = 'செல்லுபடியாகாத இயங்குமுறை';
	$flash_messages['date_check'] = 'தாங்கள் கொடுத்த தேதி செல்லாததாகும்';
	$flash_messages['login_check'] = 'நீங்கள் தேர்ந்தெடுத்த பக்கத்தை பார்க்க உங்களுக்கு அனுமதி இல்லை';
?>
