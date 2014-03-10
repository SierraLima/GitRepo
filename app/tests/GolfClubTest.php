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

}
