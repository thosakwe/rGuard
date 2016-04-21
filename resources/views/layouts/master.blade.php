<!doctype html>
<html ng-app="rguard" ng-controller="MainCtrl as main">
<head>
    @section('title_section')
        <title>
            @yield('title', 'Untitled') - {{ config('rguard.title') }}
        </title>
    @show
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

    @if(config('rguard.use_wordpress'))
        <a class="item" href="{{ url('/blog') }}">
            <i class="wordpress icon"></i>
            Blog
        </a>
    @endif

    <div class="ui search item">
        <div class="ui inverted transparent icon input">
            <input class="prompt" id="productSearch" type="text" placeholder="Search products...">
            <i class="search link icon"></i>
        </div>
        <div class="results"></div>
    </div>
    @foreach(\rGuard\Page::all() as $page)
        @if($page->show_in_navbar)
            <a class="item" href="{{ route('page.show', ['page' => $page]) }}">
                {{ $page->title }}
            </a>
        @endif
    @endforeach
    {!! view('user_menu_small') !!}
</div>
<div class="pusher">
    <div class="ui grid">
        <div class="mobile only row">
            <div class="ui borderless fluid large inverted {{ config('rguard.color') }} secondary menu"
                 style="border-radius: 0; box-shadow: 0 1px 2px 2px rgba(34, 36, 38, .15) !important; margin: 0 0 2em;">
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
            <div class="ui fluid inverted large {{ config('rguard.color') }} secondary menu"
                 style="border-radius: 0; box-shadow: 0 1px 2px 2px rgba(34, 36, 38, .15) !important; margin: 0 0 2em;">
                <div class="ui container">
                    <a class="header item menu0" href="{{ url('/') }}">
                        {{ config('rguard.title', 'rGuard') }}
                    </a>
                    @if(config('rguard.use_wordpress'))
                        <a class="item" href="{{ url('/blog') }}">
                            <i class="wordpress icon"></i>
                            Blog
                        </a>
                    @endif
                    @foreach(\rGuard\Page::all() as $page)
                        @if($page->show_in_navbar)
                            <a class="item" href="{{ route('page.show', ['page' => $page]) }}">
                                {{ $page->title }}
                            </a>
                        @endif
                    @endforeach

                    <div class="right menu">
                        <div class="ui search item">
                            <div class="ui inverted transparent icon input">
                                <input class="prompt" id="productSearch" type="text" placeholder="Search products...">
                                <i class="search link icon"></i>
                            </div>
                            <div class="results"></div>
                        </div>
                    </div>
                    {!! view('user_menu') !!}
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

    <div class="ui grid">
        <div class="mobile only row">
            <div class="ui bottom fixed borderless menu footer">
                @if(config('rguard.https'))
                    <div class="item">
                        <div class="ui green label">
                            <i class="lock icon"></i>
                            SECURE
                        </div>
                    </div>
                @endif
                <div class="item">
                    <a class="ui {{ config('rguard.color') }} link label" href="https://github.com/thosakwe/rguard">
                        Built with rGuard
                    </a>
                </div>
            </div>
        </div>
        <div class="tablet computer only row">
            <div class="ui bottom fixed borderless menu footer">
                @if(config('rguard.https'))
                    <div class="item">
                        <div class="ui green label">
                            <i class="lock icon"></i>
                            SECURE
                        </div>
                    </div>
                @endif
                <div class="header item">
                    &copy; {{ config('rguard.title', 'rGuard') }} {{ date('Y') }}
                </div>
                <div class="right menu">
                    <div class="item">
                        <i class="stripe icon"></i>
                    </div>
                    <div class="item">
                        <i class="paypal card icon"></i>
                    </div>
                    @if(config('rguard.accept_bitcoin'))
                        <div class="item">
                            <i class="bitcoin icon"></i>
                        </div>
                    @endif
                    @if(config('rguard.accept_alipay'))
                        <div class="item">
                            <i class="yen icon"></i>
                        </div>
                    @endif
                    <div class="item">
                        <a class="ui {{ config('rguard.color') }} link label" href="https://github.com/thosakwe/rguard">
                            Built with rGuard
                        </a>
                    </div>
                </div>
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