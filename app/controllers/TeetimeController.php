<?php

class TeetimeController extends BaseController {

	protected $layout = "layouts.main";

	// routed from GET request to /users
	public function getSearch()
	{
		$this->layout->content = View::make('search');
	}

}
