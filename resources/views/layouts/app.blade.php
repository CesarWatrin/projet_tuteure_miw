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
    <script src="{{ asset('js/map.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/map.css') }}" rel="stylesheet">
    <link href="{{ asset('css/connect.css') }}" rel="stylesheet">
     <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">

    <!-- Importation de LeafLet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<body>
    <div id="app">
      <div class="navbar">
         @if (Route::current()->uri === '/')
            <div class="onglet currentPage" onclick="location.href='{{ url('/') }}';">
         @else
            <div class="onglet" onclick="location.href='{{ url('/') }}';">
         @endif
            <div>
               <img src="../images/accueil.svg" alt="acceuil">
               <span>______</span>
            </div>
            <div>
               <span>Accueil</span>
            </div>
         </div>
         @if (Route::current()->uri === 'map')
            <div class="onglet currentPage" onclick="location.href='{{ route('map') }}';">
         @else
            <div class="onglet" onclick="location.href='{{ route('map') }}';">
         @endif
            <div>
               <img src="../images/carte.svg" alt="carte">
               <span>______</span>
            </div>
            <div>
               <span>Carte</span>
            </div>
         </div>
         @if (Route::current()->uri === '#')
            <div class="onglet currentPage" onclick="location.href='#';">
         @else
            <div class="onglet" onclick="location.href='#';">
         @endif
            <div>
               <img src="../images/favoris.svg" alt="favoris">
               <span>______</span>
            </div>
            <div>
               <span>Favoris</span>
            </div>
         </div>
         @if (Route::current()->uri === 'login')
            <div class="onglet currentPage" onclick="location.href='{{ route('login') }}';">
         @else
            <div class="onglet" onclick="location.href='{{ route('login') }}';">
         @endif
            <div>
               <img src="../images/mon_compte.svg" alt="mon_compte">
               <span>______</span>
            </div>
            <div>
               <span>Mon compte</span>
            </div>
         </div>
      </div>
        <!-- <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">

                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('map') }}">Carte</a>
                        </li>
                    </ul>


                    <ul class="navbar-nav ml-auto">

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
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav> -->
        <main>
            @yield('content')
        </main>
    </div>
</body>
</html>
