<?php

namespace Ipecompany\Smsirlaravel;

use Illuminate\Support\ServiceProvider;

class SmsirlaravelServiceProvider extends ServiceProvider
{
    protected $defer = true;
	
    /**
     * Bootstrap the application services.
     *
     * @return void
     */

    public function boot()
    {
	    // for publish the smsirlaravel config file to the main app config folder
	    $this->publishes([
		    __DIR__.'/config/smsirlaravel.php' => config_path('smsirlaravel.php'),
	    ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
    	// set the main config file
	    $this->mergeConfigFrom(
		    __DIR__.'/config/smsirlaravel.php', 'smsirlaravel'
	    );

		// bind the Smsirlaravel Facade
	    $this->app->bind('Smsirlaravel', function () {
		    return new Smsirlaravel;
	    });
    }
	
    public function provides()
    {
        return ['Smsirlaravel'];
    }
}
