<?php

namespace rGuard\Console;

use Carbon\Carbon;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use rGuard\License;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        $schedule->call(function () {
            License::all()->each(function (License $license) {
                $app = $license->app;

                if ($app->days_to_expire) {
                    $expiration = $license->created_at->addDays($app->days_to_expire);

                    if (Carbon::now()->diffInDays($expiration, true) <= 0) {
                        $license->notifyOfExpiration();
                        $license->delete();
                    } else if (Carbon::now()->diffInDays($expiration, true) <= 7) {
                        $license->warnOfImminentExpiration();
                    }
                }
            });
        })->daily();
    }
}
