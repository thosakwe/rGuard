@extends('layouts.master')

@section('title')
    {{ $app->name }}
@stop

@section('content')
    <div class="ui text container">
        <div class="ui top attached padded secondary segment"
             style="background-size: cover; @if(strlen($app->image->getPath()))
                     background-image: url('{{ $app->image->thumbnail('blur') }}')
             @else
                     background-color: gray
             @endif">
            <div class="ui huge inverted header">
                @if(strlen($app->image->getPath()))
                    <img src="{{ $app->image->thumbnail('original') }}">
                @endif

                <div class="content">
                    {{ $app->name }}
                    @if($app->featured)
                        <div class="ui green label">
                            FEATURED
                        </div>
                        <br/>
                    @endif
                    <div class="sub header">{{ $app->tagline }}</div>
                </div>
            </div>
            @if($app->featured)
                <div class="ui left corner green label">
                    <i class="star icon"></i>
                </div>
            @endif
        </div>
        @section('content2')
        @show
        @if(Auth::check() && Auth::user()->isLicensedForApp($app))
            <div class="ui bottom attached clearing segment">
                <a class="ui fluid {{ config('rguard.color') }} button" href="{{ route('license.show', [
                    'license' => Auth::user()->licenseForApp($app)
            ]) }}">
                    <i class="unlock icon"></i>
                    Manage my Subscription
                </a>
            </div>
        @endif
    </div>
@endsection