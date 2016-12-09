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


    public function _get_menu_orders($orders)
    {
        $this->loadModel('Menu');
//        $Menu = new Menu();
        $_menu = array();
        foreach ($orders as $k => $order) {
            $_a = array();
            if (isset($order['addons'])) {
                $_a = $this->_get_addon_orders($order['addons']);
            }
            $_menu[] = array(
                'Menu' => $this->Menu->findById($order['menu_id'])['Menu'],
                'AddOn' => $_a);
        }
        return $_menu;
    }

    public function _get_addon_orders($addons)
    {
        $AddOn = new AddOn();
        $_addon = array();

        foreach ($addons as $a => $addon) {
            $_addon[$a] = $AddOn->findById($addon['addon_id'])['AddOn'];
            $_addon[$a]['numOrder'] = $addon['numOrder'];
        }
        return $_addon;
    }

    public function _displayOrders($results)
    {
        $User = new User();

        $data = array($results);

        $oop = [];

        foreach ($results as $key => $val) {
            $_u = $User->find('first', array(
                'conditions' => array('User.id' => $val['User']['id']),
            ));

            $results[$key]['Company'] = $_u['Company'];

            foreach (array('breakfast', 'lunch', 'snack', 'dinner', 'midnightsnack') as $m) {
                if (isset($results[$key]['UserOrder'][$m])) {

                    $orders = unserialize($results[$key]['UserOrder'][$m]);

                    if (!is_array($orders) && empty($orders)) continue;

                    $oop[] = $orders;

                    $results[$key]['UserOrder'][$m] = $this->_get_menu_orders($orders);
                }
            }
        }
        return $results;
    }

    public function _exportData($data)
    {

        $csvResult = array();

        $total = array('grandTotal'=> 0, 'meals'=>'', 'addons'=>'');

        foreach ($data as $k => $order) {
            $temp = array(
                'Employee'=> '',
                'Company'=> '',
                'Breakfast'=> '',
                'Signature1' => '',
                'Lunch'=> '',
                'Signature2' => '',
                'Snack'=> '',
                'Signature3' => '',
                'Dinner'=> '',
                'Signature4' => '',
                'MidnightSnacks'=> '',
                'Signature5' => '',
            );

            $_tmp = array();

            $temp['Employee'] = $order['User']['display_name'];
            $temp['Company'] = $order['Company']['name'];

            foreach (array('breakfast', 'lunch', 'snack', 'dinner', 'midnightsnack') as $k => $m) {

                $_m = ($m == 'midnightsnack') ? 'MidnightSnacks' : ucwords($m);

                if (!$order["UserOrder"][$m]) {
                    $temp[$_m] = "N/A";
                    continue;
                }

                if ($meal_ordered = $order["UserOrder"][$m]) {

                    foreach ($meal_ordered as $key => $val) {
                        if (!$val) continue;

                        $temp[$_m] = $val['Menu']['title'];

                        $total['grandTotal']+=1;

                        if(isset($total['meals'][$_m][$val['Menu']['title']])){
                            $total['meals'][$_m][$val['Menu']['title']] += 1;
                        }else{
                            $total['meals'][$_m][$val['Menu']['title']] = 1;
                        }

                        if(isset($total['byCompany'][$order['Company']['name']][$val['Menu']['title']])){
                            $total['byCompany'][$order['Company']['name']][$val['Menu']['title']] += 1;
                        }else{
                            $total['byCompany'][$order['Company']['name']][$val['Menu']['title']] = 1;
                        }

                        if(!$val['AddOn']) continue;

                        foreach ($val['AddOn'] as $k => $addon){
                            $_tmp[$_m][] = $addon['title'] . ' = ' . $addon['numOrder'];

                            $numOrder = (int) $addon['numOrder'];

                            $total['grandTotal']+= $numOrder;

                            if(isset($total['addons'][$_m][$addon['title']])){
                                $total['addons'][$_m][$addon['title']] += $numOrder;
                            }else{
                                $total['addons'][$_m][$addon['title']] = $numOrder;
                            }
                        }
                    }
                    if(!empty($_tmp[$_m])){
                        $_tmp[$_m] = implode("\t\n", $_tmp[$_m]);
                    }
                }

                $temp['Signature'.$k] = '';

            }

            $csvResult[] = $temp;
            $csvResult[] = $_tmp;

        }

        $csvResult[] = array();

        $csvResult[] = array('Employee'=>'Totals:', 'Company' => $total['grandTotal'] );
        $csvResult[] = array('Employee'=>'Main Meal:');

        foreach (array('Breakfast', 'Lunch', 'Snack', 'Dinner', 'MidnightSnacks') as $k => $m){
            $csvResult[] = array('Employee'=> $m);
            $tm = array();

            if(!isset($total['meals'][$m])) continue;

            foreach($total['meals'][$m] as $k=>$v){
                $csvResult[] = array(
                    'Employee' => $k . ':',
                    'Company' => $v,
                );
            }

            $csvResult[] = array();

        }

        $csvResult[] = array();
        $csvResult[] = array('Employee'=>'AddOn Meal:');
        $tm = array();
        foreach (array('Breakfast', 'Lunch', 'Snack', 'Dinner', 'MidnightSnacks') as $k => $m){

            if(!isset($total['addons'][$m])) continue;

            foreach($total['addons'][$m] as $k=>$v){
                $tm[$k] = (isset($tm[$k])) ? $tm[$k] + $v : $v ;
            }
        }

        if($tm){
            foreach($tm as $k=>$v){
                $csvResult[] = array(
                    'Employee' => $k . ':',
                    'Company' => $v,
                );
            }
        }

        $csvResult[] = array();

        foreach($total['byCompany'] as $k => $v){
            $csvResult[] = array('Employee' => $k);
            foreach($v as $e => $i){
                $csvResult[] = array(
                    'Employee' => $e . ':',
                    'Company' => $i,
                );
            }
            $csvResult[] = array();
        }


        return $csvResult;

    }

    public function deleteAll()
    {
        foreach ($this->UserOrder->find('list', array('conditions' => array('status' => 1))) as $id) {
            $this->UserOrder->id = $id;
            $this->UserOrder->saveField('status', 0);
        }
        $this->redirect(array('action' => 'index'));
    }


    public function exportbydaterange(){
        if ($this->request->is('post')) {
            $from = $this->request->data['UserOrder']['from'];
            $to = $this->request->data['UserOrder']['to'];

            $fromstr = $from['year'] . '-' . $from['month'] . '-' . $from['day'];
            $tostr = $to['year'] . '-' . $to['month'] . '-' . $to['day'];

            $cond = array(
                'conditions' => array(
                    'UserOrder.created <=' => $tostr . ' 23:59:59',
                    'UserOrder.created >=' => $fromstr . ' 00:00:00',
                    'UserOrder.status' => 1
                )
            );


            if ($this->Auth->user('role') == 'companyadmin') {
                $cond['conditions']['UserOrder.company_id'] = $this->myCompanyID;
            } elseif ($this->request->data['UserOrder']['company_id'] != 0) {
                $cond['conditions']['UserOrder.company_id'] = $this->request->data['UserOrder']['company_id'];
            }

            $data = $this->_displayOrders($this->UserOrder->find('all', $cond));
            $toCsvData = $this->_exportData($data);

            $this->Export->exportCsv($toCsvData);
        }
        $this->loadModel('Company');
        $companies = array_merge(
            array(0=>'All'),
            $this->Company->find('list', array('conditions' => array('status'=>1)))
        );
        $this->set('companies', $companies);
    }

    public function exportbydate()
    {

        if ($this->request->is('post')) {

            $date = $this->request->data['UserOrder']['date'];

            $datestr = $date['year'] . '-' . $date['month'] . '-' . $date['day'];

            $cond = array(
                'conditions' => array(
                    'UserOrder.created >=' => $datestr . ' 00:00:00',
                    'UserOrder.created <=' => $datestr . ' 23:59:59',
                    'UserOrder.status' => 1
                ),
                'order' => array('UserOrder.company_id' => 'ASC'),
            );

            if ($this->Auth->user('role') == 'companyadmin') {
                $cond['conditions']['UserOrder.company_id'] = $this->myCompanyID;
            } elseif ($this->request->data['UserOrder']['company_id'] != 0) {
                $cond['conditions']['UserOrder.company_id'] = $this->request->data['UserOrder']['company_id'];
            }

            $data = $this->_displayOrders($this->UserOrder->find('all', $cond));
            $toCsvData = $this->_exportData($data);

//            echo json_encode($toCsvData); exit;
            $this->Export->exportCsv($toCsvData);

        }

        $this->loadModel('Company');
        $companies = array_merge(
            array(0=>'All'),
            $this->Company->find('list', array('conditions' => array('status'=>1)))
        );
        $this->set('companies', $companies);
    }

    public function add()
    {

    }

    public function index()
    {
        $arg = array(
            'conditions' => array('UserOrder.status' => 1),
            'order' => array('UserOrder.created' => 'desc'),
        );

        if (in_array($this->Auth->user('role'), array('companyadmin', 'employee'))) {
            $arg['conditions']['UserOrder.company_id'] = $this->myCompanyID;
        }

        if (in_array($this->myRole, array('customer', 'employee')))
            $this->layout = 'homepage';

        $this->set('usersOrder', $this->_displayOrders($this->UserOrder->find('all', $arg)));
    }

    public function delete($id = null)
    {
        if (!$this->UserOrder->exists($id)) {
            throw new NotFoundException(__('Invalid ordert'));
        }
        $this->request->onlyAllow('post', 'delete');
        $this->UserOrder->id = $id;


        if ($this->UserOrder->saveField('status', 0)) {
            $this->Session->setFlash(__('The order has been deleted.'), 'flash-success', array('class' => 'alert alert-success'));
            return $this->redirect(array('action' => 'index'));
        } else {
            $this->Session->setFlash(__('The order could not be deleted. Please, try again.'), 'flash-error', array('class' => 'alert alert-danger'));
        }
    }
}
