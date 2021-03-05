import 'leaflet.markercluster';

let carte = L.map('map', {center: [46.3630104, 2.9846608],zoom: 5, /*attributionControl : false,*/ zoomControl: false});
L.tileLayer('https://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);
L.control.zoom({position:'bottomright'}).addTo(carte);
let markers = L.markerClusterGroup({
    iconCreateFunction: function(cluster) {
        return L.divIcon({
            html: cluster.getChildCount(),
            className: 'mycluster',
            iconSize: null
        });
    }
}).addTo(carte);

//pour les tests :
carte.setView([44.544606, 6.077989], 14, { animation: true });
nearStores([6.077989, 44.544606]);

var popup = document.getElementsByClassName('popup')[0];

carte.addEventListener('click', () => {
   autocomplete.innerHTML = '';
   if (popup.classList[1] === 'active') {
      popup.classList.value = 'popup';
   }
   switchFilter();
});

var bouton_filter = document.getElementsByClassName('filter')[0];
var filter_cancel = document.getElementById('filter_cancel');

bouton_filter.addEventListener('click', () => {
   if (filter_cancel.getAttribute('xlink:href') == 'images/sprite.svg#filter_cancel') {
      popup.classList.value = 'popup';
   }
   switchFilter();
});

function switchFilter() {
   if (popup.classList[1] === 'active') {
      filter_cancel.setAttribute('xlink:href', 'images/sprite.svg#filter_cancel');
   } else {
      filter_cancel.setAttribute('xlink:href', 'images/sprite.svg#filter');
   }
}

var bouton_emptySearch = document.getElementsByClassName('emptySearch')[0];
bouton_emptySearch.addEventListener('click',() => {
   inputSearch.value = '';
   autocomplete.innerHTML = '';
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

function formatTel(ndt) {
   if(isNaN(ndt*1)) {
      return false;
   } else {
      ndt = ndt.toString();
   }
   var newTel = "";
   var count = 0;
   for(var i=0; i!=ndt.length; i++) {
      switch(count) {
         case 0:
         newTel+=ndt.charAt(i);
         count++;
         break;
         case 1:
         newTel+=ndt.charAt(i);
         count++;
         break;
         case 2:
         newTel+=" "+ndt.charAt(i);
         count=1;
         break;
      }
   }
   return newTel;
}

var markerRestaurant = L.icon({
   iconUrl: 'images/icon_cat/restaurant@2x.png',
   iconRetinaUrl: 'images/icon_cat/restaurant@3x.png',
   iconSize:     [25, 35]
});

var markerMagasin = L.icon({
   iconUrl: 'images/icon_cat/magasin@2x.png',
   iconRetinaUrl: 'images/icon_cat/magasin@3x.png',
   iconSize:     [25, 35]
});

var markerBoucherie = L.icon({
   iconUrl: 'images/icon_cat/boucherie@2x.png',
   iconRetinaUrl: 'images/icon_cat/boucherie@3x.png',
   iconSize:     [25, 35]
});

var markerFruits_legumes = L.icon({
   iconUrl: 'images/icon_cat/fruits_legumes@2x.png',
   iconRetinaUrl: 'images/icon_cat/fruits_legumes@3x.png',
   iconSize:     [25, 35]
});

var markerDebit_boissons = L.icon({
   iconUrl: 'images/icon_cat/debit_boissons@2x.png',
   iconRetinaUrl: 'images/icon_cat/debit_boissons@3x.png',
   iconSize:     [25, 35]
});

var markerMagasin_vetements = L.icon({
   iconUrl: 'images/icon_cat/magasin_vetements@2x.png',
   iconRetinaUrl: 'images/icon_cat/magasin_vetements@3x.png',
   iconSize:     [25, 35]
});

var markerCulture = L.icon({
   iconUrl: 'images/icon_cat/culture@2x.png',
   iconRetinaUrl: 'images/icon_cat/culture@3x.png',
   iconSize:     [25, 35]
});

async function nearStores(coord) {

   markers.clearLayers();

   let lat = coord[1];
   let lon = coord[0];


   let response = await fetch(`${window.location.origin}/api/stores?lat=${lat}&lon=${lon}`);
   let stores = await response.json();

   console.log(stores);

   stores.forEach((store) => {
      if (store.category_id == 1) {
         var marker = L.marker([store.lat, store.lon], {icon: markerRestaurant}).bindTooltip(
            store.name
            ,{
               permanent: false,
               offset: L.point(0, -16),
               direction: 'top',
               opacity: 0.8
            }
         );
      } else if (store.category_id == 2) {
         var marker = L.marker([store.lat, store.lon], {icon: markerMagasin}).bindTooltip(
            store.name
            ,{
               permanent: false,
               offset: L.point(0, -16),
               direction: 'top',
               opacity: 0.8
            }
         );
      } else if (store.category_id == 3) {
         var marker = L.marker([store.lat, store.lon], {icon: markerBoucherie}).bindTooltip(
            store.name
            ,{
               permanent: false,
               offset: L.point(0, -16),
               direction: 'top',
               opacity: 0.8
            }
         );
      } else if (store.category_id == 4) {
         var marker = L.marker([store.lat, store.lon], {icon: markerFruits_legumes}).bindTooltip(
            store.name
            ,{
               permanent: false,
               offset: L.point(0, -16),
               direction: 'top',
               opacity: 0.8
            }
         );
      } else if (store.category_id == 5) {
         var marker = L.marker([store.lat, store.lon], {icon: markerDebit_boissons}).bindTooltip(
            store.name
            ,{
               permanent: false,
               offset: L.point(0, -16),
               direction: 'top',
               opacity: 0.8
            }
         );
      } else if (store.category_id == 6) {
         var marker = L.marker([store.lat, store.lon], {icon: markerMagasin_vetements}).bindTooltip(
            store.name
            ,{
               permanent: false,
               offset: L.point(0, -16),
               direction: 'top',
               opacity: 0.8
            }
         );
      } else if (store.category_id == 7) {
         var marker = L.marker([store.lat, store.lon], {icon: markerCulture}).bindTooltip(
            store.name
            ,{
               permanent: false,
               offset: L.point(0, -16),
               direction: 'top',
               opacity: 0.8
            }
         );
      }

      marker.addEventListener('click', () => {
         var store_name = document.getElementById('store_name');
         var store_distance = document.getElementById('store_distance');
         var store_score = document.getElementById('store_score');
         var store_address = document.getElementById('store_address');
         var store_delivery = document.getElementById('store_delivery');
         var store_desc = document.getElementById('store_desc');
         var store_schedule = document.getElementById('store_schedule');
         var store_tel = document.getElementById('store_tel');
         var store_mail = document.getElementById('store_mail');
         var store_website = document.getElementById('store_website');
         var delivery_check = document.getElementById('delivery_check');
         var store_id = document.getElementById('store_id');

         var dist = distance(lat, lon, store.lat, store.lon, 'K');
         dist = dist.toFixed(1);

         store_name.textContent = store.name;
         store_distance.textContent = '\u00a0à ' + dist + 'km';
         store_score.textContent = '\u00a04/5';
         if ((store.city.zip).length < 5) {
            store.city.zip = '0' + store.city.zip;
         }
         store_address.textContent = store.address1 + ', ' + store.city.zip + ' ' + store.city.name;
         if (store.delivery === 1) {
            delivery_check.classList.value  = 'fas fa-check';
            store_delivery.textContent = 'Livraison possible';
         } else {
            delivery_check.classList.value = 'fas fa-times';
            store_delivery.textContent = 'Livraison indisponible';
         }
         store_desc.textContent = store.description;
         store_schedule.textContent = store.opening_hours;
         var phonenumber = formatTel(store.phonenumber);
         store_tel.textContent = phonenumber;
         store_mail.textContent = store.email;
         store_website.href = store.website;
         store_id.textContent = store.id;

         var macyofavoris = localStorage.getItem('macyofavoris');
         var heart_fav = document.getElementById('heart_fav');
         var exist = 0;
         if (macyofavoris !== null) {
            macyofavoris = [macyofavoris];
            macyofavoris = macyofavoris[0].split([',']);
            for (var i = 0; i < macyofavoris.length; i++) {
               if (macyofavoris[i] == store.id) {
                  exist++;
               }
            }
            if (exist !== 0) {
               heart_fav.setAttribute('xlink:href', 'images/sprite.svg#heart_full');
            } else {
               heart_fav.setAttribute('xlink:href', 'images/sprite.svg#heart_empty');
            }
         } else {
            heart_fav.setAttribute('xlink:href', 'images/sprite.svg#heart_empty');
         }

         if (popup.classList[1] === undefined) {
            popup.classList.value = 'popup active';
         }
         switchFilter();

         var popup_gmaps = document.getElementById('popup_gmaps');
         popup_gmaps.href = 'https://www.google.com/maps/search/?api=1&query='+store.name+'+'+store.city.name;
      });
      marker.addTo(markers);
   });
}

let buttonSearch = document.getElementById('buttonSearch');
buttonSearch.addEventListener('click', recherche);

let inputSearch = document.getElementById('inputSearch');
inputSearch.addEventListener('input', chargeVilles);
inputSearch.addEventListener('keyup', (e) => {
    if(e.code === 'Enter') recherche()
});
inputSearch.addEventListener('click', () => {
   popup.classList.value = 'popup';
   switchFilter();
});

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
   iconUrl: 'images/icon_cat/recherche@2x.png',
   iconRetinaUrl: 'images/icon_cat/recherche@3x.png',
   iconSize:     [25, 35]
});

var searchLayer = L.marker([0, 0], {icon: markerSearch});

var markerPosition = L.icon({
   iconUrl: 'images/icon_cat/position@2x.png',
   iconRetinaUrl: 'images/icon_cat/position@3x.png',
   iconSize:     [25, 35]
});

function recherche() {
   autocomplete.innerHTML = '';
   carte.removeLayer(searchLayer);
   if (inputSearch.value != '') {
       window.history.replaceState({id: 'search'}, 'Carte | MAC-YO', '/map?q='+inputSearch.value);
      $.ajax({
         url: "https://api-adresse.data.gouv.fr/search/?q="+inputSearch.value+"&limit=1",
         success: function(data) {
            var lat = data.features[0].geometry.coordinates[0];
            var lon = data.features[0].geometry.coordinates[1];
            carte.setView([lon, lat], 14, { animation: true });
            searchLayer = L.marker([lon, lat], {icon: markerSearch}).bindTooltip(
               data.features[0].properties.label
               ,{
                  permanent: false,
                  offset: L.point(0, -16),
                  direction: 'top',
                  opacity: 0.8
               }
            ).addTo(carte);
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

var url_string = window.location.href;
var url = new URL(url_string);
var lat = url.searchParams.get("lat");
var lon = url.searchParams.get("lon");
if (lat !== null && lon !== null) {
   carte.setView([lat, lon], 20, { animation: true });
   nearStores([lon, lat]);
}
