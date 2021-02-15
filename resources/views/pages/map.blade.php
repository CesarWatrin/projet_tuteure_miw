@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/map.css') }}" rel="stylesheet">
<link href="{{asset('')}}">
@endpush

@section('content')
<div class="searchbar">
   <div class="search">
      <!--<input type="text" id="inputSearch" placeholder="Essayer un nom de ville ...">
      <button id="buttonSearch"><img src="images/search.svg" alt="search"></button>-->
      <button class="bouton recherche" id="buttonSearch">
         <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
      </button>
      <div class="champRecherche">
         <input type="text" class="champ " id="inputSearch" placeholder="Essayez un nom de ville..."/>
         <div id="autocomplete"></div>
      </div>
   </div>
   <button class="bouton filter">
      <img id="filter_cancel" src="images/filter.svg" alt="filter">
      <!-- <svg class="icon"><use xlink:href="images/sprite.svg#filter"></use></svg> -->
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
            <h4>Livraison possible : </h4>
            <p id="store_delivery">Non</p>
         </div>
         <div>
            <h4>Description : </h4>
            <p id="store_desc">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
         </div>
         <div>
            <h4>Horaires d'ouvertures : </h4>
            <p id="store_schedule">Tous les jours : 11h-14h - 18h-23h</p>
         </div>

         <div class="popup_contact">
            <h4>Nous contacter : </h4>
            <p id="store_tel">📞 06 01 32 59 89</p>
            <p id="store_mail">📧 magasin.macyo@hotmail.com</p>
            <p>🌍 <a id="store_website" target="_blank" href="https://cesarwatrin.fr">Accéder au site web</a></p>
         </div>
      </div>
   </div>
   <div class="popup_buttons">
      <div>
         <img src="images/catalogue.svg" alt="catalogue">
         <p>Catalogue</p>
      </div>
      <a id='popup_gmaps' href="https://googlemaps.com" target="_blank">
         <img src="images/cursorPopup.svg" alt="position">
         <p>Itinéraire</p>
      </a>
   </div>
</div>
@endsection
