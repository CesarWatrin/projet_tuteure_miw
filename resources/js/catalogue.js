var url_string = window.location.href;
var store_id = url_string.split('/')[4];

getStore(store_id);

var titre = document.getElementById('titre');
var store_link = document.getElementById('store_link');
var ckeditor_container = document.getElementsByClassName('ckeditor_container')[0];

async function getStore(id) {
   var response = await fetch(`${window.location.origin}/api/stores?id=${id}`);
   var store = await response.json();

   titre.textContent = store.name + ' à ' + store.city;
   store_link.href = window.location.origin + '/map?lat=' + store.lat + '&lon=' + store.lon;

   if (store.catalog !== null) {
      ckeditor_container.innerHTML = store.catalog;
   }
}
