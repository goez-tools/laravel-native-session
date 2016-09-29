<?php

namespace Goez\LaravelNativeSession;

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
        $this->registerFacade();
    }

    private function registerFacade()
    {
        $this->app->singleton('native-session', function ($app) {
            $session = $app['session.store'];
            return new Store($session);
        });
    }
}