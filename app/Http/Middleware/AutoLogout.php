<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AutoLogout
{
    protected $timeout = 900;

    /**
     * Handle an incoming request.
     *
     * @param Request $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (!Session::has('lastActivityTime')) {
            Session::put('lastActivityTime', time());
        } elseif (time() - Session::get('lastActivityTime') > $this->getTimeOut()) {
            Session::forget('lastActivityTime');
            auth()->logout();
            return redirect()->route('page-login')->withErrors(['You had not activity in 15 minutes']);
        }
        Session::put('lastActivityTime', time());//f5 browser
        return $next($request);
    }

    protected function getTimeOut()
    {
        return (env('TIMEOUT')) ?: $this->timeout;
    }
}
