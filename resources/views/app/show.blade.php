@extends('layouts.app')

@section('content2')
    <div class="ui styled fluid accordion" style="border-radius: 0">
        <div class="active title" id="about">
            <i class="info circle icon"></i>
            About
        </div>
        <div class="active content">
            <p>
                <b>Name:</b> {{ $app->name }}
            </p>
            @if($app->tagline)
                <p>
                    <b>Tagline:</b> {{ $app->tagline }}
                </p>
            @endif
            <p>
                <b>Price:</b> ${{ $app->price }}
            </p>
            <b>Description:</b>

            <p>
                {{ $app->description }}
            </p>
        </div>

        @if(Auth::check() && !Auth::user()->isLicensedForApp($app))
            <div class="active title" id="buy">
                <i class="usd icon"></i>
                Buy for ${{ $app->price }}
            </div>
            @if(Auth::user()->confirmed)
                <div class="active content" style="text-align: center">
                    <form action="{{ action('StripeController@postIndex', ['app' => $app]) }}" id="stripeForm"
                          method="POST"
                          style="display: none;">
                        {!! csrf_field() !!}
                        <input name="stripeToken" type="hidden"/>
                    </form>
                    @if(config('rguard.accept_bitcoin'))
                        <br/><br/>
                        <b>
                            <i class="bitcoin icon"></i>
                            Bitcoin is accepted here.</b>
                        <br/><br/>
                    @endif
                    <a class="ui {{ config('rguard.color') }} labeled icon button" id="cardButton">
                        <i class="credit card icon"></i>
                        @if(config('rguard.accept_bitcoin'))
                            Pay with Card/Bitcoin
                        @else
                            Pay with Card
                        @endif
                    </a>
                    @if(config('rguard.accept_alipay'))
                        <br/><br/>
                        <b>
                            <i class="china flag"></i>
                            Alipay is accepted here.
                        </b>
                        <br/><br/>
                        <a class="ui red labeled icon button" id="alipayButton">
                            <i class="yen icon"></i>
                            Pay with Alipay
                        </a>
                    @endif
                    <div class="ui horizontal divider">
                        Or
                    </div>
                    <a class="ui paypal labeled icon button"
                       href="{{ action('PayPalController@makePayment', ['app' => $app]) }}">
                        <i class="paypal icon"></i>
                        Pay with PayPal
                    </a>
                </div>
            @elseif(!Auth::user()->confirmed)
                <div class="active content" style="text-align: center">
                    <b>
                        You cannot purchase software from {{ config('rguard.title', 'this site') }} until you confirm
                        your
                        e-mail
                        address. Click
                        <a href="{{ Auth::user()->route('resend_confirmation_email') }}">here</a>
                        to resend a confirmation email to <i>{{ Auth::user()->email }}</i>.
                    </b>
                </div>
            @endif
        @elseif(!Auth::check())
            <div class="active title" id="buy">
                <i class="user icon"></i>
                Whoops!
            </div>
            <div class="active content" style="text-align: center">
                <b>
                    You must
                    <a href="{{ action('Auth\AuthController@getLogin') }}">log in</a>
                    or
                    <a href="{{ action('Auth\AuthController@getRegister') }}">register</a>
                    to purchase software from {{ config('rguard.title', 'this site') }}.</b>
            </div>
        @endif
    </div>
@stop

@section('scripts')
    <script src="https://checkout.stripe.com/checkout.js"></script>
    <script>
        var handler = StripeCheckout.configure({
            key: '{{ env('STRIPE_KEY') }}',
            image: '{{ $app->image->thumbnail('128') }}',
            token: function (token) {
                // Use the token to create the charge with a server-side script.
                // You can access the token ID with `token.id`
                $("[name='stripeToken']").val(token.id);
                $("#stripeForm").submit();
            }
        });

        $('#cardButton').on('click', function (e) {
            // Open Checkout with further options
            handler.open({
                        amount: Math.round("{{ $app->price}}" * 100),
                        name: "{{ config('rguard.title') }}",
                        locale: "auto",
                        description: "{{ $app->name }} (${{ $app->price }})",
                        bitcoin: {{ config('rguard.accept_bitcoin') ? 'true' : 'false' }}
                    }
            )
            ;
            e.preventDefault();
        });

        $('#alipayButton').on('click', function (e) {
            // Open Checkout with further options
            handler.open({
                        amount: Math.round("{{ $app->price}}" * 100),
                        name: "{{ config('rguard.title') }}",
                        locale: "auto",
                        description: "{{ $app->name }} (${{ $app->price }})",
                        alipay: true
                    }
            )
            ;
            e.preventDefault();
        });

        // Close Checkout on page navigation
        $(window).on('popstate', function () {
            handler.close();
        });
    </script>
@stop