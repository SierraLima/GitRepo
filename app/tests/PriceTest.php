<?php

class PriceTest extends TestCase {

	/**
	 * Default preparation for each test
	 */
	public function setUp()
	{
		parent::setUp();
		$this->prepareForTests();
	}

	/**
	 * Creates the application
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
	
	public function testPriceCreationWorks()
	{
		// Create a price
		$price = new Price;
		
		$price->amount = "120.00";
		$price->description = "PriceTest";
		$price->golf_club_id = "1";
		
		// Price should save
		$this->assertTrue($price->save());
	}

	public function testPriceValidationWorks()
	{
		// Set the validator
		$validator = Validator::make(
			array(
				'amount' => '120.00',
				'description' => 'PriceTest',
				'golf_club_id' => '1'
			),
			Price::$rules
		);

		if($validator->fails())
			echo $validator->messages();

		// Test must past
		$this->assertTrue($validator->passes());
	}
	
	public function testPriceFieldsAreRequired()
	{
		$validator = Validator::make(
			array(
				'amount' => '',
				'description' => '',
				'golf_club_id' => ''
			),
			Price::$rules
		);
		
		//  Fails because no value setting
		$this->assertTrue($validator->fails());
	}
	
	public function testPriceAmountIsRequired()
	{
		$validator = Validator::make(
			array(
				'amount' => '',
				'description' => 'PriceTest',
				'golf_club_id' => '1'
			),
			Price::$rules
		);
		
		// Fails because no value setting on amount
		$this->assertTrue($validator->fails());
	}
	
	public function testPriceDescriptionIsRequired()
	{
		$validator = Validator::make(
			array(
				'amount' => '120.00',
				'description' => '',
				'golf_club_id' => '1'
			),
			Price::$rules
		);
		
		// Fails because no value setting on description
		$this->assertTrue($validator->fails());
	}
	
	public function testPriceDeleteIsWorking()
	{
		// Create a price
		$price = new Price;
		
		$price->amount = "120.00";
		$price->description = "PriceTest";
		$price->golf_club_id = "1";

		// price should save
		$this->assertTrue($price->save());
		
		// Delete price
		$this->assertTrue($price->delete());		
	}
	
}
