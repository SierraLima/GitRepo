<?php

class ReservationTest extends TestCase {

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
	
	/*
	public function testReservationCreationWorks()
	{
		// Create a reservation
		$reservation = new Reservation;
		
		$reservation->numberplayer = "4";
		$reservation->user_id = "1";
		$reservation->teetime_id = "1";
		
		// Price should save
		$this->assertTrue($reservation->save());
	}

	public function testPriceValidationWorks()
	{
		// Set the validator
		$validator = Validator::make(
			array(
				'numberplayer' => '4',
				'user_id' => '1',
				'teetime_id' => '1'
			),
			Reservation::$rules
		);

		if($validator->fails())
			echo $validator->messages();

		// Test must past
		$this->assertTrue($validator->passes());
	}
	 * 
	 */
	
}
