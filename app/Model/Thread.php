<?php
App::uses('AppModel', 'Model');
/**
 * Created by PhpStorm.
 * User: WSC
 * Date: 15/11/2016
 * Time: 1:37 PM
 */
class Thread extends AppModel
{
    public $validate = array(
        'user_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
            ),
        ),
        'feedback_id' => array(
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
        'Feedback' => array(
            'className' => 'Feedback',
            'foreignKey' => 'feedback_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );

}