<?php

namespace Goez\LaravelNativeSession;

use Illuminate\Session\SessionManager as LaravelSessionManager;

class SessionManager extends LaravelSessionManager
{
    protected function buildSession($handler)
    {
        $session = parent::buildSession($handler);
        return new Store($session);
    }
}