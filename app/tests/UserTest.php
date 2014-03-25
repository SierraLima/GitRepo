<?php

class UserTest extends TestCase {

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

	public function testUserCreationWorks()
	{
		// Create a new User
		$user = new User;
		$user->firstname = "John";
		$user->lastname = "Doe";
		$user->email = "test@test.ch";
		$user->licence = "Blabla";
		$user->birthday = "2012-12-12";
		$user->password = Hash::make("password");
		$user->country = "CH";

		// User should save
		$this->assertTrue($user->save());
	}

	public function testUserValidationWorks()
	{
		$validator = Validator::make(
			array(
				'firstname' => 'John',
				'lastname' => 'Doe',
				'email' => 'test@test.ch',
				'licence' => 'Blabla',
				'day' => '12',
				'month' => '12',
				'year' => '2012',
				'password' => 'password',
				'password_confirmation' => 'password',
				'country' => 'CH'
			),
			User::$rules
		);

		if($validator->fails())
			echo $validator->messages();

		$this->assertTrue($validator->passes());

	}

	public function testEmailIsRequired()
	{
		$validator = Validator::make(
			array(
				'firstname' => 'John',
				'lastname' => 'Doe',
				'email' => '',
				'licence' => 'Blabla',
				'day' => '12',
				'month' => '12',
				'year' => '2012',
				'password' => 'password',
				'password_confirmation' => 'password',
				'country' => 'CH'
			),
			User::$rules
		);

		$this->assertTrue($validator->fails());

	}


	public function testLoginWorks()
	{
		// Create a new User
		$user = new User;
		$user->firstname = "John";
		$user->lastname = "Doe";
		$user->email = "test2@test.ch";
		$user->licence = "Blabla";
		$user->birthday = "2012-12-12";
		$user->password = Hash::make("password"); // crypt password
		$user->country = "CH";

		// User should save
		$this->assertTrue($user->save());

		// should login
		$credentials = array(
			'email' => 'test2@test.ch',
			'password' => 'password',
		);

		$this->assertTrue(Auth::user()->attempt($credentials));
	}

	public function testLoginFails()
	{
		$credentials = array(
			'email' => 'test@test.ch',
			'password' => 'password',
		);

		// we try to login with a user we did not create
		$this->assertFalse(Auth::user()->attempt($credentials));
	}

	public function testLoginWithWrongPasswordFails()
	{
		// Create a new User
		$user = new User;
		$user->firstname = "John";
		$user->lastname = "Doe";
		$user->email = "test2@test.ch";
		$user->licence = "Blabla";
		$user->birthday = "2012-12-12";
		$user->password = Hash::make("password"); // crypt password
		$user->country = "CH";

		// User should save
		$this->assertTrue($user->save());

		// should login
		$credentials = array(
			'email' => 'test2@test.ch',
			'password' => 'password2',
		);

		$this->assertFalse(Auth::user()->attempt($credentials));
	}
    
    public function testUpdateProfileIsWorking()
	{
		// Create a user
		$user = new User;
		
		$user->firstname = "Harald";
        $user->lastname = "Schultze";
		$user->email = "harald@schultze.ch";
		$user->birthday = "1900-11-26";
        $user->country = "CH";
		$user->password = Hash::make("password"); // crypt password
		$user->licence = "455";
		$user->save();

		// Perform user login.
		$this->client = $this->createClient(array(), array('HTTP_HOST' => 'scire.test'));
		$crawler = $this->client->request('GET', '/users/login');
		$form = $crawler->selectButton('Login')->form();
		$this->client->submit($form, array('email' => 'harald@schultze.ch', 'password' => 'password'));
		$crawler = $this->client->followRedirect(true);
		
		// Test that one div: contains logged in
		$this->assertCount(1, $crawler->filter('div:contains("logged in")'));

		// go to the profile
		$crawler = $this->client->request('GET', 'profile');
		$form = $crawler->selectButton('Update')->form();

		$form->setValues(array(
			'firstname'    => 'Timo',
            'lastname'    => 'Steffen',
			'email'    => 'test@test.ch',
			'birthday'    => '1900-10-23',
			'country'    => 'Netherlands',
			'password' => 'password',
			'password_confirmation'    => 'password'
		));

		$crawler = $this->client->submit($form);
		$crawler = $this->client->followRedirect(true);
		
		// Test that one div: contains updated
		$this->assertCount(1, $crawler->filter('div:contains("updated")'));

		$userDB = User::find(1);
		
		// Tests Equalities
		$this->assertEquals($userDB->email, 'test@test.ch');
		$this->assertEquals($userDB->firstname, 'Timo');

		// testing that the public page shows the correct information
		$crawler = $this->client->request('GET', 'show/1');
		$this->assertCount(1, $crawler->filter('html:contains("Timo")'));
	}
}
