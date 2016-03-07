<?php

namespace rGuard\Http\Controllers;

use Illuminate\Http\Request;

use rGuard\Http\Requests;
use rGuard\Http\Controllers\Controller;
use rGuard\User;

class LicensePanelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('user.identity');
    }

    public function getIndex(User $user)
    {
        return view('license_panel.index', ['user' => $user]);
    }
}
