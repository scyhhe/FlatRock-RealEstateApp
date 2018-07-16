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
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/fontawesome.js') }}"></script>
    <script src="{{ asset('js/featherlight.js') }}"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    <!-- Styles -->
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/featherlight.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet" type="text/css" />
    <!-- CDN -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt"
        crossorigin="anonymous">
    <script src="jsdelivr.com/package/npm/sweetalert2"></script>
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel shadow-lg mb-5 h-20" style="min-height:10vh">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

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
                    <ul class="navbar-nav ml-auto text-dark" id="nav">
                        <!-- Authentication Links -->
                        @guest

                        <li class="nav-item">
                            <a class="nav-link" href="/register_user">{{ __('Register a new user') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/register_broker">{{ __('Register as a broker or an agency') }}</a>
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
                        <a class="py-2 d-none d-md-inline-block btn btn-outline-dark p-2 rounded" href="/homes/user/{{ Auth::user()->id }}">My Ads</a>
                        </li>
                        @else
                        <a class="py-2 d-none d-md-inline-block btn btn-link p-2 rounded" href="/watchlist">Watchlist</a>                        @endif
                        <li class="nav-item dropdown ml-5">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" v-pre>
                                   Hello, {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- END OF NAV -->
        {{--
    @include('partials.search') --}}
    @include('partials.flash')

        <div class="container-fluid mt-5">
            @yield('content')
        </div>

    </div>
    @include ('partials.footer')
</body>

</html>