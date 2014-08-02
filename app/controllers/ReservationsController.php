<?php

class ReservationsController extends Controller{
	
	protected $layout = "layouts.main";
	
	/**
	 * The database table used by the model.
	 */
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	/**
	 * Validate the reservation
	 */    
    public function postCreate() {
			
		$validator = Validator::make(Input::all(), Reservation::$rules);

		if ($validator->passes()) {	
			
			// validation has passed, save reservation in DB
			$reservation = new Reservation;
		
			$reservation->numberplayer = Input::get('numberplayer');
			$reservation->user_id = Input::get('user_id');
			$reservation->teetime_id = Input::get('teetime_id');
			
			// Reserved the teetime
			$teetime = Teetime::find($reservation->teetime_id);
			$teetime->reserved = Input::get('reserved', TRUE);
			
			$teetime->update();
			$reservation->save();
			
			return Redirect::to('teetimes/search')->with('message', 'Thanks for your reservation!');
		
		} else {
			// validation has failed, display error messages    
			return Redirect::to('teetimes/search')->with('message', 'Sorry an error appends try another teetime !')->withErrors($validator)->withInput();
		}
	}
	
}