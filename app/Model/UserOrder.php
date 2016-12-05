<?php
App::uses('AppModel', 'Model');
/**
 * Order Model
 *
 * @property Breakfast $Breakfast
 * @property Lunch $Lunch
 * @property Snack $Snack
 * @property Dinner $Dinner
 */
class UserOrder extends AppModel {

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array();

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        ),
    );
}
