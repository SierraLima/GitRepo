<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class GolfClub extends Eloquent implements UserInterface, RemindableInterface {

	// define validation rules
	public static $rules = array(
		'golfclubname'=>'required',
		'lastname'=>'required',
		'firstname'=>'required',
		'email'=>'required|email|unique:golfclubs,email',
		'password'=> 'required|AlphaDash|regex:/\p{Lu}/|regex:/\p{Ll}/|regex:/\pN/|between:6,12|confirmed',
		'password_confirmation'=>'required|AlphaDash|between:6,12',
		
		'parcours'=>'required',
		'interval'=>'required',
		'hour'=>'required|integer',
		'minute'=>'required|integer',
		'second' =>'',
		'website'=>'required',
		'country'=>'required',
		'city'=>'required',
		'region'=>'required',
		'address'=>'required',
		'zipcode'=>'required',
		'phonenumber' => 'required',
		
		'conditions' => 'required',
		
		'par' => 'required|integer',
		'sloperating' => 'required|integer',
		'courserating' => 'required|integer',
		'drivingrange' => '',
		'caddie' => '',
		'chariot' => '',
		'chariotelectrique' => '',
		'voiturette' => '',
		'locationclubs' => '',
		'lecon' => '',
		'chambre' => '',
		'piscine' => '',
		'spa' => '',
		'tennis' => '',
		
		'logo' => 'required',		
		'photo' => 'required'
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

	/**
	 * Foreign key about media
	 *
	 * @return foreign
	 */
	public function media()
	{
		return $this->hasMany('Media');
	}
	
	/**
	 * Foreign key about golfcourses
	 *
	 * @return foreign
	 */
	public function golfcourses()
	{
		return $this->hasMany('GolfCourse');
	}
	
	/**
	 * Foreign key about prices
	 *
	 * @return foreign
	 */
	public function prices()
	{
		return $this->hasMany('Price');
	}
	
}
