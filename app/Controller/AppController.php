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
 * @package        app.Controller
 * @link        http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller
{
    public $components = array(
        'Session','Cookie',
        'Auth' => array(
            'loginRedirect' => array(
                'controller' => 'pages',
                'action' => 'homepage'
            ),
            'logoutRedirect' => array(
                'controller' => 'pages',
                'action' => 'homepage'
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
    public $myID = 'None';
    public $myCompanyID = 'None';

    public function beforeFilter()
    {
        parent::beforeFilter();

        $this->set('site_url', 'http://' . $_SERVER['SERVER_NAME'] . '/');

        $this->myRole = $this->Auth->user('role') == null ? 'Guest' : $this->Auth->user('role');
        $this->set('myRole', $this->myRole);

        $this->myUsername = $this->Auth->user('username') == null ? 'Guest' : $this->Auth->user('username');
        $this->set('myUsername', $this->myUsername);

        $this->myTitle = $this->Auth->user('display_name') == null ? 'None' : $this->Auth->user('display_name');
        $this->set('myTitle', $this->myTitle);

        $this->myID = $this->Auth->user('id') == null ? 'None' : $this->Auth->user('id');
        $this->set('myID', $this->myID);

        $this->myCompanyID = $this->Auth->user('company_id') == null ? 'None' : $this->Auth->user('company_id');
        $this->set('companyID', $this->myCompanyID);

        $this->set('counter', $this->countMyOrder());

        /**
         * layout
         */
//		$this->layout = 'bootstrap';
        if ($this->myUsername != 'Guest') {
            $this->layout = 'adminlte';
        } else {
            $this->layout = 'homepage';
        }

        $this->Auth->allow('logout', 'login', 'homepage', 'add', 'cart', 'view', 'meal');

        $this->set('currentController', $this->params['controller']);
        $this->set('currentAction', $this->params['action']);

        //Get the scheadules
        $this->loadModel("Setting");

        $settings = array();

        $settingsdata = $this->Setting->find('all');
        foreach ($settingsdata as $s) {
            $settings[$s['Setting']['name']] = $s['Setting']['value'];
        }

        $this->set('settings', $settings);

        if ($this->Auth->user('username') !== 'adocanteen') {
            //	echo "Under maintenance";exit;
        }
        date_default_timezone_set('Asia/Manila');

        if ($this->myRole == 'admin') {
            App::import('Controller', 'Feedbacks');
            $Feedbacks = new FeedbacksController();
            $this->set('new_feed', $Feedbacks->count_new());
            $this->set('not_solved', $Feedbacks->count_not_solved());
        } else {
            $this->set('new_feed', 0);
            $this->set('not_solved', 0);
        }
    }

    /**
     * @param $img : uploaded image
     * @return bool : if no image was uploaded
     */
    public function upMealPic($img)
    {
        if (!empty($img['name'])) {
            $file = $img;

            $ext = substr(strtolower(strrchr($file['name'], '.')), 1);
            $arr_ext = array('jpg', 'jpeg', 'gif', 'png');

            if (in_array($ext, $arr_ext)) {
                move_uploaded_file($file['tmp_name'], WWW_ROOT . '/img/menus/' . $file['name']);
                return '/img/menus/' . $file['name'];
            }
        }
        return false;
    }


    public function editMealPic($new_img, $old_img)
    {
        if (!empty($new_img['name'])) {

            if (!empty($old_img)) {
                unlink(WWW_ROOT . $old_img);
            }

            return $this->upMealPic($new_img);

        }
        return false;
    }

    public function _auth()
    {
        if ($this->myRole == 'Guest') {
            return $this->redirect(array('controller'=>'users', 'action'=>'login'));
        }
    }

    public function countMyOrder(){
        $counter = 0;
        $myOrder = 0;

        if ($this->Session->check('myOrder')) {
            $myOrder = $this->Session->read('myOrder');

            if (!$myOrder) return 0;

            foreach ($myOrder as $o) {
                $counter += count($o);
                foreach ($o as $a) {
                    if (isset($a['addons']) && is_array($a['addons'])) {
                        $counter += ($a['addons']) ? count($a['addons']) : 0;
                    }
                }
            }
        }

        return $counter;
    }


}
