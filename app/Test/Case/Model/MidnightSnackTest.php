<?php
App::uses('MidnightSnack', 'Model');

/**
 * MidnightSnack Test Case
 *
 */
class MidnightSnackTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.midnight_snack',
		'app.menu',
		'app.breakfast',
		'app.order',
		'app.user',
		'app.lunch',
		'app.snack',
		'app.dinner'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->MidnightSnack = ClassRegistry::init('MidnightSnack');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->MidnightSnack);

		parent::tearDown();
	}

}
