function userPosition() {
   if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(function(position) {
         console.log(position.coords.latitude, position.coords.longitude);
         randomNearStores([position.coords.latitude, position.coords.longitude])
      }, () => {
         console.log('Votre géolocalisation est indisponible');
         //coordonnées de Gap :
         console.log(44.544606, 6.077989);
         randomNearStores([44.544606, 6.077989])
      });
   } else {
      /* la géolocalisation n'est pas disponible */
      console.log('Votre géolocalisation est indisponible');
   }
}
userPosition();

var carousel_index = document.getElementsByClassName('carousel_index');

async function randomNearStores(coord) {

   let lat = coord[0];
   let lon = coord[1];

   var response = await fetch(`${window.location.origin}/store/randomNearStores?lat=${lat}&lon=${lon}`);
   var stores = await response.json();

   var store_card = await fetch('store_card');
   var contenu = await store_card.text();

   for (var i = 0; i < stores.length; i++) {
      carousel_index[0].innerHTML += contenu;
   }
}
