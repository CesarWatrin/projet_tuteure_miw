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
@endsection
