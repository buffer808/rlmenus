<?php
App::uses('AppModel', 'Model');
/**
 * Dinner Model
 *
 * @property Company $Company
 */
class Company extends AppModel {
    public $useTable = 'company';
    //
    public $hasMany = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'company_id',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
    );
}
