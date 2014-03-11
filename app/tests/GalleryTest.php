<?php
use Symfony\Component\HttpFoundation\File\UploadedFile;

class GalleryTest extends TestCase {

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

	public function testPhotoUploadIsWorking() {
		$path = app_path().'/tests/';
		$filename = "test.jpg";
		$mimeType = "image/jpeg";

		$file = new UploadedFile(
			$path . $filename, 
			$filename,
			$mimeType,
			filesize($path.$filename),
			UPLOAD_ERR_OK,
			true
		);


		$this -> call (
			'POST', 
			'golfclubs/upload', 
			array('image' => $file)
		);

		$this->assertResponseOk();
	}


}
