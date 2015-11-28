<?php

namespace rGuard\Http\Middleware;

use Closure;

class UserIsConfirmed
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
        if (!\Auth::user()->confirmed)
            return redirect()->back()->with('error', 'Your account must be confirmed before you do that.');
        return $next($request);
    }
}
