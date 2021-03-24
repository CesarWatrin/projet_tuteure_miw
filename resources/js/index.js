function userPosition() {
   if ("geolocation" in navigator) {
      navigator.geolocation.getCurrentPosition(function(position) {
         randomNearStores([position.coords.latitude, position.coords.longitude])
      }, () => {
         //coordonnées de Gap :
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

   if (stores.length !== 0) {
      carousel_index[0].innerHTML = '';

      for (var i = 0; i < stores.length; i++) {
         carousel_index[0].innerHTML += contenu;
      }

      var img_store = document.getElementsByClassName('img_store');
      var store_name = document.getElementsByClassName('store_name');
      var store_distance = document.getElementsByClassName('store_distance');
      var store_score = document.getElementsByClassName('store_score');
      var store_id = document.getElementsByClassName('store_id');
      var store_lat = document.getElementsByClassName('store_lat');
      var store_lon = document.getElementsByClassName('store_lon');
      var store_img = document.getElementsByClassName('store_img');

      function imageExists(image_url){
         var http = new XMLHttpRequest();
         http.open('HEAD', image_url, false);
         http.send();
         return http.status != 404;
      }

      for (var i = 0; i < stores.length; i++) {
         store_name[i].textContent = stores[i].name;
         store_distance[i].textContent = '\u00a0' + stores[i].city;
         var moy = 0;
         if (stores[i].ratings.length !== 0) {
            for (var j = 0; j < stores[i].ratings.length; j++) {
               moy += parseInt(stores[i].ratings[j].rating);
            }
            moy = moy/stores[i].ratings.length;
         } else {
            moy = -1;
         }
         if (moy !== -1) {
            if (Number.isInteger(moy)) {
               store_score[i].textContent = '\u00a0' + moy.toFixed(0) + '/5';
            } else {
               store_score[i].textContent = '\u00a0' + moy.toFixed(1) + '/5';
            }
         } else {
            store_score[i].textContent = '\u00a0 Aucune note';
         }
         store_id[i].textContent = stores[i].id;
         store_lat[i].textContent = stores[i].lat;
         store_lon[i].textContent = stores[i].lon;
         var src_img = '/storage/images/store_' + stores[i].id.toString() + '/commerce.jpg';
         if (imageExists(src_img)) {
            store_img[i].src = src_img;
         } else {
            src_img = '/storage/images/store_default/commercenotfound.jpg';
            store_img[i].src = src_img;
         }

         var macyofavoris = localStorage.getItem('macyofavoris');
         var heart_fav = document.getElementsByClassName('heart_fav');
         var exist = 0;
         if (macyofavoris !== null) {
            macyofavoris = [macyofavoris];
            macyofavoris = macyofavoris[0].split([',']);
            for (var j = 0; j < macyofavoris.length; j++) {
               if (macyofavoris[j] == stores[i].id) {
                  exist++;
               }
            }
            if (exist !== 0) {
               heart_fav[i].setAttribute('xlink:href', 'images/sprite.svg#heart_full');
            } else {
               heart_fav[i].setAttribute('xlink:href', 'images/sprite.svg#heart_empty');
            }
         } else {
            heart_fav[i].setAttribute('xlink:href', 'images/sprite.svg#heart_empty');
         }
      }

      var card_btn = document.getElementsByClassName('card_btn');

      for (var i = 0; i < heart_fav.length; i++) {
         card_btn[i].addEventListener('click', addToFav);
         img_store[i].addEventListener('click', () => {
            var lat = event.target.parentNode.parentNode.children[1].children[0].children[3].children[1].textContent;
            var lon = event.target.parentNode.parentNode.children[1].children[0].children[3].children[2].textContent;
            window.location.href = window.location.origin + '/map?lat=' + lat + '&lon=' + lon;
         });
      }
   }
}

function addToFav(event) {
   var id, cible;
   if (event.target.tagName === 'svg') {
      id = event.target.parentNode.parentNode.parentNode.children[0].children[3].children[0].textContent;
      cible = event.target.children[0];
   } else {
      id = event.target.parentNode.parentNode.parentNode.parentNode.children[0].children[3].children[0].textContent;
      cible = event.target;
   }
   var exist = addStorage(id.trim());
   if (exist === 0) {
      cible.setAttribute('xlink:href', 'images/sprite.svg#heart_full');
   } else {
      removeStorage(id);
      cible.setAttribute('xlink:href', 'images/sprite.svg#heart_empty');
   }
}

function removeStorage(id) {
   var macyofavoris = localStorage.getItem('macyofavoris');
   macyofavoris = [macyofavoris];
   macyofavoris = macyofavoris[0].split([',']);
   var index = macyofavoris.indexOf(id.trim());
   if (index > -1) {
      macyofavoris.splice(index, 1);
      localStorage.setItem('macyofavoris', macyofavoris);
      fetch(`${window.location.origin}/store/removeFavorite?id=${id.trim()}`);
   }
}

function addStorage(id) {
   var macyofavoris = localStorage.getItem('macyofavoris');
   var exist = 0;
   if (macyofavoris !== null && macyofavoris.length !== 0) {
      macyofavoris = [macyofavoris];
      macyofavoris = macyofavoris[0].split([',']);
      for (var i = 0; i < macyofavoris.length; i++) {
         if (macyofavoris[i] === id) {
            exist++;
         }
      }
      if (exist === 0) {
         macyofavoris.push(id);
         fetch(`${window.location.origin}/store/addFavorite?id=${id}`);
      }
      localStorage.setItem('macyofavoris', macyofavoris);
   } else {
      localStorage.setItem('macyofavoris', [id]);
      fetch(`${window.location.origin}/store/addFavorite?id=${id}`);
   }
   return exist;
}
