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

    public function add(){

    }

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
}

//1478534400
//1478581200