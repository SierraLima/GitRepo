<?php

class TeetimesController extends BaseController {

	protected $layout = "layouts.main";
	
	/**
	 * The database table used by the model.
	 */
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
	}

	/**
	 * return search tee-time page
	 */
	public function getSearch(){
		$this->layout->content = View::make('search')->with('teetimes', Teetime::orderBy('date')->get());
	}
    
    /**
	 * return reservation page
	 */
    public function getReservation($id, $numberofplayers, $golfclubid, $date){
        $this->layout->content = View::make('reservation')->with('id',$id)->with('numberofplayers', $numberofplayers)->with('golfclubid', $golfclubid)->with('date', $date);   
    }
    
   	/**
	 * return reservation page 2
	 */
    public function getReservation2($golfclubid, $teetimeid, $numberofplayers, $date){
        
        if (Auth::user()->check()) { $userid = Auth::user()->get()->id; } else { $userid = 0; }
        
        $this->layout->content = View::make('reservation2')->with('golfclubid', $golfclubid)->with('teetimeid', $teetimeid)->with('numberofplayers', $numberofplayers)->with('date', $date)->with('userid',$userid);   
    }
    
    /**
	 * return end of reservation page
	 */
    public function getEndreservation($teetimeid){
        $this->layout->content = View::make('endreservation')->with('teetimeid', $teetimeid);
    }
	
	/*
	/**
	 * Update a teetime reserved
	 * 
	 * @param id -> int to identify a teetime
	 *
	public function postUpdate($id) {

		$rules = Teetime::$rules;

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->passes()) {

			// validation has passed, update teetime in DB
			$reserved = 1;
			
			$teetime = Teetime::find($id);

			$teetime->date = Input::get('date');
			$teetime->price = Input::get('price');
			$teetime->reserved = $reserved;

			$teetime->update();

		} else {
			// validation has failed, display error messages    
			return Redirect::to('teetimes/endreservation')->with('message', 'The following errors occurred')->withErrors($validator)->withInput();
		}
	}
	*/
	
}
