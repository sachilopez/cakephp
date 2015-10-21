<?php
App::uses('Prueba', 'Model');

/**
 * Prueba Test Case
 *
 */
class PruebaTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.prueba'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Prueba = ClassRegistry::init('Prueba');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Prueba);

		parent::tearDown();
	}

}
