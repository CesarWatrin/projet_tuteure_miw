let carte = L.map('map', {center: [46.3630104, 2.9846608],zoom: 5, attributionControl : false, zoomControl: false});
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);
L.control.zoom({position:'bottomright'}).addTo(carte);
let markers = L.layerGroup().addTo(carte);

async function nearStores() {

    markers.clearLayers();

    let [lat, lon] = document.getElementById('inputSearch').value.split(',');

    let response = await fetch(`https://macyo.test/api/stores?lat=${lat}&lon=${lon}`);
    let stores = await response.json();

    console.log(stores);

    stores.forEach((store) => {
        L.marker([store.lat, store.lon]).addTo(markers);
    })
}

let buttonSearch = document.getElementById('buttonSearch');
buttonSearch.addEventListener('click', nearStores);
// var map = document.getElementById('map')
// var popup = document.getElementsByClassName('popup')[0];
// map.addEventListener('click', () => {
//     popup.classList.toggle('active');
// });
