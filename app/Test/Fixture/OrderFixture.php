<?php
/**
 * OrderFixture
 *
 */
class OrderFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'breakfast_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'lunch_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'snack_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'dinner_id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => false, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'latin1', 'collate' => 'latin1_swedish_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'breakfast_id' => 1,
			'lunch_id' => 1,
			'snack_id' => 1,
			'dinner_id' => 1,
			'created' => '2015-07-11 10:38:47',
			'modified' => '2015-07-11 10:38:47'
		),
	);

}
