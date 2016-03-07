<?php

namespace rGuard;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Mail\Message;
use SleepingOwl\Models\SleepingOwlModel;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

class User extends SleepingOwlModel implements AuthenticatableContract,
    AuthorizableContract,
    BillableContract,
    CanResetPasswordContract
{
    use Authenticatable, Authorizable, Billable, CanResetPassword, ThrottlesLogins;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'email', 'password', 'confirmation_code'];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = ['password', 'remember_token'];

    /**
     * These columns will be returned as Carbon / DateTime instances instead of raw strings.
     * @var array
     */
    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

    public static function getList()
    {
        $users = User::all();
        $keys = $users->map(function(User $user) {
            return $user->id;
        })->all();
        $values = $users->map(function(User $user) {
            return $user->name;
        })->all();
        return array_combine($keys, $values);
    }

    /**
     * Returns the path to an action, passing this user as a parameter.
     * @param $action string The action to route to.
     * @param array $data Optional route parameters to include.
     * @return string
     */
    public function action($action, $data = [])
    {
        return action($action, array_merge(['user' => $this], $data));
    }

    public function isLicensedForApp(App $app)
    {
        return \rGuard\License::whereAppId($app->id)->whereUserId($this->id)->get()->count() > 0;
    }

    public function licenseForApp(App $app)
    {
        return \rGuard\License::whereAppId($app->id)->whereUserId($this->id)->first();
    }

    public function licenses()
    {
        return $this->hasMany(License::class);
    }

    /**
     * Redirects to an action, passing this user as a parameter.
     * @param $action string The action to route to.
     * @param array $data Optional route parameters to include.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToAction($action, $data = [])
    {
        return redirect()->action($action, array_merge(['user' => $this], $data));
    }

    /**
     * Redirects to a route, passing this user as a parameter.
     * @param $route string The route to route to.
     * @param array $data Optional route parameters to include.
     * @return \Illuminate\Http\RedirectResponse
     */
    public function redirectToRoute($route, $data = [])
    {
        return redirect()->route($route, array_merge(['user' => $this], $data));
    }

    /**
     * Returns the path to a route, passing this user as a parameter.
     * @param $route string The route to route to.
     * @param array $data Optional route parameters to include.
     * @return string
     */
    public function route($route, $data = [])
    {
        return route($route, array_merge(['user' => $this], $data));
    }

    public function sendConfirmationEmail()
    {
        \Mail::send('emails.confirmation', ['user' => $this], function (Message $message) {
            $message
                ->from('no-reply@' . $_SERVER['SERVER_NAME'], config('rguard.title'))
                ->to($this->email)
                ->subject('Confirm your Account on ' . ucwords(config('rguard.title', 'our site')));
        });
    }
}
