<?php
App::uses('Snack', 'Model');

/**
 * Snack Test Case
 *
 */
class SnackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.snack',
		'app.menu',
		'app.breakfast',
		'app.order',
		'app.lunch',
		'app.dinner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Snack = ClassRegistry::init('Snack');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Snack);

		parent::tearDown();
	}

}
