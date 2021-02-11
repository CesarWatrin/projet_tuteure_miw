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
    <link href="{{ asset('css/favoris.css') }}" rel="stylesheet">
    <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">

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
               <!--<img src="../images/accueil.svg" alt="acceuil">-->
                <svg><use xlink:href="../images/sprite.svg#accueil"></use></svg>
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
               <!--<img src="../images/carte.svg" alt="carte">-->
                <svg><use xlink:href="../images/sprite.svg#carte"></use></svg>
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
               <!--<img src="../images/favoris.svg" alt="favoris">-->
                <svg><use xlink:href="../images/sprite.svg#favoris"></use></svg>
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
               <!--<img src="../images/mon_compte.svg" alt="mon_compte">-->
                <svg><use xlink:href="../images/sprite.svg#mon_compte"></use></svg>
                <span>______</span>
            </div>
            <div>
               <span>Mon compte</span>
            </div>
         </div>
      </div>
        <main>
            @yield('content')
        </main>

        @if (Route::current()->uri !== 'map')
           <footer>
              <div class="wave">
                <img src="../images/footer.svg" alt="footer_wave">
              </div>
              <div class="content_footer">
                <p>Retrouvez-nous</p>
                <div class="social_media">
                     <div>
                        <a href="#"><img src="../images/share.svg" alt="share_icon"></a>
                     </div>
                     <div>
                        <a href="#"><img src="../images/facebook.svg" alt="facebook_icon"></a>
                     </div>
                     <div>
                        <a href="#"><img src="../images/instagram.svg" alt="instagram_icon"></a>
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
</html>
