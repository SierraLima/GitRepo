<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Price extends Eloquent {

	// define validation rules
	public static $rules = array(
		'amount'=>'required',
		'description'=>'required'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'prices';

	/**
	 * Foreign key about golfclubs
	 *
	 * @return foreign
	 */
	public function golfclubs()
	{
		return $this->belongsTo('GolfClub');
	}
	
}
