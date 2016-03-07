@if(Auth::check())
    @unless(Auth::user()->confirmed)
        <a class="item" href="{{ Auth::user()->route('resend_confirmation_email') }}">
            <i class="loading repeat icon"></i>
            Resend Confirmation E-mail
        </a>
        <div class="ui divider"></div>
    @endunless
    @if(Auth::user()->licenses->count() > 0)
        <a class="item"
           href="{{ action('LicensePanelController@getIndex', ['user' => Auth::user()]) }}">
            <i class="credit card icon"></i>
            My Licenses
        </a>
    @endif
    <a class="item" href="{{ Auth::user()->route('logout').'?csrf_token='.csrf_token() }}">
        <i class="log out icon"></i>
        Log out
    </a>
@else
    <div class="item">
        <a class="ui basic inverted white button"
           href="{{ action('Auth\AuthController@getLogin') }}">
            <i class="user icon"></i>
            Log in
        </a>
    </div>
    <div class="item">
        <a class="ui basic inverted white button"
           href="{{ action('Auth\AuthController@getRegister') }}">
            <i class="user add icon"></i>
            Register
        </a>
    </div>
@endif