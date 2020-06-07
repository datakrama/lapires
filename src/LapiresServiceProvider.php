<?php

namespace Datakrama\Lapires;

use Datakrama\Lapires\Controllers\ApiController;
use Datakrama\Lapires\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
use Illuminate\Routing\Controller;
use Illuminate\Support\ServiceProvider;

class LapiresServiceProvider extends ServiceProvider
{
     /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(ExceptionHandler::class, Handler::class);
        $this->app->singleton(Controller::class, ApiController::class);
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // 
    }
}