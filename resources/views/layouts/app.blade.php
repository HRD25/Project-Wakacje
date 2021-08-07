<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $applicationName }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <main>
        <nav class="navbar fixed-top navbar-expand-md navbar-dark bg-dark">
            <div class="container-fluid">
                <a class="navbar-brand" href="{{ route('home') }}">
                    <p class="h4">{{ $applicationName }}</p>
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('home') }}">Strona
                                główna</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="{{ route('get.offerts') }}">Oferty</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('info') }}">O nas</a>
                        </li>

                        @auth
                            <li class="nav-item">
                                <a class="nav-link" href="#">Obserwowane</a>
                            </li>
                            <li class="nab-item">
                                <a class="nav-link" href="{{ route('add.show') }}">Dodaj Zgłoszenie</a>
                            </li>
                        @endauth

                        @guest
                            <li class="nav-item">
                                @if (Route::has('login'))
                                    <a class="nav-link" href="{{ route('login') }}">Zaloguj Się</a>
                                @endif
                            </li>
                            <li class="nav-item">
                                @if (Route::has('register'))
                                    <a class="nav-link" href="{{ route('register') }}">Zarejestruj Się</a>
                                @endif
                            @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                        {{ __('Wyloguj') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <script src="../assets/dist/js/bootstrap.bundle.min.js"></script>
    </main>

    <div class="row m-0 mt-4">

        <div class="column col-2">
            @yield('l-content')
        </div>

        <div class="column mt-4 col-8">
            @yield('content')
        </div>

        <div class="column mt-5 col-2">
            @yield('r-content')
        </div>
    </div>
</body>

</html>
