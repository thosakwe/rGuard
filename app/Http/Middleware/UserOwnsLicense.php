<?php

namespace rGuard\Http\Middleware;

use Closure;

class UserOwnsLicense
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
        $license = $request->route()->getParameter('license');
        if ($license->user_id != \Auth::user()->id) {
            return \Response::json(['error' => 'invalid_identity'], 401);
        }
        return $next($request);
    }
}
