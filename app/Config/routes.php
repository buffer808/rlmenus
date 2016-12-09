<?php
/**
 * Routes configuration
 *
 * In this file, you set up routes to your controllers and their actions.
 * Routes are very important mechanism that allows you to freely connect
 * different URLs to chosen controllers and their actions (functions).
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Config
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */
/**
 * Here, we are connecting '/' (base path) to controller called 'Pages',
 * its action called 'display', and we pass a param to select the view file
 * to use (in this case, /app/View/Pages/home.ctp)...
 */
//	Router::connect('/', array('controller' => 'menus', 'action' => 'today'));
	Router::connect('/', array('controller' => 'pages', 'action' => 'homepage'));
	Router::connect('/login', array('controller' => 'users', 'action' => 'login'));
	Router::connect('/logout', array('controller' => 'users', 'action' => 'logout'));
	Router::connect('/dashboard', array('controller' => 'dashboards', 'action' => 'index'));
	Router::connect('/cart', array('controller' => 'pages', 'action' => 'cart'));
	Router::connect('/meal/*', array('controller' => 'pages', 'action' => 'meal'));
	Router::connect('/confirmation', array('controller' => 'pages', 'action' => 'confirmation'));

	Router::connect('/orders', array('controller' => 'user_orders', 'action' => 'index'));
	Router::connect('/exportbydate', array('controller' => 'user_orders', 'action' => 'exportbydate'));
	Router::connect('/exportbydaterange', array('controller' => 'user_orders', 'action' => 'exportbydaterange'));
	Router::connect('/orders/api/*', array('controller' => 'orders', 'action' => 'api'));

	Router::connect('/send_inquiry', array('controller' => 'pages', 'action' => 'send_inquiry'));

//	Router::connect('/meal_view/{$id}', array('controller' => 'pages', 'action' => 'meal_view'));
//	Router::connect('/addons', array('controller' => 'AddOns', 'action' => 'index'));
/**
 * ...and connect the rest of 'Pages' controller's URLs.
 */
	Router::connect('/pages/*', array('controller' => 'pages', 'action' => 'display'));

/**
 * Load all plugin routes. See the CakePlugin documentation on
 * how to customize the loading of plugin routes.
 */
	CakePlugin::routes();

/**
 * Load the CakePHP default routes. Only remove this if you do not want to use
 * the built-in default routes.
 */
	require CAKE . 'Config' . DS . 'routes.php';
