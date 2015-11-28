<!doctype html>
<html>
<head>
    <title>
        @yield('title', 'Untitled') - {{ config('rguard.title') }}
    </title>
    @yield('styles')
    {!! Html::style('bower_components/semantic/dist/semantic.min.css') !!}
    {!! Html::style('css/master.css') !!}
    @yield('head')
</head>
<body>
<div class="ui sidebar inverted vertical menu" id="sidebar">
    <a class="active header item menu0" href="{{ url('/') }}">
        <i class="home icon"></i>
        {{ config('rguard.title') }}
    </a>

    <div class="ui search item">
        <div class="ui inverted transparent icon input">
            <input class="prompt" id="productSearch" type="text" placeholder="Search products...">
            <i class="search link icon"></i>
        </div>
        <div class="results"></div>
    </div>
    @if(Auth::check())
    @else
        <div class="item">
            <i class="user icon"></i>
            My Account
        </div>
    @endif
</div>
<div class="pusher">
    <div class="ui grid">
        <div class="mobile only row">
            <div class="ui borderless fluid inverted {{ config('rguard.color') }} secondary menu"
                 style="border-radius: 0;">
                <div class="ui container">
                    <div class="item" id="sidebarItem">
                        &nbsp;&nbsp;&nbsp;
                        <i class="sidebar link icon"></i>
                    </div>
                    <a class="header item" href="{{ url('/') }}">
                        {{ config('rguard.title', 'rGuard') }}
                    </a>
                </div>
            </div>
        </div>
        <div class="tablet computer only row">
            <div class="ui fluid inverted {{ config('rguard.color') }} secondary menu" style="border-radius: 0;">
                <div class="ui container">
                    <a class="header item menu0" href="{{ url('/') }}">
                        {{ config('rguard.title', 'rGuard') }}
                    </a>

                    <div class="right menu">
                        <div class="ui search item">
                            <div class="ui inverted transparent icon input">
                                <input class="prompt" id="productSearch" type="text" placeholder="Search products...">
                                <i class="search link icon"></i>
                            </div>
                            <div class="results"></div>
                        </div>
                    </div>
                    @if(Auth::check())
                        <div class="ui dropdown item">
                            <i class="user icon"></i>
                            {{ Auth::user()->name }}
                            <i class="dropdown icon"></i>
                            <div class="menu">
                                @unless(Auth::user()->confirmed)
                                    <a class="item" href="{{ Auth::user()->route('resend_confirmation_email') }}">
                                        <i class="loading repeat icon"></i>
                                        Resend Confirmation E-mail
                                    </a>
                                <div class="ui divider"></div>
                                @endunless
                                <a class="item" href="{{ Auth::user()->route('logout').'?csrf_token='.csrf_token() }}">
                                    <i class="log out icon"></i>
                                    Log out
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="item">
                            <a class="ui basic inverted white button" href="{{ action('Auth\AuthController@getLogin') }}">
                                <i class="user icon"></i>
                                Log in
                            </a>
                        </div>
                        <div class="item">
                            <a class="ui basic inverted white button" href="{{ action('Auth\AuthController@getRegister') }}">
                                <i class="user add icon"></i>
                                Register
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <div class="ui container" style="margin-top: 2em;">
        @if(Session::has('success'))
            <div class="ui positive message">
                <p>{{ Session::get('success') }}</p>
            </div>
        @endif
        @if(Session::has('error'))
            <div class="ui negative message">
                <p>{{ Session::get('error') }}</p>
            </div>
        @endif
        @foreach($errors->all() as $error)
            <div class="ui negative message">
                <p>{{ $error }}</p>
            </div>
        @endforeach
        @section('content') @show
    </div>
    <br/><br/><br/><br/>

    <div class="ui bottom fixed borderless menu" id="footer">
        <div class="header item">
            &copy; {{ config('rguard.title', 'rGuard') }} {{ date('Y') }}
        </div>
        <div class="right menu">
            <div class="item">
                <a class="ui {{ config('rguard.color') }} link label" href="https://github.com/regiostech/rguard">
                    Built with rGuard
                </a>
            </div>
        </div>
    </div>
</div>
{!! Html::script('bower_components/jquery/dist/jquery.min.js') !!}
{!! Html::script('bower_components/semantic/dist/semantic.min.js') !!}
{!! Html::script('js/master.js') !!}
<script>
    $(function () {
        $('.ui.search')
                .search({
                    apiSettings: {
                        url: '{{ route('search') }}/?q={query}'
                    }
                })
        ;
    });
</script>
@yield('scripts')
</body>
</html>