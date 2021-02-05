import 'leaflet.markercluster';

let carte = L.map('map', {center: [46.3630104, 2.9846608],zoom: 5, attributionControl : false, zoomControl: false});
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);
L.control.zoom({position:'bottomright'}).addTo(carte);
let markers = L.markerClusterGroup().addTo(carte);

async function nearStores(coord) {

    markers.clearLayers();

    let lat = coord[1];
    let lon = coord[0];


    let response = await fetch(`${window.location.origin}/api/stores?lat=${lat}&lon=${lon}`);
    let stores = await response.json();

    stores.forEach((store) => {
        L.marker([store.lat, store.lon], {icon: markerStore}).addTo(markers);
    })
}

let buttonSearch = document.getElementById('buttonSearch');
buttonSearch.addEventListener('click', recherche);
// var map = document.getElementById('map')
// var popup = document.getElementsByClassName('popup')[0];
// map.addEventListener('click', () => {
//     popup.classList.toggle('active');
// });

let inputSearch = document.getElementById('inputSearch');
inputSearch.addEventListener('input', chargeVilles);

let autocomplete = document.getElementById('autocomplete');

function chargeVilles() {
   if (inputSearch.value.replace(/\s+/, '').length) {
      $.ajax({
         url: "https://api-adresse.data.gouv.fr/search/?q="+inputSearch.value+"&limit=10",
         success: function(data) {
            recupVilles(data.features);
         },
         error: function(data) {
            console.log('error when search');
         }
      });
   } else {
      autocomplete.innerHTML = '';
   }
}

function recupVilles(adresse) {
   var option = '';
   for (var i = 0; i < adresse.length; i++) {
      option += '<p onclick="setAdresse(this);">'+adresse[i].properties.label+'</p>';
   }
   autocomplete.innerHTML = option;
}


function setAdresse(elem) {
   inputSearch.value = elem.textContent;
   autocomplete.innerHTML = '';
}
window.setAdresse = setAdresse;

var markerSearch = L.icon({
   iconUrl: 'images/markerSearch.png',
   iconSize:     [24, 35]
});

var markerStore = L.icon({
   iconUrl: 'images/markerStore.png',
   iconSize:     [24, 35]
});

var markerPosition = L.icon({
   iconUrl: 'images/markerPosition.png',
   iconSize:     [20, 20]
});

function recherche() {
   autocomplete.innerHTML = '';
   if (inputSearch.value != '') {
      $.ajax({
         url: "https://api-adresse.data.gouv.fr/search/?q="+inputSearch.value+"&limit=1",
         success: function(data) {
            var lat = data.features[0].geometry.coordinates[0];
            var lon = data.features[0].geometry.coordinates[1];
            carte.setView([lon, lat], 14, { animation: true });
            L.marker([lon, lat], {icon: markerSearch}).addTo(carte);
            nearStores([lat,lon]);
         },
         error: function(data) {
            console.log('error when search');
         }
      });
   }
}

function userPosition() {
   if ("geolocation" in navigator) {
         navigator.geolocation.getCurrentPosition(function(position) {
            L.marker([position.coords.latitude, position.coords.longitude], {icon: markerPosition}).addTo(carte);
            // carte.setView([position.coords.latitude, position.coords.longitude], 14, { animation: true });
         });
   } else {
      /* la géolocalisation n'est pas disponible */
      alert('Votre géolocalisation est indisponible');
   }
}
userPosition();
