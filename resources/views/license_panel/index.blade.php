@extends('layouts.master')

@section('title_section')
    <title ng-bind="main.title">
        {{ $user->name }}'s Licenses
    </title>
@stop

@section('head')
    <base href="{{ action('LicensePanelController@getIndex', ['user' => $user]) }}/">
@stop

@section('content')
    <div class="ui-view"></div>
@stop

@section('scripts')
    <script>
        var panelBaseUrl = "{{ url('/panel') }}";
        var userBaseUrl = "{{ action('Api\UserController@show', ['user' => $user]) }}";
        var licenseBaseUrl = "{{ action('LicensePanelController@getIndex', ['user' => $user]) }}";
    </script>
    <script src="{{ asset('bower_components/angular/angular.min.js') }}"></script>
    <script src="{{ asset('bower_components/angular-ui-router/release/angular-ui-router.min.js') }}"></script>
    <script src="{{ asset('panel/services/Rguard.js') }}"></script>
    <script src="{{ asset('panel/services/User.js') }}"></script>
    <script src="{{ asset('panel/rguard.js') }}"></script>
    <script src="{{ asset('panel/controllers/Main.js') }}"></script>
    <script src="{{ asset('panel/controllers/Licenses.js') }}"></script>
    <script src="{{ asset('panel/Routes.js') }}"></script>
@stop