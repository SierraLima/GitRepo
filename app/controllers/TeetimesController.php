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
    public function getEndreservation(){
        $this->layout->content = View::make('endreservation');
    }
	
}
