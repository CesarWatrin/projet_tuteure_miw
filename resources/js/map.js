let carte = L.map('map', {center: [46.3630104, 2.9846608],zoom: 5, attributionControl : false, zoomControl: false});
L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'}).addTo(carte);
L.control.zoom({position:'bottomright'}).addTo(carte);
