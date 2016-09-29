<?php

namespace Goez\LaravelNativeSession\Middleware;

use Closure;

class StartNativeSession
{
    /**
     * Handle an incoming request.
     *
     * @param  $request
     * @param  Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->startSession();
        return $next($request);
    }


    /**
     * Create a new raw PHP session handler instance.
     *
     */
    private function startSession()
    {
        ini_restore('unserialize_callback_func');
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
    }
}