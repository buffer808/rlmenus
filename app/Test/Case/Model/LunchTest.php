<?php
App::uses('Lunch', 'Model');

/**
 * Lunch Test Case
 *
 */
class LunchTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.lunch',
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
		$this->Lunch = ClassRegistry::init('Lunch');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Lunch);

		parent::tearDown();
	}

}
