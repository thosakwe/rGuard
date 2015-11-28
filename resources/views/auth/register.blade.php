@extends('layouts.master')

@section('title')
    Register
@stop

@section('content')
    <div class="ui clearing segment">
        <div class="ui header">
            <i class="user add icon"></i>

            <div class="content">
                Register
            </div>
        </div>
        <form action="{{ action('Auth\AuthController@postRegister') }}" class="ui form" id="registerForm" method="post">
            {!! csrf_field() !!}
            <div class="required field">
                <label>Full Name:</label>

                <div class="ui left icon input">
                    <i class="user icon"></i>
                    <input type="text" name="name" value="{{ old('name') }}"/>
                </div>
            </div>
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
                <div class="required field">
                    <label>Confirm Password:</label>

                    <div class="ui left icon input">
                        <i class="key icon"></i>
                        <input type="password" name="password_confirmation" id="password_confirmation"/>
                    </div>
                </div>
            <button class="ui {{ config('rguard.color') }} right floated submit button" type="submit">
                <i class="sign in icon"></i>
                Register
            </button>
        </form>
    </div>
    <div class="ui {{ config('rguard.color') }} message text-center">
        <p>Already a member? Log in <a href="{{ action('Auth\AuthController@getLogin') }}">here</a>.</p>
    </div>
@stop

@section('scripts')
    <script>
        $(function () {
            $("#registerForm").form({
                inline: true,
                on: 'blur',
                fields: {
                    name: {
                        identifier: 'name',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please enter your name.'
                            },
                            {
                                type: 'maxLength[255]',
                                prompt: 'Name length cannot exceed 255 characters.'
                            }
                        ]
                    },
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
                            },
                            {
                                type: 'maxLength[255]',
                                prompt: 'E-mail address length cannot exceed 255 characters.'
                            }
                        ]
                    },
                    password: {
                        identifier: 'password',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please enter a password.'
                            },
                            {
                                type: 'minLength[6]',
                                prompt: 'Your password must be at least 6 characters long.'
                            }
                        ]
                    },
                    password_confirmation: {
                        identifier: 'password_confirmation',
                        rules: [
                            {
                                type: 'empty',
                                prompt: 'Please confirm your password.'
                            },
                            {
                                type: 'match[password]',
                                prompt: 'The two passwords must match.'
                            }
                        ]
                    }
                }
            });
        });
    </script>
@stop