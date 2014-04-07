<?php

class ReservationsController extends Controller{
    
    public function postCreate() {

				
			// validation has passed, save user in DB
			$reservation = new Reservation;
			$reservation->numberplayer = Input::get('numberplayer');
			$reservation->user_id = Input::get('fk_idgolfer');
			$reservation->teetime_id = Input::get('fk_idteetime');

			$reservation->save();

			return Redirect::to('teetimes/endreservation')->with('message', 'Thanks for your reservation!');
		}
}