<?php
App::uses('AppController', 'Controller');

/**
 * Orders Controller
 *
 * @property Order $Order
 * @property PaginatorComponent $Paginator
 */
class UserOrdersController extends AppController
{

    /**
     * Components
     *
     * @var array
     */
    public $components = array('Session', 'Paginator', 'Export.Export');


    /**
     * This it to get the order_set - whish is the timestamp value value convertion of when the menu is served
     * @return false|int
     */
    public function get_order_set()
    {
        $this->loadModel('Setting');

        $s_qry = $this->Setting->find('first', array(
            'fields' => array('Setting.value'), 'conditions' => array(
                'Setting.id' => 6,
                'Setting.name' => 'Next Date',
            )));
        return strtotime(date('Y-m-d', strtotime($s_qry['Setting']['value'])));
    }

    /**
     * This is to get the users last order id
     * @return mixed
     */
    public function get_last_order_id($myID)
    {
        $qry = $this->UserOrder->find('first', array('conditions' => array(
            'UserOrder.user_id' => $myID,
        ), 'order' => array('UserOrder.created' => 'desc')));
        return $qry['UserOrder']['id'];
    }

    /**
     * This is to check if the order is olready exist
     * @return bool
     */
    public function is_order_submitted($myID = '')
    {

        if (!empty($myID)) {
            $dateSetting = $this->get_order_set();

            if ($this->UserOrder->find('count', array(
                'conditions' => array(
                    'UserOrder.user_id' => $myID,
                    'UserOrder.order_set' => $dateSetting,
                )
            ))
            ) {
                return true;
            }
        }

        return false;

    }


    private function _get_menu_orders($orders){
        $Menu = new Menu();
        $_menu = array();
        foreach($orders as $k => $order){
            $_a = array();
            if(isset($order['addons'])){
                $_a = $this->_get_addon_orders($order['addons']);
            }
            $_menu[] = array(
                'Menu'  => $Menu->findById($order['menu_id'])['Menu'],
                'AddOn' => $_a);
        }
        return $_menu;
    }

    private function _get_addon_orders($addons){
        $AddOn = new AddOn();
        $_addon = array();

        foreach($addons as $a => $addon){
            $_addon[$a] = $AddOn->findById($addon['addon_id'])['AddOn'];
            $_addon[$a]['numOrder'] = $addon['numOrder'];
        }
        return $_addon;
    }

    private function _displayOrders($results) {
        $User = new User();

        $data = array($results);

        $oop = [];

        foreach ($results as $key => $val) {
            $_u = $User->find('first', array(
                'conditions' => array('User.id'=>$val['User']['id']),
            ));

            $results[$key]['Company'] = $_u['Company'];

            foreach(array('breakfast','lunch','snack','dinner','midnightsnack') as $m){
                if(isset($results[$key]['UserOrder'][$m])){

                    $orders = unserialize($results[$key]['UserOrder'][$m]);

                    if(!is_array($orders) && empty($orders)) continue;

                    $oop[] =  $orders;

                    $results[$key]['UserOrder'][$m] = $this->_get_menu_orders($orders);
                }
            }
        }
        return $results;
    }


    public function add()
    {

    }

    public function index()
    {
        $arg = array(
            'conditions' => array('UserOrder.status' => 1),
            'order'      => array('UserOrder.created' => 'desc'),
        );

        if (in_array($this->Auth->user('role'), array('companyadmin', 'customer'))) {
            $settings['conditions']['UserOrder.user_id'] = $this->Auth->user('id');
        }

        if ($this->myRole == 'customer')
            $this->layout = 'homepage';

        $this->set('usersOrder', $this->_displayOrders($this->UserOrder->find('all', $arg)));
    }

}
