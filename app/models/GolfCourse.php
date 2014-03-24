<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class GolfCourse extends Eloquent {

	// define validation rules
	public static $rules = array(
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'golfcourses';

	/**
	 * Foreign key about golfclubs
	 *
	 * @return foreign
	 */
	public function golfclubs()
	{
		return $this->belongsTo('GolfClub');
	}
	
	/**
	 * Foreign key about teetimes
	 *
	 * @return foreign
	 */
	public function teetimes()
	{
		return $this->hasMany('Teetime');
	}
	
}
