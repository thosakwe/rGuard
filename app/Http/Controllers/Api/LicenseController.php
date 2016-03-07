<?php

namespace rGuard\Http\Controllers\Api;

use Illuminate\Http\Request;

use rGuard\App;
use rGuard\Http\Requests;
use rGuard\Http\Controllers\Controller;
use rGuard\License;
use SleepingOwl\Models\Attributes\File;

class LicenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', [
            'only' => 'getDownload'
        ]);
        $this->middleware('license.owner', [
            'only' => 'getDownload'
        ]);
    }

    public function getDownload(License $license)
    {
        $path = $license->app->file->getFullPath();
        if (empty($path)) {
            return \Response::json([
                'error' => 'failure',
                'message' => 'There is no downloadable file associated with this license. Contact the webmaster for assistance.'
            ], 500);
        }
        $license->downloads++;
        $license->save();
        return \Response::download($path);
    }

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
     * @param License $license
     * @return \Illuminate\Http\Response
     * @internal param int $id
     */
    public function show(License $license)
    {
        return $license->with('app')->first()->toJson();
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
