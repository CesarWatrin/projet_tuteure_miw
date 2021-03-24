var heart_fav = document.getElementById('heart_fav');
var card_btn = document.getElementsByClassName('card_btn');

for (var i = 0; i < card_btn.length; i++) {
   card_btn[i].addEventListener('click', addToFav);
}

function addToFav(event) {
   var id = heart_fav.parentNode.parentNode.parentNode.parentNode.children[0].children[3].textContent;
   var exist = addStorage(id.trim());
   if (exist === 0) {
      heart_fav.setAttribute('xlink:href', 'images/sprite.svg#heart_full');
   } else {
      removeStorage(id);
      heart_fav.setAttribute('xlink:href', 'images/sprite.svg#heart_empty');
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

/////////////////////////////////page Favoris//////////////////////////////////////////

async function setFav() {
   let response = await fetch('store_card');
   let contenu = await response.text();
   var macyofavoris = localStorage.getItem('macyofavoris');
   if (macyofavoris !== null && macyofavoris.length !== 0) {
      macyofavoris = [macyofavoris];
      macyofavoris = macyofavoris[0].split([',']);
      list_favoris[0].innerHTML = '';
      for (var i = 0; i < macyofavoris.length; i++) {
         list_favoris[0].innerHTML += contenu;
      }
      getStoresById(macyofavoris)
         .catch(() => {
            list_favoris[0].innerHTML = '<strong>Une erreur est survenue dans la récupération de vos favoris</strong>';
            localStorage.removeItem('macyofavoris');
         });
   }
}

var list_favoris = document.getElementsByClassName('list_favoris');

if (list_favoris.length !== 0) { //si on est sur la page favoris
   setFav();
}

async function getStoresById(ids) {
   let response = await fetch(`${window.location.origin}/api/stores?ids=${ids}`);
   let stores = await response.json();
   
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

   for (var i = 0; i < store_name.length; i++) {
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
   }

   for (var i = 0; i < card_btn.length; i++) {
      card_btn[i].addEventListener('click', removeFav);
      img_store[i].addEventListener('click', () => {
         var id = event.target.parentNode.parentNode.children[1].children[0].children[3].children[0].textContent;
         var lat = event.target.parentNode.parentNode.children[1].children[0].children[3].children[1].textContent;
         var lon = event.target.parentNode.parentNode.children[1].children[0].children[3].children[2].textContent;
         window.location.href = window.location.origin + '/map?lat=' + lat + '&lon=' + lon;
      });
   }
}

function removeFav(event) {
   var id = event.target.parentNode.parentNode.parentNode.parentNode.children[0].children[3].children[0].textContent;
   var exist = addStorage(id.trim());
   if (exist === 0) {
      event.target.setAttribute('xlink:href', 'images/sprite.svg#heart_full');
   } else {
      removeStorage(id);
      event.target.setAttribute('xlink:href', 'images/sprite.svg#heart_empty');
      document.location.reload();
   }
}
