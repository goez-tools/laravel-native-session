<?php

namespace Goez\LaravelNativeSession;

use Illuminate\Session\SessionManager as LaravelSessionManager;
use Illuminate\Support\ServiceProvider as LaravelSeviceProvider;

class ServiceProvider extends LaravelSeviceProvider
{
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->bindSessionManager();
        $this->registerSessionManager();
        $this->registerSessionDriver();
    }

    private function bindSessionManager()
    {
        $this->app->bind(LaravelSessionManager::class, function ($app) {
            return new SessionManager($app);
        });
    }

    private function registerSessionManager()
    {
        $this->app->singleton('session', function ($app) {
            return $app->make(LaravelSessionManager::class);
        });
    }

    private function registerSessionDriver()
    {
        $this->app->singleton('session.store', function ($app) {
            $manager = $app['session'];
            return $manager->driver();
        });
    }
}