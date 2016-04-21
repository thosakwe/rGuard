<?php

namespace rGuard\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use rGuard\Http\Middleware\AuthenticateOnceWithBasicAuth;
use rGuard\Http\Middleware\NotLicensed;
use rGuard\Http\Middleware\UserIdentity;
use rGuard\Http\Middleware\UserIsConfirmed;
use rGuard\Http\Middleware\UserOwnsLicense;

class Kernel extends HttpKernel
{
    /**
     * The application's global HTTP middleware stack.
     *
     * @var array
     */
    protected $middleware = [
        \Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode::class,
        \rGuard\Http\Middleware\EncryptCookies::class,
        \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
        \Illuminate\Session\Middleware\StartSession::class,
        \Illuminate\View\Middleware\ShareErrorsFromSession::class,
        \rGuard\Http\Middleware\VerifyCsrfToken::class,
        \rGuard\Http\Middleware\ForceHTTPS::class,
    ];

    /**
     * The application's route middleware.
     *
     * @var array
     */
    protected $routeMiddleware = [
        'auth' => \rGuard\Http\Middleware\Authenticate::class,
        'auth.basic' => \Illuminate\Auth\Middleware\AuthenticateWithBasicAuth::class,
        'auth.basic.once' => \rGuard\Http\Middleware\AuthenticateOnceWithBasicAuth::class,
        'guest' => \rGuard\Http\Middleware\RedirectIfAuthenticated::class,
        'license.owner' => UserOwnsLicense::class,
        'not_licensed' => NotLicensed::class,
        'user.confirmed' => UserIsConfirmed::class,
        'user.identity' => UserIdentity::class
    ];
}
