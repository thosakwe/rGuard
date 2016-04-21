<?php

namespace rGuard\Http\Controllers\Api;

use Illuminate\Http\Request;

use rGuard\App;
use rGuard\Download;
use rGuard\Http\Requests;
use rGuard\Http\Controllers\Controller;
use rGuard\License;
use SleepingOwl\Models\Attributes\File;

class LicenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth.basic.once');
        $this->middleware('license.owner');
    }

    public function downloadFile(License $license, $virtual_path) {
        $download = Download::whereVirtualPath($virtual_path)->first();

        if (!$download) {
            return \Response::make('<h1>404 Not Found</h1>', 404);
        }

        if ($license->app_id !== $download->app_id) {
            return \Response::make('<h1>403 Forbidden</h1>', 403);
        }

        $path = $download->file->getFullPath();
        if (empty($path)) {
            return \Response::json([
                'error' => 'failure',
                'message' => 'There is no downloadable file associated with this license. Contact the webmaster for assistance.'
            ], 500);
        }
        $download->downloads++;
        $download->save();
        return \Response::download($path, basename($virtual_path));
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
        return \Response::download($path, $license->app->name);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return \Auth::user()->licenses();
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
