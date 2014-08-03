<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Media extends Eloquent {

	// define validation rules
	public static $rules = array(
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'media';

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
