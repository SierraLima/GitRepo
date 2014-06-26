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

			$golfclub->golfclubname = Input::get('golfclubname');
			$golfclub->lastname = Input::get('lastname');
			$golfclub->firstname = Input::get('firstname');
			$golfclub->email = Input::get('email');
			
			$golfclub->password = Hash::make(Input::get('password'));
			
			$golfclub->parcours = Input::get('parcours');
			$golfclub->interval = Input::get('interval');
			$golfclub->openingtime = Input::get('hour') . ":" . Input::get('minute');
			$golfclub->website = Input::get('website');
			$golfclub->country = Input::get('country');
			$golfclub->city = Input::get('city');
			$golfclub->region = Input::get('region');
			$golfclub->address = Input::get('address');
			$golfclub->zipcode = Input::get('zipcode');
			$golfclub->phonenumber = Input::get('phonenumber');
			
			$golfclub->conditions = Input::get('conditions');
			
			$golfclub->par = Input::get('par');
			$golfclub->drivingrange = Input::get('drivingrange');
			$golfclub->sloperating = Input::get('sloperating');
			$golfclub->courserating = Input::get('courserating');
			$golfclub->equipment = Input::get('equipment');
			$golfclub->services = Input::get('services');
			
			$golfclub->photo = Input::get('photo');
			
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

	/**
	 * return prices page
	 */	
	public function getPrices() {

		if (Auth::golfclub()->check()) {
			$prices = Auth::golfclub()->get()->prices;
			$this->layout->content = View::make('admin.prices')->with('prices', $prices);
		}
		else {
			return Redirect::to('golfclubs/index')->with('message', 'Your are not authorized to see this page!');
		}
	}

	/**
	 * return teetimes page
	 * 
	 * @param date -> date of the teetime
	 */	
	public function getTeetimes($date) {

		if (Auth::golfclub()->check()) {
			$teetimes = Auth::golfclub()->get()->golfcourses[0]->teetimes;
			$prices = Auth::golfclub()->get()->prices;

			$this->layout->content = View::make('admin.teetimes')->with('teetimes', $teetimes)->with('date',$date)->with('prices',$prices);
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
	 * return delete page of media
	 * 
	 * @param id -> int to delete the corresponding media
	 */
	public function getDeletemedia($id) {

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
	 * return delete page of prices
	 * 
	 * @param id -> int to delete the corresponding price
	 */
	public function getDeleteprice($id) {

		if (Auth::golfclub()->check()) {
				
			// deleting the db record
			$price = Price::find($id);
			$price->delete();

			// deleting the actual file
			return Redirect::to('golfclubs/prices')->with('message', 'The price has been deleted.');
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

			$golfclub->golfclubname = Input::get('golfclubname');
			$golfclub->lastname = Input::get('lastname');
			$golfclub->firstname = Input::get('firstname');
			$golfclub->email = Input::get('email');
			
			$golfclub->password = Hash::make(Input::get('password'));
			
			$golfclub->parcours = Input::get('parcours');
			$golfclub->interval = Input::get('interval');
			$golfclub->openingtime = Input::get('hour') . ":" . Input::get('minute');
			$golfclub->website = Input::get('website');
			$golfclub->country = Input::get('country');
			$golfclub->city = Input::get('city');
			$golfclub->region = Input::get('region');
			$golfclub->address = Input::get('address');
			$golfclub->zipcode = Input::get('zipcode');
			$golfclub->phonenumber = Input::get('phonenumber');
			
			$golfclub->conditions = Input::get('conditions');
			
			$golfclub->par = Input::get('par');
			$golfclub->drivingrange = Input::get('drivingrange');
			$golfclub->sloperating = Input::get('sloperating');
			$golfclub->courserating = Input::get('courserating');
			$golfclub->equipment = Input::get('equipment');
			$golfclub->services = Input::get('services');
			
			$golfclub->photo = Input::get('photo');
			
			$golfclub->save();
			
			// Set a default golfcourse
			$golfcourse = new GolfCourse;
			
			$golfcourse->holenumber = 0;
			$golfcourse->golf_club_id = $golfclub->id;
			$golfcourse->save();

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

		// Create a new media (image)
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

		// Check the rules
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
	
	/**
	 * action of create a price
	 */
	public function postNewprice() {

		// Create a new price
		$price = new Price;

		$validator = Validator::make(Input::all(), Price::$rules);

		// Check the rules
		if ($validator->passes()) {
			$price->amount = Input::get('amount');
			$price->description = Input::get('description');
			$price->golf_club_id = Auth::golfclub()->get()->id;
		}
		else
			return Redirect::to('golfclubs/prices')->with('message', 'There was an error with the values you inserted.');

		if($price->save())
			return Redirect::to('golfclubs/prices')->with('message', 'Your price has been successfully added!');
	}

	/**
	 * action of create a teetime
	 */
	public function postTeetimes() {

		// getting the JSON back
		$json = json_decode(Input::get('json'));
		$date = $json->date;

		for ($i = 0; $i < count($json->updates); $i++) {
			$action = $json->updates[$i]->action;

			// treating the JSON
			if($action=="delete") {
				if(isset($json->updates[$i]->id)) {
					$teetime = Teetime::where('id', '=', $json->updates[$i]->id)->firstOrFail();
					
					// with firstOrFail() you have to use destroy()
					Teetime::destroy($teetime->id);
				}
				else {
					return Redirect::to("golfclubs/teetimes/$date")->with('message', 'Tee-times in red can\'t be deleted. Please do the modifications once again.');
				}
			}
			elseif($action=="liberate") {
					
				// saving a new tee-time in the database
				$formattedDate = $date.' '.$json->updates[$i]->hour.':'.$json->updates[$i]->minutes;
				$teetime = new Teetime;
				$teetime->date = $date;
				$teetime->golf_course_id = Auth::golfclub()->get()->golfcourses[$json->updates[$i]->course]->id;
				$teetime->price = $json->updates[$i]->price;
				$teetime->date = $formattedDate;
				$teetime->save();
			}
		}
		$teetime->save();
		return Redirect::to("golfclubs/teetimes/$date")->with('message', 'Your updates have been saved.');
	}
}
