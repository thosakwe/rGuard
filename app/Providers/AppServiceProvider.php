<?php

namespace rGuard\Providers;

use Illuminate\Support\ServiceProvider;
use rGuard\User;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        \Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        \Stripe\Stripe::setApiVersion("2015-10-16");

        User::created(function(User $user) {
            $user->sendConfirmationEmail();
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
