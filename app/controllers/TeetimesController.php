<?php

class TeetimesController extends BaseController {

	protected $layout = "layouts.main";
	
	/**
	 * The database table used by the model.
	 */
	public function __construct() {
		$this->beforeFilter('csrf', array('on'=>'post'));
		$this->beforeFilter('auth', array('only'=>array('getProfile')));
	}

	/**
	 * return search tee-time page
	 */
	public function getSearch(){
		$this->layout->content = View::make('search');//->with('teetimes', Teetime::all());
	}
    
    /**
	 * return reservation page
	 */
    public function getReservation(){
        $this->layout->content = View::make('reservation');   
    }
}
