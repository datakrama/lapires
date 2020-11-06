<?php

namespace Datakrama\Lapires;

use Datakrama\Lapires\Exceptions\Handler;
use Illuminate\Contracts\Debug\ExceptionHandler;
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
        $this->mergeConfigFrom(
            $this->configPath(),
            'lapires'
        );
        if ($this->getOption('exception')) {
            $this->app->singleton(ExceptionHandler::class, Handler::class);
        }
    }
    
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            $this->configPath() => config_path('lapires.php'),
        ], 'lapires');
    }

    /**
     * Set the config path
     *
     * @return string
     */
    protected function configPath()
    {
        return __DIR__ . '/../config/lapires.php';
    }

    /**
     * Get config option
     *
     * @param string $key
     * @return void
     */
    public function getOption($key = '')
    {
        $config = $this->app['config']->get('lapires');
        return $config[$key];
    }
}
