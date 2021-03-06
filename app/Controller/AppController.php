<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
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
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {
    public $components = array(
        'Session',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'menus',
                'action' => 'today'
            ),
            'logoutRedirect' => array(
                'controller' => 'menus',
                'action' => 'today'
                
            ),
            'authenticate' => array(
                'Form' => array(
                    'passwordHasher' => 'Blowfish'
                )
            )
        )
    );
    
    public $myRole = 'Guest';
    public $myUsername = null;
    public $myTitle = 'None';
	
	public function beforeFilter(){
		parent::beforeFilter();
		
		$this->myRole = $this->Auth->user('role') == null? 'Guest' : $this->Auth->user('role');
		$this->set('myRole' ,$this->myRole);
		
		$this->myUsername = $this->Auth->user('username') == null? 'Guest' : $this->Auth->user('username');
		$this->set('myUsername' ,$this->myUsername);
		
		$this->myTitle = $this->Auth->user('text') == null? 'None' : $this->Auth->user('text');
		$this->set('myTitle' ,$this->myTitle);
		
		
		$this->layout = 'bootstrap';
		$this->Auth->allow('add','view','logout','login');
		
		$this->set('currentController',$this->params['controller']);
		$this->set('currentAction',$this->params['action']);
		
		//Get the scheadules
		$this->loadModel("Setting");
		$settings = array();
		
		$settingsdata = $this->Setting->find('all');
		foreach($settingsdata as $s){
			$settings[$s['Setting']['name']] = $s['Setting']['value'];
		}
	
		$this->set('settings',$settings);
		
		if($this->Auth->user('username')!=='adocanteen'){
		//	echo "Under maintenance";exit;
		}
		date_default_timezone_set('Asia/Manila');
	}
}
