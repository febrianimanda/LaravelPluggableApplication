<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	*/

	public function showLogin()
	{
		$event = Event::fire('construct.home');
		return Redirect::to('login');
	}
	
	public function showHome()
	{
		$event = Event::fire('construct.home');
		$pluginList = array();
		foreach ($event as $key=>$value)
		{
			 array_push ($pluginList, $value);
		}
		return View::make('home')->with(array("pluginList" => $pluginList));
	}
}