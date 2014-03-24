<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Teetime extends Eloquent {

	// define validation rules
	public static $rules = array(
		'date'=>'required',
		'price'=>'required'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'teetimes';

	/**
	 * Foreign key about golfcourses
	 *
	 * @return foreign
	 */
	public function golfcourses()
	{
		return $this->belongsTo('GolfCourse');
	}

}
