<?php

class ModulesController extends BaseController {

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
	
	public function showModules()
	{
		$event = Event::fire('query.modules');
		$modulesListResult = Module::all();
		$foldersListResult = Folder::all();
		
		$event = Event::fire('listed.modules',$modulesListResult);
		$event = Event::fire('construct.modules');
		Log::info('an event was fired');
		return View::make('modules')->with(array('modulesList'=>$modulesListResult, 'foldersList'=>$foldersListResult));
	}
	
	public function showModule($moduleId)
	{
		$module = Module::find($moduleId);
		
		return View::make('rte')->with(array('module'=>$module));
	}
}