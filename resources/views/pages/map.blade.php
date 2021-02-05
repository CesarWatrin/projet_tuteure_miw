@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/map.css') }}" rel="stylesheet">
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
            <!--<img src="images/filter.svg" alt="filter">-->
            <svg class="icon"><use xlink:href="images/sprite.svg#filter"></use></svg>
        </button>
    </div>

    <div id="map"></div>

    <div class="popup">
        <div class="popup_header">
            <!--<svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
            <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>-->
        </div>
        <div class="popup_body">
            @include('layouts.store_card')
            <div class="popup_info">
                <div class="delivery">
                    <h4>Livraison possible: </h4>
                    <p>Non</p>
                </div>
                <div class="description">
                    <h4>Description: </h4>
                    <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et accusam et justo duo dolores et ea rebum. Stet clita kasd gubergren, no sea takimata sanctus est Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
                </div>
            </div>
        </div>
        <div class="popup_buttons">
            <button><svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>Catalogue</button>
            <button><svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>06 31 21 16 84</button>
            <button><svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>Itinéraire</button>
        </div>
    </div>
@endsection
