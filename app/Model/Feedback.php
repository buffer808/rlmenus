<?php
App::uses('AppModel', 'Model');
/**
 * Created by PhpStorm.
 * User: WSC
 * Date: 15/11/2016
 * Time: 1:37 PM
 */
class Feedback extends AppModel
{

    public $validate = array(
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
    );

    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

    public $hasMany = array(
        'Thread' => array(
            'className' => 'Thread',
            'foreignKey' => 'feedback_id',
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