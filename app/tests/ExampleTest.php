<?php

class ExampleTest extends TestCase {

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

	/**
	 * A basic functional test example.
	 *
	 * @return void
	 */
	public function testBasicExample()
	{
		$crawler = $this->client->request('GET', '/');
		$this->assertTrue($this->client->getResponse()->isOk());
	}

	/**
	 * Username is required
	 */
	public function testUserCreationWorks()
	{
		// Create a new User
		$user = new User;
		$user->firstname = "lala";
		$user->lastname = "phil";
		$user->email = "test@test.ch";
		$user->licence = "2013-12-27";
		$user->birthday = "2013-12-27";
		$user->password = "password";
		$user->country = "switzerland";

		// User should save
		$this->assertTrue($user->save());

		// // Save the errors
		// $errors = $user->errors()->all();
                //
		// // There should be 1 error
		// $this->assertCount(1, $errors);
                //
		// // The username error should be set
		// $this->assertEquals($errors[0], "The username field is required.");
	}


}
