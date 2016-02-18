<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

	/**
	* Register bindings in the container
	*
	* @return void
	*/
	public function boot() {

		view()->composer(
			'tasks/*', 'App\Http\ViewComposers\ProfileComposer'
		);
	}

	/**
	* Register the service provider
	*
	* @return void
	*/
	public function register() {

	}
}