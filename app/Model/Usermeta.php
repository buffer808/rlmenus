<?php
App::uses('AppModel', 'Model');
/**
 * Dinner Model
 *
 * @property Usermeta $Usermeta
 * @property User $User
 */
class Usermeta extends AppModel {

    public $useTable = 'usermeta';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'user_id' => array(
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

}
