<?php

class UsersController extends BaseController {

	protected $layout = "layouts.main";

	/**
	 * The database table used by the model.
	 */
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getProfile')));
	}

	/**
	 * return register page
	 */
	public function getRegister() {
		$this->layout->content = View::make('users.register');
	}
	
	/**
	 * Validate the form of register
	 */
	public function postCreate() {

		$validator = Validator::make(Input::all(), User::$rules);

		if ($validator->passes()) {
				
			// validation has passed, save user in DB
			$user = new User;
			$user->firstname = Input::get('firstname');
			$user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->birthday = Input::get('year') . "-" . Input::get('month') . "-" . Input::get('day');
			$user->country = Input::get('country');
			$user->licence = Input::get('licence');
			$user->password = Hash::make(Input::get('password'));

			$user->save();

			return Redirect::to('users/login')->with('message', 'Thanks for registering!');

		} else {
			// validation has failed, display error messages    
			return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

	/**
	 * return login page
	 */
	public function getLogin() {
		$this->layout->content = View::make('users.login');
	}

	/**
	 * action of register the form
	 */
	public function postSignin() {

		if (Auth::user()->attempt(array('email'=>Input::get('email'), 'password'=>Input::get('password')))) {
			return Redirect::to('users/profile')->with('message', 'You are now logged in!');
		} else {
			return Redirect::to('users/login')
				->with('message', 'Your username/password combination was incorrect')
				->withInput();
		}
	}

	/**
	 * return profile page
	 */
	public function getProfile() {
		if(Auth::user()->check()) {
			$this->layout->content = View::make('users.profile')->with('user', Auth::user()->get());;
		}
		else {
			return Redirect::to('index')->with('message', 'Your are not authorized to see this page!');
		}
	}

	/*
	 * return logout page
	 */
	public function getLogout() {

		Auth::user()->logout();
		return Redirect::to('users/login')->with('message', 'Your are now logged out!');
	}
    
	/**
	 * update profile page
	 * 
	 * @param id -> int to identify a user
	 */
	public function postUpdate($id) {
        
        //Creating some new rules for the validation of this page
        $rules = array(
			'firstname'=>'required|alpha|min:2',
			'lastname'=>'required|alpha|min:2',
			'email'=>'required|email|unique:users,email',
			'birthday'=>'required',
			'country'=>'required|alpha_num',
			'password'=>'required|alpha_num|between:6,12|confirmed',
			'password_confirmation'=>'required|alpha_num|between:6,12'
	    );
        
        $rules['email'] = $rules['email'].','.$id;

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {

			// validation has passed, save user in DB
			$user = User::find($id);

			$user->firstname = Input::get('firstname');
            $user->lastname = Input::get('lastname');
			$user->email = Input::get('email');
			$user->birthday = Input::get('birthday');
			$user->country = Input::get('country');
			$user->password = Hash::make(Input::get('password'));
			$user->update();

			return Redirect::to('users/profile')->with('message', 'Your profile has been updated.');

		} else {
			// validation has failed, display error messages    
			return Redirect::to('users/profile')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}

}
