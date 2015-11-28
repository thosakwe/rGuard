<?php

namespace rGuard\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;
use rGuard\Http\Middleware\UserIdentity;
use rGuard\Http\Middleware\UserIsConfirmed;

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
        'guest' => \rGuard\Http\Middleware\RedirectIfAuthenticated::class,
        'user.confirmed' => UserIsConfirmed::class,
        'user.identity' => UserIdentity::class
    ];
}
