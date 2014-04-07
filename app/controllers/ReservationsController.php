<?php

class ReservationsController extends Controller{
    
    public function postCreate() {

				
			// validation has passed, save user in DB
			$reservation = new Reservation;
			$reservation->numberplayer = Input::get('numberplayer');
			$reservation->user_id = Input::get('fk_idgolfer');
			$reservation->teetime_id = Input::get('fk_idteetime');

			$reservation->save();

			//return Redirect::to('users/login')->with('message', 'Thanks for registering!');

        
            // validation has failed, display error messages    
			//return Redirect::to('users/register')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}

}