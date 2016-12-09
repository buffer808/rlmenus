<?php
App::uses('AppModel', 'Model');
App::import('Model', 'Company');
App::import('Controller', 'App');
/**
 * UserFeedback Model
 */
class UserFeedback extends AppModel {
    public $useTable = 'user_feedbacks';

    public $belongsTo = array(
        'UserOrder' => array(
            'className' => 'UserOrder',
            'foreignKey' => 'user_order_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Menu' => array(
            'className' => 'Menu',
            'foreignKey' => 'menu_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
        'Rating' => array(
            'className' => 'Rating',
            'foreignKey' => 'rating_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),

    );

    public function afterFind($results, $primary = false) {
        $Company = new Company();
        $app = new AppController();
        foreach ($results as $key => $val) {
            if(isset($val['User'])){
                $compID = $val['User']['company_id'];
                $qry = $Company->findById($compID);
                $results[$key]['Company'] = (isset($qry['Company'])) ? $qry['Company'] : array();
            }
        }
        return $results;
    }

}