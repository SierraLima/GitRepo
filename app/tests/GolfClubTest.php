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
		
		$golfclub->golfclubname = "GC Test";
		$golfclub->lastname = "TestLName";
		$golfclub->firstname = "TestFName";
		$golfclub->email = "email@email.ch";
		$golfclub->password = Hash::make("Password1"); //crypt password
			
		$golfclub->parcours = "9";
		$golfclub->interval = "10";
		//$golfclub->openingtime = Input::get('hour') . ":" . Input::get('minute');
		$golfclub->hour = 8;
		$golfclub->minute = 0;
		$golfclub->website = "www.website.ch";
		$golfclub->country = "France";
		$golfclub->city = "TestCity";
		$golfclub->region = "TestRegion";
		$golfclub->address = "TestAddress";
		$golfclub->zipcode = "TestZIPCode";
		$golfclub->phonenumber = "TestNumber000";
			
		$golfclub->conditions = TRUE;
			
		$golfclub->par = 30;
		$golfclub->sloperating = 100;
		$golfclub->courserating = 100;
		$golfclub->drivingrange = FALSE;
		$golfclub->caddie = TRUE;
		$golfclub->chariot = FALSE;
		$golfclub->chariotelectrique = FALSE;
		$golfclub->voiturette = TRUE;
		$golfclub->locationclubs = TRUE;
		$golfclub->lecon = FALSE;
		$golfclub->chambre = TRUE;
		$golfclub->piscine = FALSE;
		$golfclub->spa = TRUE;
		$golfclub->tennis = FALSE;
			
		$golfclub->logo = "logo.jpg";
		$golfclub->photo = "photo.jpg";

		// Golf club should save
		$this->assertTrue($golfclub->save());
	}

	public function testGolfClubValidationWorks()
	{
		$validator = Validator::make(
			array(
				'golfclubname'=>'GC',
				'lastname'=>'LN',
				'firstname'=>'FN',
				'email'=>'email@email1.ch',
				'password'=> 'Password1',
				'password_confirmation'=>'Password1',
		
				'parcours'=>'9',
				'interval'=>'10',
				'hour'=>'8',
				'minute'=>'0',
				//'second' =>'',
				'website'=>'www.website.ch',
				'country'=>'France',
				'city'=>'TestCity',
				'region'=>'TestRegion',
				'address'=>'TestAddress',
				'zipcode'=>'TestZIPCode',
				'phonenumber' => 'TestNumber000',
		
				'conditions' => '1',
		
				'par' => '30',
				'sloperating' => '100',
				'courserating' => '100',
				'drivingrange' => '0',
				'caddie' => '0',
				'chariot' => '1',
				'chariotelectrique' => '1',
				'voiturette' => '0',
				'locationclubs' => '0',
				'lecon' => '1',
				'chambre' => '0',
				'piscine' => '1',
				'spa' => '0',
				'tennis' => '1',
		
				'logo' => 'logo.jpg',		
				'photo' => 'photo.jpg'
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
				'golfclubname'=>'GC',
				'lastname'=>'LN',
				'firstname'=>'FN',
				'email'=>'', // No email enter
				'password'=> 'Password1',
				'password_confirmation'=>'Password1',
		
				'parcours'=>'9',
				'interval'=>'10',
				'hour'=>'8',
				'minute'=>'0',
				//'second' =>'',
				'website'=>'www.website.ch',
				'country'=>'France',
				'city'=>'TestCity',
				'region'=>'TestRegion',
				'address'=>'TestAddress',
				'zipcode'=>'TestZIPCode',
				'phonenumber' => 'TestNumber000',
		
				'conditions' => '1',
		
				'par' => '30',
				'sloperating' => '100',
				'courserating' => '100',
				'drivingrange' => '0',
				'caddie' => '0',
				'chariot' => '1',
				'chariotelectrique' => '1',
				'voiturette' => '0',
				'locationclubs' => '0',
				'lecon' => '1',
				'chambre' => '0',
				'piscine' => '1',
				'spa' => '0',
				'tennis' => '1',
		
				'logo' => 'logo.jpg',		
				'photo' => 'photo.jpg'
			),
			GolfClub::$rules
		);

		$this->assertTrue($validator->fails());
	}

	public function testLoginWorks()
	{
		// Create a golf club
		$golfclub = new GolfClub;
		
		$golfclub->golfclubname = "GC Test";
		$golfclub->lastname = "TestLName";
		$golfclub->firstname = "TestFName";
		$golfclub->email = "email@email2.ch";
		$golfclub->password = Hash::make("Password1"); //crypt password
			
		$golfclub->parcours = "9";
		$golfclub->interval = "10";
		//$golfclub->openingtime = Input::get('hour') . ":" . Input::get('minute');
		$golfclub->hour = 8;
		$golfclub->minute = 0;
		$golfclub->website = "www.website.ch";
		$golfclub->country = "France";
		$golfclub->city = "TestCity";
		$golfclub->region = "TestRegion";
		$golfclub->address = "TestAddress";
		$golfclub->zipcode = "TestZIPCode";
		$golfclub->phonenumber = "TestNumber000";
			
		$golfclub->conditions = TRUE;
			
		$golfclub->par = 30;
		$golfclub->sloperating = 100;
		$golfclub->courserating = 100;
		$golfclub->drivingrange = FALSE;
		$golfclub->caddie = TRUE;
		$golfclub->chariot = FALSE;
		$golfclub->chariotelectrique = FALSE;
		$golfclub->voiturette = TRUE;
		$golfclub->locationclubs = TRUE;
		$golfclub->lecon = FALSE;
		$golfclub->chambre = TRUE;
		$golfclub->piscine = FALSE;
		$golfclub->spa = TRUE;
		$golfclub->tennis = FALSE;
			
		$golfclub->logo = "logo.jpg";
		$golfclub->photo = "photo.jpg";

		// Golf club should save
		$this->assertTrue($golfclub->save());

		// should login
		$credentials = array(
			'email' => 'email@email2.ch',
			'password' => 'Password1',
		);

		$this->assertTrue(Auth::golfclub()->attempt($credentials));
	}

	public function testLoginFails()
	{
		$credentials = array(
			'email' => 'golf@club.ch',
			'password' => 'Password1',
		);

		// we try to login with a golf club we did not create
		$this->assertFalse(Auth::golfclub()->attempt($credentials));
	}

	public function testLoginWithWrongPasswordFails()
	{
		// Create a golf club
		$golfclub = new GolfClub;
		
		$golfclub->golfclubname = "GC Test";
		$golfclub->lastname = "TestLName";
		$golfclub->firstname = "TestFName";
		$golfclub->email = "email@email3.ch";
		$golfclub->password = Hash::make("Password1"); //crypt password
			
		$golfclub->parcours = "18";
		$golfclub->interval = "10";
		//$golfclub->openingtime = Input::get('hour') . ":" . Input::get('minute');
		$golfclub->hour = 8;
		$golfclub->minute = 0;
		$golfclub->website = "www.website.ch";
		$golfclub->country = "France";
		$golfclub->city = "TestCity";
		$golfclub->region = "TestRegion";
		$golfclub->address = "TestAddress";
		$golfclub->zipcode = "TestZIPCode";
		$golfclub->phonenumber = "TestNumber000";
			
		$golfclub->conditions = TRUE;
			
		$golfclub->par = 30;
		$golfclub->sloperating = 100;
		$golfclub->courserating = 100;
		$golfclub->drivingrange = FALSE;
		$golfclub->caddie = TRUE;
		$golfclub->chariot = FALSE;
		$golfclub->chariotelectrique = FALSE;
		$golfclub->voiturette = TRUE;
		$golfclub->locationclubs = TRUE;
		$golfclub->lecon = FALSE;
		$golfclub->chambre = TRUE;
		$golfclub->piscine = FALSE;
		$golfclub->spa = TRUE;
		$golfclub->tennis = FALSE;
			
		$golfclub->logo = "logo.jpg";
		$golfclub->photo = "photo.jpg";

		// Golf club should save
		$this->assertTrue($golfclub->save());

		// should login
		$credentials = array(
			'email' => 'email@email3.ch',
			'password' => 'Password2',
		);

		$this->assertFalse(Auth::golfclub()->attempt($credentials));
	}

	public function testLoginFailsWithCrawler()
	{
		// Perform user login.
		$this->client = $this->createClient(array(), array('HTTP_HOST' => 'scire.test'));
		$crawler = $this->client->request('GET', '/golfclubs/login');
		$form = $crawler->selectButton('Login')->form();
		$this->client->submit($form, array('email' => 'test@test2.ch', 'password' => 'Password1'));
		$crawler = $this->client->followRedirect(true);
		
		// Test that one div: contains incorrect
		$this->assertCount(1, $crawler->filter('div:contains("incorrect")'));
	}

	public function testLoginSucceedsWithCrawler()
	{	
		// Create a golf club		
		$golfclub = new GolfClub;
		
		$golfclub->golfclubname = "GC Test";
		$golfclub->lastname = "TestLName";
		$golfclub->firstname = "TestFName";
		$golfclub->email = "email@email4.ch";
		$golfclub->password = Hash::make("Password1"); //crypt password
			
		$golfclub->parcours = "18";
		$golfclub->interval = "10";
		//$golfclub->openingtime = Input::get('hour') . ":" . Input::get('minute');
		$golfclub->hour = 8;
		$golfclub->minute = 0;
		$golfclub->website = "www.website.ch";
		$golfclub->country = "France";
		$golfclub->city = "TestCity";
		$golfclub->region = "TestRegion";
		$golfclub->address = "TestAddress";
		$golfclub->zipcode = "TestZIPCode";
		$golfclub->phonenumber = "TestNumber000";
			
		$golfclub->conditions = TRUE;
			
		$golfclub->par = 30;
		$golfclub->sloperating = 100;
		$golfclub->courserating = 100;
		$golfclub->drivingrange = FALSE;
		$golfclub->caddie = TRUE;
		$golfclub->chariot = FALSE;
		$golfclub->chariotelectrique = FALSE;
		$golfclub->voiturette = TRUE;
		$golfclub->locationclubs = TRUE;
		$golfclub->lecon = FALSE;
		$golfclub->chambre = TRUE;
		$golfclub->piscine = FALSE;
		$golfclub->spa = TRUE;
		$golfclub->tennis = FALSE;
			
		$golfclub->logo = "logo.jpg";
		$golfclub->photo = "photo.jpg";
		$golfclub->save();

		// Perform user login.
		$this->client = $this->createClient(array(), array('HTTP_HOST' => 'scire.test'));
		$crawler = $this->client->request('GET', '/golfclubs/login');
		$form = $crawler->selectButton('Login')->form();
		$this->client->submit($form, array('email' => 'email@email4.ch', 'password' => 'Password1'));
		$crawler = $this->client->followRedirect(true);
		
		// Test that one div: contains logged in
		$this->assertCount(1, $crawler->filter('div:contains("logged in")'));
	}

	/* TODO Update when update profil page (new field in register)
	public function testUpdateProfileIsWorking()
	{
		// Create a golf club
		$golfclub = new GolfClub;
		
		$golfclub->name = "Golf Club de Sion";
		$golfclub->address = "Rue du golf 1";
		$golfclub->email = "test@test.ch";
		$golfclub->password = Hash::make("Password1"); // crypt password
		$golfclub->place = "Sion";
		$golfclub->description = "Le meilleur club du Valais";
		$golfclub->phonenumber = "0790000000";
		$golfclub->save();

		// Perform user login.
		$this->client = $this->createClient(array(), array('HTTP_HOST' => 'scire.test'));
		$crawler = $this->client->request('GET', '/golfclubs/login');
		$form = $crawler->selectButton('Login')->form();
		$this->client->submit($form, array('email' => 'test@test.ch', 'password' => 'Password1'));
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
			'password' => 'Password1',
			'password_confirmation'    => 'Password1',
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
	 
	*/

}
