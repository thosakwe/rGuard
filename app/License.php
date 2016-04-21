<?php

namespace rGuard;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Mail\Message;
use rGuard\Traits\AngularDateTrait;
use SleepingOwl\Models\SleepingOwlModel;

class License extends SleepingOwlModel
{

    protected $guarded = ['downloads'];

    protected $hidden = ['app_id', 'user_id', 'code'];

    protected $appends = ['download_url'];

    /**
     * Generates a new license code.
     * @return string
     */
    public static function generateCode()
    {
        do {
            $code = strtoupper(str_random(5) . '-' . str_random(5) . '-' . str_random(5) . '-' . str_random(5));
        } while (License::whereCode($code)->count() > 0);
        return $code;
    }

    public function getDownloadUrlAttribute()
    {
        return action('Api\LicenseController@getDownload', ['license' => $this]);
    }

    public static function make(App $app)
    {
        $license = License::create([
            'app_id' => $app->id,
            'code' => License::generateCode(),
            'user_id' => \Auth::user()->id,
            'licensed_to' => \Auth::user()->name
        ]);
        if ($app->days_to_expire > 0) {
            $license->expires = Carbon::now()->addDays($app->days_to_expire);
        } else $license->expires = null;
        if ($license->save()) {
            return redirect()
                ->action('LicenseController@show', ['license' => $license])
                ->with('success', "Successfully purchased $app->name.");
        } else {
            return redirect()->back()->with('error', 'Could not license application to you. Please try again later.');
        }
    }

    public function app()
    {
        return $this->belongsTo(\rGuard\App::class);
    }

    public function getDates()
    {
        return array_merge(parent::getDates(), ['expires']);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function notifyOfPurchase() {
        \Mail::send('emails.purchase', ['license' => $this], function (Message $message) {
            $message
                ->from('no-reply@' . $_SERVER['SERVER_NAME'], config('rguard.title'))
                ->to($this->user->email)
                ->subject('Purchase Success');
        });
    }

    public function warnOfImminentExpiration() {
        \Mail::send('emails.expiring', ['license' => $this], function (Message $message) {
            $message
                ->from('no-reply@' . $_SERVER['SERVER_NAME'], config('rguard.title'))
                ->to($this->user->email)
                ->subject('License Expiring Soon');
        });
    }

    public function notifyOfExpiration() {
        \Mail::send('emails.expired', ['license' => $this], function (Message $message) {
            $message
                ->from('no-reply@' . $_SERVER['SERVER_NAME'], config('rguard.title'))
                ->to($this->user->email)
                ->subject('License Expiring Soon');
        });
    }
}
