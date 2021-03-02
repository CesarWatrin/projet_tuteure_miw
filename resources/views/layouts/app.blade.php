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
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/connect.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">

@stack('styles')

<!-- Importation de LeafLet -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin=""/>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
</head>
<body>
    <div id="app">
      <div class="navbar" id="navbar">
         @if (Route::current()->uri === '/')
            <div class="onglet currentPage" onclick="location.href='{{ url('/') }}';">
         @else
            <div class="onglet" onclick="location.href='{{ url('/') }}';">
         @endif
            <div>
                <svg><use xlink:href="{{ asset('images/sprite.svg#accueil') }}"></use></svg>
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
                <svg><use xlink:href="{{ asset('images/sprite.svg#carte') }}"></use></svg>
                <span>______</span>
            </div>
            <div>
               <span>Carte</span>
            </div>
         </div>
         @if (Route::current()->uri === 'favoris')
            <div class="onglet currentPage" onclick="location.href='{{ route('favoris') }}';">
         @else
            <div class="onglet" onclick="location.href='{{ route('favoris') }}';">
         @endif
            <div>
                <svg><use xlink:href="{{ asset('images/sprite.svg#favoris') }}"></use></svg>
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
         </div>
      </div>
        <main>
            @yield('content')
        </main>

        @if (Route::current()->uri !== 'map')
           <footer>
              <div class="wave">
                <img src="{{ asset('images/footer.svg') }}" alt="footer_wave">
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
                <p>Plan du site</p>
                <p class="ml">Mentions légales</p>
                <div class="copyright">
                  <p>Copyright © 2021 MAC-YO Corp.<br>Tous droits réservés.</p>
                </div>
              </div>
           </footer>
        @endif

    </div>
</body>
   <!-- Scripts -->
   <script async defer crossorigin="anonymous" src="https://connect.facebook.net/fr_FR/sdk.js#xfbml=1&version=v9.0" nonce="Nzhw9TVU"></script>
   <script src="{{ asset('js/app.js') }}" defer></script>
   <script src="{{ asset('js/navbar.js') }}" defer></script>

@stack('scripts')

</html>
