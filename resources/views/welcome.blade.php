@extends('layouts.master')

@section('title')
    Home
    @stop

    @section('content')
            <!--<div class="ui large {{ config('rguard.color') }} header">
        <i class="laptop icon"></i>

        <div class="content">
            Our products
        </div>
    </div>-->

    <div class="ui text container">
        <?php
        $apps = \rGuard\App::all();
        ?>
        @if($apps->count() == 0)
            <div class="ui {{ config('rguard.color') }} icon message">
                <i class="frown icon"></i>

                <div class="content">
                    <div class="header">
                        Nothing here yet.
                    </div>
                    <p>
                        Hey, thanks for the interest in our software. But we don't have anything for sale yet.
                        Stay tuned!
                    </p>
                </div>
            </div>
        @else
            <div class="ui special centered stackable cards">
                @foreach($apps as $app)
                    <div class="ui {{ config('rguard.color') }} card" style="overflow: hidden;">
                        @if($app->image != null)
                            <div class="blurring dimmable image">
                                <div class="ui dimmer">
                                    <div class="content">
                                        <div class="center">
                                            <div class="ui inverted header">
                                                {{ $app->name }}
                                            </div>
                                            <a class="ui inverted button"
                                               href="{{ route('app.show', ['app' => $app]) }}">
                                                <i class="unhide icon"></i>
                                                View Product
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{ $app->image->thumbnail('original') }}" style="height: 12em;">
                            </div>
                        @endif
                        @if($app->featured)
                            <div class="ui left corner green label">
                                <i class="star icon"></i>
                            </div>
                        @endif
                        <div class="content">
                            <div class="header">
                                {{ $app->name }}
                            </div>
                            <div class="meta">
                                <span class="category">
                                    {{ $app->tagline }}
                                </span>
                            </div>
                            <div class="description">
                                <p>
                                    {{ $app->description }}
                                </p>
                            </div>
                        </div>
                        <div class="extra content">
                            @if($app->featured)
                                <div class="left floated">
                                    <div class="ui green label">
                                        FEATURED
                                    </div>
                                </div>
                            @endif
                            <div class="right floated">
                                <div class="ui {{ config('rguard.color') }} label">
                                    ${{ $app->price }}
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
@stop