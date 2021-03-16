@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/map.css') }}" rel="stylesheet">
@endpush

@section('content')
<div class="searchbar">
   <div class="search">
      <button class="bouton recherche" id="buttonSearch">
         <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
      </button>
      <div class="champRecherche">
         <input type="text" class="input" id="inputSearch" placeholder="Rechercher sur la carte"/>
         <div id="autocomplete"></div>
         <div id="filter"></div>
      </div>
   </div>
   <button class="bouton filter">
      <svg class="icon"><use id="filter_cancel" xlink:href="images/sprite.svg#filter"></use></svg>
   </button>
   <button class="bouton emptySearch">
      <svg class="icon"><use xlink:href="images/sprite.svg#cancelSearch"></use></svg>
   </button>
</div>

<div id="map"></div>

<div class="popup">
   <div class="popup_header">
      <img src="images/wave_popup.svg" alt="wave-image">
   </div>
   <div class="popup_body">
      @include('layouts.store_card')
      <div class="popup_info">
         <div>
            <h4>Infos pratiques</h4>
         </div>
         <div>
            <span><i class="fas fa-map-marker-alt"></i></span>
            <span id="store_address">Adresse</span>
         </div>
         <div>
            <span><i id="delivery_check" class="fas fa-check"></i></span>
            <span id="store_delivery">Livraison possible</span>
         </div>
         <div>
            <span><i id="delivery_check" class="fas fa-calendar-alt"></i></span>
            <span id="store_schedule">Tous les jours : 11h-14h - 18h-23h</span>
         </div>
         <div>
            <h4>Description</h4>
         </div>
         <div>
            <p id="store_desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
         </div>
         <div>
            <h4>Contact</h4>
         </div>
         <div>
            <span><i class="fas fa-phone-alt"></i> </span>
            <span id="store_tel">06 01 32 59 89</span>
         </div>
         <div>
            <span><i class="fas fa-envelope"></i></span>
            <span id="store_mail">magasin.macyo@hotmail.com</span>
         </div>
         <div>
            <span><i class="fas fa-globe"></i> </span>
            <span><a id="store_website" target="_blank" href="https://cesarwatrin.fr">Accéder au site web</a></span>
         </div>
         <div>
            <h4>Commentaires</h4>
         </div>
         <div>
            <div class="ratings" id="store_comments"></div>
         </div>
      </div>
   </div>
   <div class="popup_buttons">
      <a href="#">
         <svg class="icon"><use xlink:href="images/sprite.svg#catalogue"></use></svg>
         <p>Catalogue</p>
      </a>
      <a id='popup_gmaps' href="https://googlemaps.com" target="_blank">
         <svg class="icon"><use xlink:href="images/sprite.svg#geoloc"></use></svg>
         <p>Itinéraire</p>
      </a>
   </div>
</div>
@endsection

@isset($search)
    @push('scripts')
        <script>
            document.getElementById('inputSearch').value = '{{ $search }}';
            window.onload = () => {
                document.getElementById('buttonSearch').click();
            }
        </script>
    @endpush
@endisset

@push('scripts')
   <script src="{{ asset('js/favori.js') }}"></script>
   <script src="{{ asset('js/map.js') }}"></script>
@endpush
