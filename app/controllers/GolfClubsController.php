<?php

class GolfClubsController extends BaseController {

	protected $layout = "layouts.admin";

	/**
	 * The database table used by the model.
	 */
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getProfile')));
	}

	/**
	 * return home page
	 */
	public function getIndex() {
		$this->layout->content = View::make('admin.home');
	}

	/**
	 * return register page
	 */
	public function getRegister() {
		$this->layout->content = View::make('admin.register');
	}

	/**
	 * return login page
	 */
	public function getLogin() {
		$this->layout->content = View::make('admin.login');
	}


	/**
	 * return profile page
	 */
	public function getProfile() {
		if(Auth::golfclub()->check()) {
			$this->layout->content = View::make('admin.profile')->with('golfclub', Auth::golfclub()->get());
		}
		else {
			return Redirect::to('golfclubs/index')->with('message', 'Your are not authorized to see this page!');
		}
	}

	/**
	 * update profile page
	 * 
	 * @param id -> int to identify a golfclub
	 */
	public function postUpdate($id) {

		// fixing laravel unique issue
		$rules = GolfClub::$rules;
		$rules['email'] = $rules['email'].','.$id;

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {

			// validation has passed, save user in DB
			$golfclub = GolfClub::find($id);

			$golfclub->name = Input::get('name');
			$golfclub->email = Input::get('email');
			$golfclub->address = Input::get('address');
			$golfclub->place = Input::get('place');
			$golfclub->phonenumber = Input::get('phonenumber');
			$golfclub->description = Input::get('description');
			$golfclub->password = Hash::make(Input::get('password'));
			$golfclub->update();

			return Redirect::to('golfclubs')->with('message', 'Your profile has been updated.');

		} else {
			// validation has failed, display error messages    
			return Redirect::to('golfclubs/profile')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	/**
	 * return gallery page
	 */
	public function getGallery() {

		if (Auth::golfclub()->check()) {
			$media = Auth::golfclub()->get()->media;
			$this->layout->content = View::make('admin.gallery')->with('media', $media);
		}
		else {
			return Redirect::to('golfclubs/index')->with('message', 'Your are not authorized to see this page!');
		}
	}

	public function getTeetimes() {

		if (Auth::golfclub()->check()) {
			$this->layout->content = View::make('admin.teetimes');
		}
		else {
			return Redirect::to('golfclubs/index')->with('message', 'Your are not authorized to see this page!');
		}
	}

	/**
	 * return logout page
	 */
	public function getLogout() {

		Auth::golfclub()->logout();
		return Redirect::to('golfclubs/login')->with('message', 'Your are now logged out!');
	}

	/**
	 * return delete page
	 * 
	 * @param id -> int to delete a media
	 */
	public function getDelete($id) {

		if (Auth::golfclub()->check()) {
			// deleting the db record
			$picture = Media::find($id);
			$picture->delete();

			// deleting the actual file
			$url = public_path().'/'.$picture->url;
			File::delete($url);
			return Redirect::to('golfclubs/gallery')->with('message', 'The picture has been deleted.');
		}
		else {
			return Redirect::to('golfclubs/index')->with('message', 'Your are not authorized to see this page!');
		}
	}

	/**
	 * validate the form of register
	 */
	public function postCreate() {

		$validator = Validator::make(Input::all(), GolfClub::$rules);

		if ($validator->passes()) {

			// validation has passed, save user in DB
			$golfclub = new GolfClub;

			$golfclub->name = Input::get('name');
			$golfclub->email = Input::get('email');
			$golfclub->address = Input::get('address');
			$golfclub->place = Input::get('place');
			$golfclub->phonenumber = Input::get('phonenumber');
			$golfclub->password = Hash::make(Input::get('password'));
			$golfclub->save();

			return Redirect::to('golfclubs')->with('message', 'Thanks for registering!');

		} else {
			// validation has failed, display error messages    
			return Redirect::to('golfclubs/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}

	}

	/**
	 * action of register the form
	 */
	public function postSignin() {

		if (Auth::golfclub()->attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('golfclubs')->with('message', 'You are now logged in!');
		} else {
			return Redirect::to('golfclubs/login')
				->with('message', 'Your username/password combination was incorrect')
				->withInput();
		}
	}

	/**
	 * action of upload an image
	 */
	public function postUpload() {

		$media = new Media;

		if(Input::hasFile('image'))
			$file = Input::file('image');
		else
			return Redirect::to('golfclubs/gallery')->with('message', 'You didn\'t choose a file.');

		if($file->getSize()>2097152) // hardcoded phpinfo() value
			return Redirect::to('golfclubs/gallery')->with('message', 'The image you chose is too big.');

		$destinationPath = 'upload/';
		$extension = $file->getClientOriginalExtension();

		$input = array('image' => $file);
		$rules = array('image' => 'image');
		$validator = Validator::make($input, $rules);

		if($validator->fails()) {
			return Redirect::to('golfclubs/gallery')->with('message', 'The file you\'ve sent is not supported.');
		}
		else {
			$filename = sha1(time()).'.'.$extension;
			Input::file('image')->move($destinationPath, $filename);

			$media->url = $destinationPath.$filename;
			$media->golf_club_id = Auth::golfclub()->get()->id;
		}

		if($media->save())
			return Redirect::to('golfclubs/gallery')->with('message', 'The image has been successfully saved!');
		else
			return Redirect::to('golfclubs/gallery')->with('message', 'There was an error. Please try again.');

	}

	public function postTeetimes() {
		$teetime = new Teetime;
		$teetime->date = "2012-03-02";
		$teetime->price = "12";
		$temp = json_decode(Input::get('json'));
		$teetime->test = $temp->key;

		$teetime->save();
		return Redirect::to('golfclubs/teetimes')->with('message', 'Your updates have been saved.');
	
	}

}
