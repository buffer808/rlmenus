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
class Order extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'breakfast_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'lunch_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'snack_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'dinner_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

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
		'Breakfast' => array(
			'className' => 'Breakfast',
			'foreignKey' => 'breakfast_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Lunch' => array(
			'className' => 'Lunch',
			'foreignKey' => 'lunch_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Snack' => array(
			'className' => 'Snack',
			'foreignKey' => 'snack_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Dinner' => array(
			'className' => 'Dinner',
			'foreignKey' => 'dinner_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'MidnightSnack' => array(
			'className' => 'MidnightSnack',
			'foreignKey' => 'midnight_snack_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
//		'AddOn' => array(
//			'className' => 'AddOn',
//			'foreignKey' => 'addon_id',
//			'conditions' => '',
//			'fields' => '',
//			'order' => ''
//		)
	);
}
