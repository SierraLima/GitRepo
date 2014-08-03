<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Reservation extends Eloquent {

	// define validation rules
	public static $rules = array(
		'numberplayer'=>'required'
	);

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'reservations';

	/**
	 * Foreign key about users
	 *
	 * @return foreign
	 */
	public function users()
	{
		return $this->belongsTo('User');
	}
	
	/**
	 * Foreign key about teetimes
	 *
	 * @return foreign
	 */
	public function teetimes()
	{
		return $this->belongsTo('Teetime');
	}

}
