<?php namespace Wwallace\EasyPoll\ServiceProviders;

use Illuminate\Support\ServiceProvider;
use Wwallace\EasyPoll\EasyPoll;

class EasyPollServiceProvider extends ServiceProvider {

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
		$this->package('wwallace/easypoll');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->app['easypoll'] = $this->app->share(function($app)
		{
			return new EasyPoll();
		});
		$this->app->booting(function()
		{
			$loader = \Illuminate\Foundation\AliasLoader::getInstance();
			$loader->alias('EasyPoll', 'Wwallace\EasyPoll\Facades\EasyPollFacade');
		});

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