<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class GolfClub extends Eloquent implements UserInterface, RemindableInterface {

	// define validation rules
	public static $rules = array(
		'name'=>'required|alpha',
		'address'=>'required|alpha_num',
		'email'=>'required|email|unique:users',
		'password'=>'required|alpha_num|between:6,12|confirmed',
		'password_confirmation'=>'required|alpha_num|between:6,12',
		'place' => 'required|alpha_num',
		'description' => 'alpha_num',
		'phonenumber' => 'required|alpha_num'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'golfclubs';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
	}

}
