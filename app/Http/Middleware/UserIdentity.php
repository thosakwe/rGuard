<?php

namespace rGuard\Http\Middleware;

use Closure;

class UserIdentity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = $request->route()->getParameter('user');
        if ($user->id != \Auth::user()->id) {
            return \Response::json(['error' => 'invalid_identity'], 401);
        }
        return $next($request);
    }
}
