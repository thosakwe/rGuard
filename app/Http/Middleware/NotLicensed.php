<?php

namespace rGuard\Http\Middleware;

use Closure;

class NotLicensed
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
        $app = $request->route()->getParameter('app');
        if (\Auth::user()->isLicensedForApp($app))
            return redirect()->route('license.show', [
                'license' => \Auth::user()->licenseForApp($app)
            ])->with("error", "You have already purchased this product.");
        return $next($request);
    }
}
