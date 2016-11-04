<?php
App::uses('Breakfast', 'Model');

/**
 * Breakfast Test Case
 *
 */
class BreakfastTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.breakfast',
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
		$this->Breakfast = ClassRegistry::init('Breakfast');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Breakfast);

		parent::tearDown();
	}

}
