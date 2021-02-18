var heart_fav = document.getElementById('heart_fav');
var card_btn = document.getElementsByClassName('card_btn')[0];

card_btn.addEventListener('click', addToFav);

function addToFav() {
   if (heart_fav.getAttribute('xlink:href') === 'images/sprite.svg#heart_empty') {
      heart_fav.setAttribute('xlink:href', 'images/sprite.svg#heart_full')
   } else {
      heart_fav.setAttribute('xlink:href', 'images/sprite.svg#heart_empty')
   }
}
