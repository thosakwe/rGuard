<?php

namespace rGuard\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;

use rGuard\App;
use rGuard\Http\Requests;
use rGuard\Http\Controllers\Controller;
use rGuard\License;

class StripeController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function postIndex()
    {
        $app = App::find(\Input::get('app'));
        if ($app == null || \Auth::user()->isLicensedForApp($app)) return \Response::json(['error' => 'invalid_app_id'], 404);
        // Get the credit card details submitted by the form
        $token = $_POST['stripeToken'];

        // Create the charge on Stripe's servers - this will charge the user's card
        $result = \Auth::user()->charge($app->price * 100, [
            'description' => $app->description,
            'source' => $token
        ]);

        if ($result === false) {
            return redirect()->back()->with('error', "Could not charge your card.");
        } else {
            return License::make($app);
        }
        /*
        try {
            \Stripe\Charge::create(array(
                "amount" => $app->price * 100, // amount in cents, again
                "currency" => "usd",
                "source" => $token,
                "description" => $app->description
            ));
            return ['error' => 'success'];
        } catch (\Stripe\Error\Card $e) {
            return redirect()->back()->with('error', $e->getMessage());
        }*/
    }
}
