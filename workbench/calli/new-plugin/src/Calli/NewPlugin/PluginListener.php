<?php namespace Calli\NewPlugin;

use Illuminate\Events;


class PluginListener {

	public $pluginName="NewPlugin";
	public $mainMenuEntry = array("label"=>"NewPlugin", "link"=>"/NewPlugin");
	public $pluginData = array(
		"pluginName"=>"NewPlugin",
		"mainMenuEntry"=>array("label"=>"NewPlugin", "link"=>"./NewPlugin"),
	);
	/**
	* Register the listeners for the subscriber.
	*
	* @param  Illuminate\Events\Dispatcher  $events
	* @return array
	*/
	public function startListeners($appEvents)
	{
		$pluginData = $this->pluginData;
		$appEvents->listen('construct.home', function() use($pluginData) {
			return $pluginData;
		});
	}
}

