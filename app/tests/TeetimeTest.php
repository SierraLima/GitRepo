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
		$teetime->golf_course_id = '1';
		
		// Teetime should save
		$this->assertTrue($teetime->save());
	}

	public function testTeetimeValidationWorks()
	{
		// Set the validator
		$validator = Validator::make(
			array(
				'date' => '01.01.2000 0:00',
				'price' => '120',
				'golf_course_id' => '1'
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
				'price' => '',
				'golf_course_id' => ''
			),
			Teetime::$rules
		);
		
		//  Fails because no value setting
		$this->assertTrue($validator->fails());
	}
	
	public function testTeetimeDateIsRequired()
	{
		$validator = Validator::make(
			array(
				'date' => '',
				'price' => '120',
				'golf_course_id' => '1'
			),
			Teetime::$rules
		);
		
		// Fails because no value setting on date
		$this->assertTrue($validator->fails());
	}
	
	public function testTeetimePriceIsRequired()
	{
		$validator = Validator::make(
			array(
				'date' => '01.01.2000 0:00',
				'price' => '',
				'golf_course_id' => '1'
			),
			Teetime::$rules
		);
		
		// Fails because no value setting on price
		$this->assertTrue($validator->fails());
	}
	
	public function testTeetimeDeleteIsWorking()
	{
		// Create a teetime
		$teetime = new Teetime;
		
		$teetime->date = "01.01.2000 0:00";
		$teetime->price = "120";
		$teetime->golf_course_id = '1';

		// Teetime should save
		$this->assertTrue($teetime->save());
		
		// Destroy teetime
		$this->assertTrue($teetime->destroy($teetime));		
	}
	
}
