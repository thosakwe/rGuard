@extends('layouts.master')

@section('title')
    Log in
@stop

@section('content')
    <div class="ui clearing segment">
        <div class="ui header">
            <i class="user icon"></i>

            <div class="content">
                Log in
            </div>
        </div>
        <form action="{{ action('Auth\AuthController@postLogin') }}" class="ui form" id="loginForm" method="post">
            {!! csrf_field() !!}
            <div class="required field">
                <label>E-mail Address:</label>

                <div class="ui left icon input">
                    <i class="envelope icon"></i>
                    <input type="email" name="email" value="{{ old('email') }}"/>
                </div>
            </div>
            <div class="required field">
                <label>Password:</label>

                <div class="ui left icon input">
                    <i class="key icon"></i>
                    <input type="password" name="password" id="password"/>
                </div>
            </div>
            <div class="inline field">
                <div class="ui checkbox">
                    <input type="checkbox" name="remember" tabindex="0" class="hidden"/>
                    <label>Remember me next time</label>
                </div>
            </div>
            <button class="ui {{ config('rguard.color') }} right floated submit button" type="submit">
                <i class="sign in icon"></i>
                Log in
            </button>
        </form>
    </div>
    <div class="ui {{ config('rguard.color') }} message text-center">
        <p>
            New to {{ config('rguard.title', 'this site') }}? Sign up
            <a href="{{ action('Auth\AuthController@getRegister') }}">today</a>
            .
        </p>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $("#loginForm").form({
                inline: true,
                on: 'blur',
                fields: {
                    email: {
                        identifier: 'email',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please enter your e-mail address.'
                            },
                            {
                                type: 'email',
                                prompt: 'Please enter a valid e-mail address.'
                            }
                        ]
                    },
                    password: {
                        identifier: 'password',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please enter your password.'
                            }
                        ]
                    }
                }
            });
        });
    </script>
@stop