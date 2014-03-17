<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	protected $layout = "layouts.main";

	// routed from GET request to /users
	public function getIndex()
	{
		$this->layout->content = View::make('home');
	}

	public function getShow($id) {
		
		if($golfclub = GolfClub::find($id)) {
			$media = $golfclub->media;
			$name = $golfclub->name;
			$address = $golfclub->address;
			$email = $golfclub->email;
			$description = $golfclub->description;
			$place = $golfclub->place;
			$phonenumber = $golfclub->phonenumber;
			$this->layout->content = View::make('show')
				->with('media',$media)
				->with('name',$name)
				->with('address',$address)
				->with('email',$email)
				->with('description',$description)
				->with('place',$place)
				->with('phonenumber',$phonenumber);
		}
		else {
			return Redirect::to('index')->with('message', 'This golf club doesn\'t exist.');
		}
	
	
	}

}
