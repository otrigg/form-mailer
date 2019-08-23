<?php

namespace Otrigg\Formmailer\Providers;

use Illuminate\Support\ServiceProvider;

class FormmailerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        
        $this->app->make('Otrigg\Formmailer\Http\Controllers\FormmailerController');
        $this->loadViewsFrom(__DIR__.'/../views/', 'formmailer');
        $this->app['router']->aliasMiddleware('checkform', 'Otrigg\Formmailer\Http\Middleware\CheckForm');
        $this->mergeConfigFrom(__DIR__.'/../config/formmailer.php', 'formmailer');

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
       
        include __DIR__.'/../routes/routes.php';
        
        $this->publishes([
            // Config
            __DIR__.'/../config/formmailer.php' => config_path('formmailer.php'),
        ], 'formmailer');
        
    }
}
