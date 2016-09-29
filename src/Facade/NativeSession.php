<?php

namespace Goez\LaravelNativeSession\Facade;

use Illuminate\Support\Facades\Facade;

class NativeSession extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor()
    {
        return 'native-session';
    }
}