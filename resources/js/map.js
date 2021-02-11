import 'leaflet.markercluster';

let carte = L.map('map', {center: [46.3630104, 2.9846608],zoom: 5, attributionControl : false, zoomControl: false});
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);
L.control.zoom({position:'bottomright'}).addTo(carte);
let markers = L.markerClusterGroup().addTo(carte);

//pour les tests :
carte.setView([44.544606, 6.077989], 14, { animation: true });
nearStores([6.077989, 44.544606]);

var popup = document.getElementsByClassName('popup')[0];

carte.addEventListener('click', () => {
   autocomplete.innerHTML = '';
   if (popup.classList[1] === 'active') {
      popup.classList.value = 'popup';
   }
});

function distance(lat1, lon1, lat2, lon2, unit) {
   if ((lat1 == lat2) && (lon1 == lon2)) {
      return 0;
   }
   else {
      var radlat1 = Math.PI * lat1/180;
      var radlat2 = Math.PI * lat2/180;
      var theta = lon1-lon2;
      var radtheta = Math.PI * theta/180;
      var dist = Math.sin(radlat1) * Math.sin(radlat2) + Math.cos(radlat1) * Math.cos(radlat2) * Math.cos(radtheta);
      if (dist > 1) {
         dist = 1;
      }
      dist = Math.acos(dist);
      dist = dist * 180/Math.PI;
      dist = dist * 60 * 1.1515;
      if (unit=="K") { dist = dist * 1.609344 }
      if (unit=="N") { dist = dist * 0.8684 }
      return dist;
   }
}

async function nearStores(coord) {

   markers.clearLayers();

   let lat = coord[1];
   let lon = coord[0];


   let response = await fetch(`${window.location.origin}/api/stores?lat=${lat}&lon=${lon}`);
   let stores = await response.json();

   console.log(stores);

   stores.forEach((store) => {
      var marker = L.marker([store.lat, store.lon], {icon: markerStore}).bindTooltip(
         store.name
         ,{
            permanent: false,
            offset: L.point(0, -16),
            direction: 'top',
            opacity: 0.8
         }
      );

      marker.addEventListener('click', () => {
         var store_name = document.getElementById('store_name');
         var store_distance = document.getElementById('store_distance');
         var store_score = document.getElementById('store_score');
         var store_delivery = document.getElementById('store_delivery');
         var store_desc = document.getElementById('store_desc');
         var store_schedule = document.getElementById('store_schedule');
         var store_tel = document.getElementById('store_tel');

         var dist = distance(lat, lon, store.lat, store.lon, 'K');
         dist = dist.toFixed(1);

         store_name.textContent = store.name;
         store_distance.textContent = '\u00a0à ' + dist + 'km';
         store_score.textContent = '\u00a04/5';
         if (store.delivery === 1) {
            store_delivery.textContent = 'Oui';
         } else {
            store_delivery.textContent = 'Non';
         }
         store_desc.textContent = store.description;
         store_schedule.textContent = store.opening_hours;
         store_tel.textContent = store.phonenumber;

         if (popup.classList[1] === undefined) {
            popup.classList.value = 'popup active';
         }
      });
      marker.addTo(markers);
   });
}

let buttonSearch = document.getElementById('buttonSearch');
buttonSearch.addEventListener('click', recherche);

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

var searchLayer = L.marker([0, 0], {icon: markerSearch});

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
   carte.removeLayer(searchLayer);
   if (inputSearch.value != '') {
      $.ajax({
         url: "https://api-adresse.data.gouv.fr/search/?q="+inputSearch.value+"&limit=1",
         success: function(data) {
            var lat = data.features[0].geometry.coordinates[0];
            var lon = data.features[0].geometry.coordinates[1];
            carte.setView([lon, lat], 14, { animation: true });
            searchLayer = L.marker([lon, lat], {icon: markerSearch}).addTo(carte);
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
         L.marker([position.coords.latitude, position.coords.longitude], {icon: markerPosition}).addTo(markers);
         // carte.setView([position.coords.latitude, position.coords.longitude], 14, { animation: true });
      });
   } else {
      /* la géolocalisation n'est pas disponible */
      alert('Votre géolocalisation est indisponible');
   }
}
userPosition();
