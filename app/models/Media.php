<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class Media {

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
	 * Foreign key about golf clubs
	 *
	 * @return foreign
	 */
	public function post()
    {
        return $this->belongsTo('golfclubs');
    }

}
