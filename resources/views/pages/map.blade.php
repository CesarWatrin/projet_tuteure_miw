@extends('layouts.app')


@section('content')
    <div id="map"></div>
    <!--<script>
        let carte = L.map('carte', {center: [46.3630104, 2.9846608],zoom: 5, attributionControl : false});
        /* On aurait aussi pu écrire
        let carte = L.map('maCarte').setView([46.3630104, 2.9846608],5 );
        */
        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);
        /*let marker = L.marker([44.566667,6.083333]);
        marker.addTo(carte);*/

    </script>-->
@endsection
