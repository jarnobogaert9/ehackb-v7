<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <!--<meta name="csrf-token" content="{{ csrf_token() }}">-->

    <title>{{ config('app.name') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item {{ Request::is('games*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('games.index') }}">Competitions</a>
                        </li>
                        @auth
                            <li class="nav-item {{ Request::is('teams*') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('talks.index') }}">Teams</a>
                            </li>
                        @endauth
                        <li class="nav-item {{ Request::is('talks*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('talks.index') }}">Talks</a>
                        </li>
                        <li class="nav-item {{ Request::is('location') ? 'active' : '' }}">
                            <a class="nav-link" href="">Location</a>
                        </li>
                        <li class="nav-item {{ Request::is('sponsors*') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('sponsors.index') }}">Sponsors</a>
                        </li>
                        <li class="nav-item {{ Request::is('about') ? 'active' : '' }}">
                            <a class="nav-link" href="{{ route('about') }}">About</a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto">
                        @guest
                            <li class="nav-item {{ Request::is('login') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            <li class="nav-item {{ Request::is('register') ? 'active' : '' }}">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->username }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('users.profile', Auth::user()->id) }}">{{ __('Profile') }}</a>
                                    @if(Auth::user()->is_admin)
                                        <a class="dropdown-item" href="">{{ __('Adminpanel') }}</a>
                                    @endif
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
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

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
