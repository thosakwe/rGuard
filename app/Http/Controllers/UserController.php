<?php

namespace rGuard\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

use rGuard\Http\Requests;
use rGuard\Http\Controllers\Controller;
use rGuard\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * @param $confirmation_code
     * @return \Illuminate\Http\RedirectResponse
     */
    public function confirm($confirmation_code)
    {
        $user = User::whereConfirmed(false)->whereConfirmationCode($confirmation_code)->first();
        if ($user == null) {
            abort(404);
            return ['error' => 404];
        } else {
            $user->confirmed = true;
            $user->save();
            return redirect()
                ->route('index')
                ->with('success', 'Successfully confirmed your account. Feel free to log in now.');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param User $user
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    public function logout(User $user)
    {
        Auth::logout();
        return redirect()->route('index')->with('success', 'Successfully logged out. We hope to see you again soon!');
    }

    public function resendConfirmationEmail(User $user)
    {
        if ($user->confirmed) {
            return redirect()->back()->with('error', 'Your e-mail address has been confirmed.');
        }
        $user->sendConfirmationEmail();
        return redirect()->route('index')->with('success', 'Successfully resent confirmation e-mail.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
