<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class checkauthpermistion
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ...$permission)
    {
        $user = auth()->user()->level;
        if(!in_array($user, $permission)) {
            return redirect()->route('page-403');
        }
        return $next($request);
    }
}
