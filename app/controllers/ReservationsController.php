<?php

class ReservationsController extends Controller{
    
    public function postCreate() {

				
			// validation has passed, save user in DB
			$reservation = new Reservation;
			$reservation->numberplayer = Input::get('numberplayer');
			$reservation->user_id = Input::get('user_id');
			$reservation->teetime_id = Input::get('teetime_id');

			$reservation->save();

			return Redirect::to('teetimes/endreservation')->with('message', 'Thanks for your reservation!');
		}
}