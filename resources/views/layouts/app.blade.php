<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">

@stack('styles')

    <!-- Favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/site.webmanifest">

    <!-- FontAwesome -->
    <script src="https://kit.fontawesome.com/06dfa3cb1d.js" crossorigin="anonymous"></script>

    <!-- Importation de LeafLet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<body>
    <div id="app">
      <div class="navbar" id="navbar">
         @if (Route::current()->uri === '/')
            <a class="onglet currentPage" href="{{ url('/') }}">
         @else
            <a class="onglet" href="{{ url('/') }}">
         @endif
            <div>
                <svg><use xlink:href="{{ asset('images/sprite.svg#accueil') }}"></use></svg>
               <span>______</span>
            </div>
            <div>
               <span>Accueil</span>
            </div>
         </a>
         @if (Route::current()->uri === 'map')
            <a class="onglet currentPage" href="{{ route('map') }}">
         @else
            <a class="onglet" href="{{ route('map') }}">
         @endif
            <div>
                <svg><use xlink:href="{{ asset('images/sprite.svg#carte') }}"></use></svg>
                <span>______</span>
            </div>
            <div>
               <span>Carte</span>
            </div>
         </a>
         @if (Route::current()->uri === 'favoris')
            <a class="onglet currentPage" href="{{ route('favoris') }}">
         @else
            <a class="onglet" href="{{ route('favoris') }}">
         @endif
            <div>
                <svg><use xlink:href="{{ asset('images/sprite.svg#favoris') }}"></use></svg>
                <span>______</span>
            </div>
            <div>
               <span>Favoris</span>
            </div>
         </a>
         @if (Route::current()->uri === 'login' || Route::current()->uri === 'register' || Route::current()->uri === 'account')
            <a class="onglet currentPage" href="{{ route('login') }}">
         @else
            <a class="onglet" href="{{ route('login') }}">
         @endif
            <div>
                <svg><use xlink:href="{{ asset('images/sprite.svg#mon_compte') }}"></use></svg>
                <span>______</span>
            </div>
            <div>
                @if(Auth::user())
               <span>Mon compte</span>
                @else
                <span>Connexion</span>
                @endif
            </div>
         </a>
      </div>
        <main>
            @yield('content')
        </main>

        @if (Route::current()->uri !== 'map')
           <footer>
              <div class="wave">
                <img src="{{ asset('images/footer.svg') }}" alt="footer vague">
              </div>
              <div class="content_footer">
                <p>Retrouvez-nous</p>
                <div class="social_media">
                     <div>
                        <a href="#"><svg class="big_icon"><use xlink:href="{{ asset('images/sprite.svg#share') }}"></use></svg></a>
                     </div>
                     <div>
                        <a href="#"><svg class="fb_icon"><use xlink:href="{{ asset('images/sprite.svg#facebook') }}"></use></svg></a>
                     </div>
                     <div>
                        <a href="#"><svg class="big_icon"><use xlink:href="{{ asset('images/sprite.svg#instagram') }}"></use></svg></a>
                     </div>
                </div>
                <!--<p>Plan du site</p>-->
                  <p class="ml"><a href="{{ route('legal') }}">Mentions légales</a></p>
                  <p class="ml"><a href="{{ route('backpack.auth.login') }}">Portail de modération</a></p>
                <div class="copyright">
                  <p>Copyright © 2021 MAC-YO Corp.<br>Tous droits réservés.</p>
                </div>
              </div>
           </footer>
        @endif

    </div>
</body>
   <!-- Scripts -->
   <script src="{{ asset('js/main.min.js') }}" defer></script>

@stack('scripts')

</html>
