<?php
App::uses('Dinner', 'Model');

/**
 * Dinner Test Case
 *
 */
class DinnerTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.dinner',
		'app.menu',
		'app.order'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Dinner = ClassRegistry::init('Dinner');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Dinner);

		parent::tearDown();
	}

}
