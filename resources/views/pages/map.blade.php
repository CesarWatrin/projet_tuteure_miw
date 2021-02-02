@extends('layouts.app')


@section('content')
    <div class="searchbar">
        <div class="search">
            <input type="text" placeholder="Essayer un nom de ville ...">
            <button></button>
        </div>
        <button class="filter"></button>
    </div>

    <div id="map"></div>

    <div class="popup">
        {{--@extends('layouts.store_card')--}}
        @include('layouts.store_card')
    </div>



    <script>
        var map = document.getElementById('map')
        var popup = document.getElementsByClassName('popup')[0];
        map.addEventListener('click', () => {
            popup.classList.toggle('active');
        });
    </script>
@endsection


