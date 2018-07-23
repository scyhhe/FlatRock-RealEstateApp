<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <!-- CDN -->
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel shadow-lg mb-5 h-20" style="min-height:10vh">
            <div class="container">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>


                <div class="collapse navbar-collapse text-light" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item border-right pl-2 pr-2">
                            <a href="/dashboard" class="nav-link">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item border-right pl-2 pr-2">
                            <a href="/brokers" class="nav-link">
                                Browse brokers
                            </a>
                        </li>
                        <li class="nav-item pl-2 pr-2">
                            <a href="#" class="nav-link">
                                Contact us :)
                                </a>
                        </li>

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto d-flex align-items-baseline text-light" id="nav">
                        <!-- Authentication Links -->
                        @guest

                        <li class="nav-item">
                            <a class="nav-link text-light" href="/register_user">{{ __('Register a new user') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link text-light" href="/register_broker">{{ __('Register as a broker or an agency') }}</a>
                        </li>
                        <li class="nav-item">
                            <button class="btn btn-sm" style="background: purple;">
                                    <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </button>

                        </li>
                        @else @if (Auth::user()->isBroker())
                        <li class="nav-item mr-2 text-light">
                            <a class="py-2 d-none d-md-inline-block btn btn-outline-danger p-2 rounded" href="/homes/create">Publish a new ad</a>
                        </li>
                        <li class="nav-item">
                            <a class="py-2 d-none d-md-inline-block btn btn-outline-info p-2 rounded" href="/homes/user/{{ Auth::user()->id }}">My Ads</a>
                        </li>
                        @else
                        <a id="watchlist" class="py-2 d-none d-md-inline-block btn btn-link p-2 rounded" href="/watchlist">Watchlist</a>                        @endif
                        <li class="nav-item ml-5">
                            <a class="btn btn-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                     <i class="fas fa-sign-out-alt"></i>
                                                     {{ __('Logout') }}
                                    </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- END OF NAV -->
        {{--
    @include('partials.search') --}} {{-- Will include this when it is complete --}}
    @include('partials.flash')

        <div class="container-fluid mt-5">
            @yield('content')
        </div>

    </div>
    {{-- lazy fixing footer to always display at bottom --}} 
    @if (!Route::is(['home','homes.create', 'homes.edit', 'homes.show']))
    <div class="fixed-bottom mt-5">
        @include ('partials.footer')
    </div>
    @else
        @include ('partials.footer') 
    @endif
</body>

</html>