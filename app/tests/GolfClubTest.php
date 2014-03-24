<?php

class GolfClubTest extends TestCase {

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

	public function testGolfClubCreationWorks()
	{
		// Create a golf club
		$golfclub = new GolfClub;
		
		$golfclub->name = "Golf Club de Sion";
		$golfclub->address = "Rue du golf 1";
		$golfclub->email = "golf@club.ch";
		$golfclub->password = Hash::make("password"); // crypt password
		$golfclub->place = "Sion";
		$golfclub->description = "Le meilleur club du Valais";
		$golfclub->phonenumber = "0790000000";

		// Golf club should save
		$this->assertTrue($golfclub->save());
	}

	public function testGolfClubValidationWorks()
	{
		$validator = Validator::make(
			array(
				'name' => 'Golf Club de Sion',
				'address' => 'Rue du golf 1',
				'email' => 'golf@club.ch',
				'password' => 'password',
				'password_confirmation' => 'password',
				'place' => 'Sion',
				'description' => 'Le meilleur club du Valais',
				'phonenumber' => '0790000000'
			),
			GolfClub::$rules
		);

		if($validator->fails())
			echo $validator->messages();

		$this->assertTrue($validator->passes());
	}

	public function testEmailIsRequired()
	{
		$validator = Validator::make(
			array(
				'name' => 'Golf Club de Sion',
				'address' => 'Rue du golf 1',
				'email' => '',
				'password' => 'password',
				'password_confirmation' => 'password',
				'place' => 'Sion',
				'description' => 'Le meilleur club du Valais',
				'phonenumber' => '0790000000'
			),
			GolfClub::$rules
		);

		$this->assertTrue($validator->fails());
	}

	public function testLoginWorks()
	{
		// Create a golf club
		$golfclub = new GolfClub;
		
		$golfclub->name = "Golf Club de Sion";
		$golfclub->address = "Rue du golf 1";
		$golfclub->email = "golf@club.ch";
		$golfclub->password = Hash::make("password"); // crypt password
		$golfclub->place = "Sion";
		$golfclub->description = "Le meilleur club du Valais";
		$golfclub->phonenumber = "0790000000";

		// Golf club should save
		$this->assertTrue($golfclub->save());

		// should login
		$credentials = array(
			'email' => 'golf@club.ch',
			'password' => 'password',
		);

		$this->assertTrue(Auth::golfclub()->attempt($credentials));
	}

	public function testLoginFails()
	{
		$credentials = array(
			'email' => 'golf@club.ch',
			'password' => 'password',
		);

		// we try to login with a golf club we did not create
		$this->assertFalse(Auth::golfclub()->attempt($credentials));
	}

	public function testLoginWithWrongPasswordFails()
	{
		// Create a golf club
		$golfclub = new GolfClub;
		
		$golfclub->name = "Golf Club de Sion";
		$golfclub->address = "Rue du golf 1";
		$golfclub->email = "golf2@club.ch";
		$golfclub->password = Hash::make("password"); // crypt password
		$golfclub->place = "Sion";
		$golfclub->description = "Le meilleur club du Valais";
		$golfclub->phonenumber = "0790000000";

		// Golf club should save
		$this->assertTrue($golfclub->save());

		// should login
		$credentials = array(
			'email' => 'golf2@club.ch',
			'password' => 'password2',
		);

		$this->assertFalse(Auth::golfclub()->attempt($credentials));
	}

	public function testLoginFailsWithCrawler()
	{
		// Perform user login.
		$this->client = $this->createClient(array(), array('HTTP_HOST' => 'scire.test'));
		$crawler = $this->client->request('GET', '/golfclubs/login');
		$form = $crawler->selectButton('Login')->form();
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
	}

	public function testUpdateProfileIsWorking()
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

		// go to the profile
		$crawler = $this->client->request('GET', 'golfclubs/profile');
		$form = $crawler->selectButton('Update')->form();

		$form->setValues(array(
			'name'    => 'Somewhere 23',
			'email'    => 'test@test.ch',
			'address'    => 'Someren',
			'place'    => 'Netherlands',
			'phonenumber'    => 'Netherlands',
			'password' => 'password',
			'password_confirmation'    => 'password',
			'description'    => 'Netherlands'
		));

		$crawler = $this->client->submit($form);
		$crawler = $this->client->followRedirect(true);
		
		// Test that one div: contains updated
		$this->assertCount(1, $crawler->filter('div:contains("updated")'));

		$golfClubDB = GolfClub::find(1);
		
		// Tests Equalities
		$this->assertEquals($golfClubDB->email, 'test@test.ch');
		$this->assertEquals($golfClubDB->address, 'Someren');

		// testing that the public page shows the correct information
		$crawler = $this->client->request('GET', 'show/1');
		$this->assertCount(1, $crawler->filter('html:contains("Someren")'));
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
		$validator = Validator::make(
			array(
				'date' => '01.01.2000 0:00',
				'price' => '120'
			),
			Teetime::$rules
		);

		if($validator->fails())
			echo $validator->messages();

		$this->assertTrue($validator->passes());
	}

}
