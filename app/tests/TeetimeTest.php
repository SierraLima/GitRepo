<?php

class TeetimeTest extends TestCase {

	/**
	 * Default preparation for each test
	 */
	public function setUp()
	{
		parent::setUp();
		$this->prepareForTests();
	}

	/**
	 * Creates the application.
	 *
	 * @return Symfony\Component\HttpKernel\HttpKernelInterface
	 */
	public function createApplication()
	{
		$unitTesting = true;
		$testEnvironment = 'testing';
		return require __DIR__.'/../../bootstrap/start.php';
	}

	/**
	 * Migrate the database
	 */
	private function prepareForTests()
	{
		Artisan::call('migrate');
	}

	public function testTeetimeCreationWorks()
	{
		// Create a teetime
		$teetime = new Teetime;
		
		$teetime->date = "01.01.2000 0:00";
		$teetime->price = "120";

		// Teetime should save
		$this->assertTrue($teetime->save());
	}

	public function testTeetimeValidationWorks()
	{
		// Set the validator
		$validator = Validator::make(
			array(
				'date' => '01.01.2000 0:00',
				'price' => '120'
			),
			Teetime::$rules
		);

		if($validator->fails())
			echo $validator->messages();

		// Test must past
		$this->assertTrue($validator->passes());
	}
	
	public function testTeetimeFieldsAreRequired()
	{
		$validator = Validator::make(
			array(
				'date' => '',
				'price' => ''
			),
			Teetime::$rules
		);

		$this->assertTrue($validator->fails());
	}

/*	
	public function testTeetimeDeleteIsWorking()
	{
		
	}
	*/	
}
