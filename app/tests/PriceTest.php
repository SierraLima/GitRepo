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
		$price->golf_club_id = '1';
		
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
		// Create a teetime
		$price = new Price;
		
		$price->amount = "120.00";
		$price->description = "PriceTest";
		$price->golf_club_id = '1';

		// Teetime should save
		$this->assertTrue($price->save());
		
		// Delete teetime
		$this->assertTrue($price->delete());		
	}
	/*
	public function testPriceFailsWithCrawler()
	{
		// Perform user create a price.
		$this->client = $this->createClient(array(), array('HTTP_HOST' => 'scire.test'));
		$crawler = $this->client->request('GET', '/golfclubs/prices');
		$form = $crawler->selectButton('')->form();
		$this->client->submit($form, array('email' => 'test@test2.ch', 'password' => 'password'));
		$crawler = $this->client->followRedirect(true);
		
		// Test that one div: contains incorrect
		$this->assertCount(1, $crawler->filter('div:contains("incorrect")'));
	}

	public function testLoginSucceedsWithCrawler()
	{	
		// Create a golf club		
		$golfclub = new GolfClub;
		
		$golfclub->name = "Golf Club de Sion";
		$golfclub->address = "Rue du golf 1";
		$golfclub->email = "test@test.ch";
		$golfclub->password = Hash::make("password"); // crypt password
		$golfclub->place = "Sion";
		$golfclub->description = "Le meilleur club du Valais";
		$golfclub->phonenumber = "0790000000";
		$golfclub->save();

		// Perform user login.
		$this->client = $this->createClient(array(), array('HTTP_HOST' => 'scire.test'));
		$crawler = $this->client->request('GET', '/golfclubs/login');
		$form = $crawler->selectButton('Login')->form();
		$this->client->submit($form, array('email' => 'test@test.ch', 'password' => 'password'));
		$crawler = $this->client->followRedirect(true);
		
		// Test that one div: contains logged in
		$this->assertCount(1, $crawler->filter('div:contains("logged in")'));
	}*/
	
}
