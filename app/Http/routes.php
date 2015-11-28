<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', ['as' => 'index', function () {
    return view('welcome');
}]);

Route::get('/home', function() {
    return redirect()->route('index');
});

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

Route::model('app', \rGuard\App::class);
Route::model('license', \rGuard\License::class);
Route::model('user', \rGuard\User::class);

Route::resource('app', 'AppController');
Route::resource('license', 'LicenseController');

Route::get('/user/confirm/{confirmation_code}', ['as' => 'confirm', 'uses' => 'UserController@confirm']);
Route::group(['middleware' => ['auth', 'user.identity']], function () {
    Route::get('/user/{user}/resend_confirmation_email', ['as' => 'resend_confirmation_email', 'uses' => 'UserController@resendConfirmationEmail']);
    Route::get('/user/{user}/logout', ['as' => 'logout', 'middleware' => 'csrf', 'uses' => 'UserController@logout']);
});

Route::controller('stripe', 'StripeController');

Route::group(['prefix' => 'api'], function () {
    Route::get('search', ['as' => 'search', function () {
        $items = [];
        $apps = Input::has('q') ?
            \rGuard\App::where('name', 'LIKE', '%' . Input::get('q') . '%')->get()
            :
            \rGuard\App::all();
        foreach ($apps as $app) {
            $items[] = [
                'title' => $app->name,
                'image' => $app->image->thumbnail('original'),
                'price' => "$$app->price",
                'description' => $app->description,
                'url' => route('app.show', ['app' => $app])
            ];
        }

        return json_encode([
            'results' => $items
        ]);
    }]);
});
