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

	public function testApplicationIsRunning()
	{
		$crawler = $this->client->request('GET', '/');
		$this->assertTrue($this->client->getResponse()->isOk());
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

		$this->assertTrue(Auth::attempt($credentials));
	}

	public function testLoginFails()
	{
		$credentials = array(
			'email' => 'test@test.ch',
			'password' => 'password',
		);

		// we try to login with a user we did not create
		$this->assertFalse(Auth::attempt($credentials));
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

		$this->assertFalse(Auth::attempt($credentials));

	}

}
