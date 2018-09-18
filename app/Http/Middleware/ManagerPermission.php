<?php

namespace App\Http\Middleware;

use Closure;

class ManagerPermission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if ($request->user()) {
            if ($request->user()->hasPermission('manager')) {
                return $next($request);
            }
        }
        return redirect(route('login'));
    }
}
