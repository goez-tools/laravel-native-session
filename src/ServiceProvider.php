<?php

namespace Goez\LaravelNativeSession;

use Goez\LaravelNativeSession\Middleware\StartNativeSession;
use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider as LaravelSeviceProvider;

class ServiceProvider extends LaravelSeviceProvider
{
    public function boot(Kernel $kernel)
    {
        $kernel->prependMiddleware(StartNativeSession::class);
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->extendNativeDriver();
        $this->registerFacade();
    }

    /**
     * Extend native driver
     */
    private function extendNativeDriver()
    {
        $this->app['session']->extend('native', function ($app) {
            return new NativeSessionHandler();
        });
    }

    private function registerFacade()
    {
        $this->app->singleton('native-session', function () {
            return new Store();
        });
    }
}