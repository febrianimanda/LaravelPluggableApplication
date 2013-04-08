<?php namespace Calli\MyPlugin;

use Illuminate\Events;


class PluginListener {

	public $pluginName="MyPlugin";
	public $mainMenuEntry = array("label"=>"MyPlugin", "link"=>"/MyPlugin");
	public $pluginData = array(
		"pluginName"=>"MyPlugin",
		"mainMenuEntry"=>array("label"=>"MyPlugin", "link"=>"./MyPlugin"),
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

