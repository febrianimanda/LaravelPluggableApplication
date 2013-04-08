<?php namespace Calli\MyPlugin;

use Illuminate\Support\ServiceProvider;
use Calli\MyPlugin\PluginListener;


class MyPluginServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('calli/my-plugin');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		include __DIR__.'\..\..\routes.php';
		$subscriber = new PluginListener;
		$subscriber->startListeners($this->app['events']);
	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}