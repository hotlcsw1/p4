<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        # "user" variable made available to all the views
        view()->composer('*', function($view) {
            $view->with('user', \Auth::user());
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        #
    }
}
