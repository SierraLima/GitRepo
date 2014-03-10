<?php

class GolfClubsController extends BaseController {

	protected $layout = "layouts.admin";

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getProfile')));
	}

	/**
	 * return register page
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
		$this->layout->content = View::make('login');
	}


	/**
	 * return profile page
	 */
	public function getProfile() {
		$this->layout->content = View::make('admin.profile');
	}

	/**
	 * return logout page
	 */
	public function getLogout() {

		Auth::logout();
		return Redirect::to('login')->with('message', 'Your are now logged out!');
	}
	
	/*
	 * Validate the form of register
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
			$golfclub->description = Input::get('description');
			$golfclub->password = Hash::make(Input::get('password'));
			$golfclub->save();

			return Redirect::to('golfclubs')->with('message', 'Thanks for registering!');

		} else {
			// validation has failed, display error messages    
			return Redirect::to('golfclubs/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}

	}


	/*
	 * action of register the form
	 */
	public function postSignin() {

		if (Auth::attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('golfclubs')->with('message', 'You are now logged in!');
		} else {
			return Redirect::to('golfclubs/login')
				->with('message', 'Your username/password combination was incorrect')
				->withInput();
		}
	}



}
