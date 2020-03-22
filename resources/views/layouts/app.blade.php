<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

    <title>{{ config('app.name') }}</title>
    <link rel="icon" type="image/png" href="{{asset('imgs/favicon.png')}}">

    <!-- Owl Carousel -->
    <link href="{{ asset('css/owl.carousel.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/owl.theme.default.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="{{ asset('js/owl.carousel.min.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="@if(Route::current()->getName() !== 'home') {{ asset('css/style.css') }} @else {{ asset('css/homepage.css') }} @endif" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md @if(Route::current()->getName() !== 'home') {{"shadow-sm"}} @endif">
            <div class="container">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <img src="{{asset('imgs/logo.png')}}" alt="" class="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
{{--                    @if(Route::current()->getName() !== 'home')--}}
                        <ul class="navbar-nav mr-auto">
                            <li class="nav-item {{ Request::is('games*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('games.index') }}">Competitions</a>
                            </li>
                            @auth
                                <li class="nav-item {{ Request::is('teams*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('teams.index') }}">Teams</a>
                                </li>
                            @endauth
                            <li class="nav-item {{ Request::is('talks*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('talks.index') }}">Talks</a>
                            </li>
                            <li class="nav-item {{ Request::is('nieuws*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('nieuws.index') }}">Nieuws</a>
                            </li>
                            @auth
                                <li class="nav-item {{ Request::is('products*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('products.index') }}">Food</a>
                                </li>
                                <li class="nav-item {{ Request::is('seatmap*') ? 'active' : '' }}">
                                    <a class="nav-link" href="{{ route('seatmap') }}">Seat Map</a>
                                </li>
                            @endauth
                        </ul>
{{--                    @endif--}}

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <?php $requests = Auth::user()->created_teams()->with('requests')->get()->pluck('requests')->flatten()->where('accepted', 0); ?>
                            <li class="nav-item dropdown">
                                <a id="notificationDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="material-icons">@if($requests->count() !== 0){{ 'notifications' }}@else{{ 'notifications_none' }}@endif</i>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notificationDropdown">

                                    @if($requests->count() !== 0)
                                    @foreach($requests as $request)
                                        <div class="dropdown-item">
                                            <p class="mb-0">{{ $request->sender->username }} requested to join {{ $request->team->name }}</p>
                                            @if(!$request->accepted && !$request->rejected)
                                                <form action="{{ route('teamrequests.accept', $request->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn outlineBtn" type="submit">
                                                        Accept
                                                    </button>
                                                </form>
                                                <form action="{{ route('teamrequests.reject', $request->id) }}" method="post">
                                                    @csrf
                                                    <button class="btn inlineBtn" type="submit">
                                                        Reject
                                                    </button>
                                                </form>
                                            @endif
                                        </div>
                                    @endforeach
                                    @else
                                        <div class="dropdown-item">
                                            <p class="mb-0">There are no requests</p>
                                        </div>
                                    @endif
                                </div>
                            </li>

                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.profile', Auth::user()->id) }}">{{ __('Profile') }}</a>
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    @if(Auth::user()->role >= 1)
                                        <div class="dropdown-divider"></div>
                                        <div class="admin-items">
                                            @if(Auth::user()->role >= 2)
                                                <a class="dropdown-item" href="{{ route('adminpanel.games') }}"><i class="material-icons">videogame_asset</i>{{ __('Competitions') }}</a>
                                                <a class="dropdown-item" href="{{ route('adminpanel.talks') }}"><i class="material-icons">record_voice_over</i>{{ __('Talks') }}</a>
                                                <a class="dropdown-item" href="{{ route('adminpanel.nieuws') }}"><i class="material-icons">fiber_new</i>{{ __('Nieuws') }}</a>
                                                <a class="dropdown-item" href="{{ route('adminpanel.users') }}"><i class="material-icons">person</i>{{ __('Users') }}</a>
                                                <a class="dropdown-item" href="{{ route('adminpanel.teams') }}"><i class="material-icons">group</i>{{ __('Teams') }}</a>
                                                <a class="dropdown-item" href="{{ route('adminpanel.sponsors') }}"><i class="material-icons">loyalty</i>{{ __('Sponsors') }}</a>
                                                <a class="dropdown-item" href="{{ route('adminpanel.products') }}"><i class="material-icons">local_dining</i>{{ __('Products') }}</a>
                                            @endif
                                            @if(Auth::user()->role == 1 || Auth::user()->role == 3)
                                                <a class="dropdown-item" href="{{ route('sales.index') }}"><i class="material-icons">shopping_cart</i>{{ __('Kassa') }}</a>
                                            @endif
                                                <a class="dropdown-item" href="{{ route('adminpanel.salesdata') }}"><i class="material-icons">assignment</i>{{ __('Sales Data') }}</a>
                                        </div>
                                    @endif
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        @if(Route::current()->getName() !== 'home')
            <main class="py-4">
                @yield('content')
            </main>
        @else
            @yield('content')
        @endif
    </div>
</body>
</html>
