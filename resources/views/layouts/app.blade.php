<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
    <div class="tbg">
        <div class="theader">
            <nav class="navbar navbar-expand-md navbar-light bg-white">
                <div class="container">
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">
                            @auth
                                {{-- <a href="#">テストん１</a> --}}
                                <li class="nav-item dropdown">
                                    {{-- <a href="#">テストん０</a> --}}
                                    {{-- <a id="navbarDropdown" class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        <i class="fa fa-cog" aria-hidden="true"></i>
                                    </a> --}}

                                    {{-- <a href="#">テストん２</a> --}}

                                    {{-- この下（divタグ）をつけるとエラーになる、ログインできなくなるよー --}}
                                    {{-- <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown"> --}}
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    {{-- </div> --}}

                                    {{-- <a href="#">テストん３</a> --}}

                                </li>
                                {{-- <a href="#">テストん</a> --}}
                            @endauth
                        </ul>
                        {{-- Center Logo --}}
                        <ul class="navbar-nav mx-auto">
                            <li class="nav-item">
                                <a class="navbar-brand" href="{{ url('/users') }}">
                                    <img src="https://worldvectorlogo.com/logos/tinder-1.svg" alt="Tinder Logo" title="Tinder Logo" style="width: 100px">
                                </a>
                            </li>
                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                            @guest
                                @if (Route::has('login'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                    </li>
                                @endif

                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                    </li>
                                @endif
                            @else
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('matches.index') }}">
                                        <i class="fa fa-comments" aria-hidden="true"></i>
                                    </a>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        @if (session('flash_message'))
            <div class="flash_message bg-success text-center py-3 my-0">
                {{ session('flash_message') }}
            </div>
        @endif

        <div class="tbgwrap">
            @yield('content')
        </div>
        <div>*layouts/app.blade.php(デバック用！🤔)</div>
        <div>↓result/dd(Auth::check());</div>
        <?php dd(Auth::check()); ?>
    </div>
</div>
</body>
</html>
