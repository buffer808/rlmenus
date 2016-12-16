<?php
/**
 * Static content controller.
 *
 * This file will render views from views/pages/
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

App::uses('AppController', 'Controller');
App::uses('CakeEmail', 'Network/Email');
App::import('Controller', 'UserOrders');

/**
 * Static content controller
 *
 * Override this controller by placing a copy in controllers directory of an application
 *
 * @package       app.Controller
 * @link http://book.cakephp.org/2.0/en/controllers/pages-controller.html
 */
class PagesController extends AppController
{

    /**
     * This controller does not use a model
     *
     * @var array
     */
    public $uses = array();

    public $components = array('Paginator');

    /**
     * Displays a view
     *
     * @return void
     * @throws NotFoundException When the view file could not be found
     *    or MissingViewException in debug mode.
     */
    public function display()
    {
        $path = func_get_args();

        $count = count($path);
        if (!$count) {
            return $this->redirect('/');
        }
        $page = $subpage = $title_for_layout = null;

        if (!empty($path[0])) {
            $page = $path[0];
        }
        if (!empty($path[1])) {
            $subpage = $path[1];
        }
        if (!empty($path[$count - 1])) {
            $title_for_layout = Inflector::humanize($path[$count - 1]);
        }
        $this->set(compact('page', 'subpage', 'title_for_layout'));

        try {
            $this->render(implode('/', $path));
        } catch (MissingViewException $e) {
            if (Configure::read('debug')) {
                throw $e;
            }
            throw new NotFoundException();
        }
    }

    /**
     * @return array
     */
    public function homepage()
    {
        $this->set('myUsername', $this->myUsername);
        $this->layout = 'homepage';

        $meals = array();

        if(in_array($this->myRole, array('Guest', 'customer'))){
            $meals = array('Breakfast', 'Snack');
        }else{
            $meals = array('Breakfast', 'Lunch', 'Snack', 'Dinner', 'MidnightSnack');
        }

        $this->set('meals', $meals);

        if($this->Session->check('msg_sent')){
            $this->set('msg_sent', $this->Session->read('msg_sent'));
        }
    }

    private function _homepage()
    {
        $this->set('myUsername', $this->myUsername);
        $this->layout = 'homepage';

        $this->loadModel('Breakfast');
        $breakfasts = $this->Breakfast->find('all', array('conditions' => array('Breakfast.status' => 1)));

        $this->loadModel('Lunch');
        $lunches = $this->Lunch->find('all', array('conditions' => array('Lunch.status' => 1)));

        $this->loadModel('Snack');
        $snacks = $this->Snack->find('all', array('conditions' => array('Snack.status' => 1)));

        $this->loadModel('Dinner');
        $dinners = $this->Dinner->find('all', array('conditions' => array('Dinner.status' => 1)));

        $this->loadModel('MidnightSnack');
        $midnightsnacks = $this->MidnightSnack->find('all', array('conditions' => array('MidnightSnack.status' => 1)));

        $this->set('meals', array(
            'Breakfast' => array('breakfasts', $breakfasts),
            'Lunch' => array('lunches', $lunches),
            'Snack' => array('snacks', $snacks),
            'Dinner' => array('dinners', $dinners),
            'MidnightSnack' => array('midnightsnacks', $midnightsnacks),
        ));
    }

    public function _loadMyPrevMeal($cur_page = null){
        if(!$cur_page) return false;

        $this->loadModel('UserFeedback');

        $this->Paginator->settings = array(
            'conditions'    => array(
                'UserFeedback.user_id'  => $this->myID,
                'UserFeedback.meal'     => $cur_page,
                'UserFeedback.status'   => 1),
            'order'         => array('UserFeedback.created' => 'DESC'),
            'limit' => 3,
        );
        $qry = $this->Paginator->paginate('UserFeedback');

        return $qry;

    }

    public function _loadMyCurMeal($cur_page = null){
        if(!$cur_page) return false;

        $this->loadModel('UserOrder');

        $day = ( (int) date('d', strtotime('now')) ) - 1;
        $monthNow = (int) date('m', strtotime('now'));
        $yaarNow = (int) date('Y', strtotime('now'));

        $ld = date('l', strtotime(date('Y-m-d', strtotime($yaarNow.'/'.$monthNow.'/'.$day)) ) );

        if($ld == 'Sunday'){
            $day = ( (int) date('d', strtotime('now')) ) - 2;
        }


        $qry = $this->UserOrder->find('first', array(
            'conditions' => array(
                'UserOrder.created >=' => $yaarNow . '-' . $monthNow . '-' . $day . ' 00:00:00',
                'UserOrder.created <=' => $yaarNow . '-' . $monthNow . '-' . $day . ' 23:59:59',
                'UserOrder.user_id' => $this->myID,
            ),
            'fields' => array('UserOrder.id', 'UserOrder.'.strtolower($cur_page))
        ));

        $curMeal = array();

        if(isset($qry['UserOrder'])){
            $orders = unserialize($qry['UserOrder'][strtolower($cur_page)]);

            $UserOrders = new UserOrdersController();

            $curMeal['UserOrder'] = array('id'=>$qry['UserOrder']['id']);
            $curMeal['Orders'] = $UserOrders->_get_menu_orders($orders);

            return (isset($curMeal)) ?  $curMeal : $curMeal;
        }

        return $curMeal;
    }

    public function _checkFeed(){
        $this->loadModel('UserFeedbackk');


    }

    public function meal($cur_meal = 'Breakfast')
    {

        if($this->myRole == 'Guest' && !in_array($cur_meal, array('Breakfast','Snack'))){
            $this->_auth();
        }

        $this->layout = 'sidebar';

        $this->set('cur_page', $cur_meal);

        if (!empty($cur_meal)) {
            $this->loadModel($cur_meal);

            $menus = $this->$cur_meal->find('all', array('conditions'=>array(
                        $cur_meal.'.status' => 1
                    )));
            $this->set(compact('menus'));
        }



        $curMeal = (!in_array($this->myRole, array('Guest', 'customer')))
            ? $this->_loadMyCurMeal($cur_meal)
            : '';

        $this->set(compact('curMeal'));

        $prevMeal = (!in_array($this->myRole, array('Guest', 'customer')))
            ? $this->_loadMyPrevMeal($cur_meal)
            : '';
        $this->set(compact('prevMeal'));

        if($this->Session->check('msg_sent')){
            $this->set('msg_sent', $this->Session->read('msg_sent'));
        }
    }

    public function confirmation()
    {
        $this->layout = 'homepage';
    }


    public function cart()
    {
        $this->layout = 'homepage';
        $cart = array();

        if ($this->Session->check('myOrder')) {
            $myOrder = $this->Session->read('myOrder');

            foreach(array('Breakfast','Lunch','Snack','Dinner','MidnightSnack') as $meal){
                if(isset($myOrder[$meal])){
                    $this->loadModel('Menu');
                    foreach($myOrder[$meal] as $k => $m){

                        $cart[$meal][$m['menu_id']] = $this->Menu->findById($m['menu_id'])['Menu'];

                        if(isset($myOrder[$meal][$k]['addons'])){
                            $this->loadModel('AddOn');
                            foreach($myOrder[$meal][$k]['addons'] as $addon){
                                $a = $this->AddOn->findById($addon['addon_id']);
                                $a['AddOn']['numOrder'] = $addon['numOrder'];
                                $cart[$meal][$m['menu_id']]['AddOns'][] = $a['AddOn'];
                            }
                        }
                    }
                }

            }

        }
        $this->set(compact('cart'));

    }

    public function send_inquiry(){

        if ($this->request->is('post')) {

            $Email = new CakeEmail();

            /*$Email->from(array('no-reply@rlfooddelivery.com' => 'RLFoodDelivery'))
                  ->to('anex.mellen@gmail.com')
                  ->subject('RLFoodDelivery message')
                  ->send("Hi Team,\n".
                    "Please see new inquiry details below.\n".
                    "First Name: <strong>" . $this->request->data['contact_fname']  . "</strong>\n".
                    "Last Name <strong>: " . $this->request->data['contact_lname']  . "</strong>\n".
                    "Contact number <strong>: " . $this->request->data['contact_number']  . "</strong>\n".
                    "Email  Address <strong>: " . $this->request->data['contact_email']  . "</strong>\n".
                    "Message:  <strong>" . $this->request->data['contact_msg']  . "</strong>\n");*/

            $_email = $Email->template('default', 'default')
                ->emailFormat('html')
                ->to('info@rlfooddelivery.com')
                ->from(array('no-reply@rlfooddelivery.com' => 'RLFoodDelivery'))
                ->subject('RLFoodDelivery message')
                ->viewVars(array('content' =>
                    "Hi Team,\n".
                    "Please see new inquiry below.\n".
                    "First Name: <strong>" . $this->request->data['contact_fname']  . "</strong>\n".
                    "Last Name <strong>: " . $this->request->data['contact_lname']  . "</strong>\n".
                    "Contact number <strong>: " . $this->request->data['contact_number']  . "</strong>\n".
                    "Email  Address <strong>: " . $this->request->data['contact_email']  . "</strong>\n".
                    "Message:  <strong>" . $this->request->data['contact_msg']  . "</strong>\n"
                ))
                ->send();

            $this->Session->write('msg_sent', true);

            return $this->redirect( Router::url( $this->referer(), true ) );

        }

    }

    public function afterFilter(){
        if($this->Session->check('msg_sent')){
            $this->Session->delete('msg_sent');
        }
    }
}
