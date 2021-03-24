@extends ('layouts.app')

@push('styles')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@section ('content')

<header class="index_header">
    <span class="corp">
        <img class="logo" src="{{ asset('images/logo.svg') }}"/>
        MAC-YO Corp.
    </span>
    <div class="header_content">
      <img class="main_illustration" src="images/main_illustration.svg"/>
      <div class="flex_container">
         <h1 class="accroche">Ventes<br>à emporter ?<span>C'est ici.</span></h1>
         <form method="get" action="{{ route('map') }}">
            <button class="bouton recherche">
               <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
            </button>
            <input type="text" class="input" name="q" placeholder="Essayez un nom de ville..."/>
         </form>
         <span class="separateur">— ou —</span>
         <a href="{{ route('map') }}" class="bouton geoloc">
            Autour de moi
            <svg class="icon"><use xlink:href="images/sprite.svg#geoloc"></use></svg>
         </a>
      </div>
   </div>
</header>

<!--<svg class="vagues_header"><use xlink:href="images/sprite.svg#separation_header"></use></svg>-->
<img src="images/separation_header.svg"/>

<div class="accroche_index">
   <p>Comment ça marche ?</p>
</div>

<div class="explications">
   <div class="etape">
      <div class="etape_img">
         <!-- <svg><use xlink:href="images/sprite.svg#illustration_index_1"></use></svg> -->
         <img src="images/illustration_index_1.svg" alt="carte">
      </div>
      <div class="etape_text">
         <p>Trouvez les commerces proposant la vente à emporter près de chez vous.</p>
      </div>
   </div>
   <div class="etape etape_link_1">
      <img src="images/trait_index.svg" alt="trait">
   </div>
   <div class="etape">
      <div class="etape_text">
         <p>Pour chaque commerce, consultez le catalogue et les avis laissés par les clients.</p>
      </div>
      <div class="etape_img">
         <img src="images/illustration_index_2.svg" alt="magasin">
      </div>
   </div>
   <div class="etape etape_link_2">
      <img src="images/trait_index.svg" alt="trait">
   </div>
   <div class="etape">
      <div class="etape_img">
         <img src="images/illustration_index_3.svg" alt="sac">
      </div>
      <div class="etape_text">
         <p>Contactez le commerce pour passer commande.</p>
      </div>
   </div>
</div>

<div class="accroche_index ai2">
   <p>Les catégories de commerce</p>
</div>

<div class="commerces">
   <div class="categorie">
      <div class="cat_img">
         <a href="{{ route('map', 'cat=1') }}"><img src="images/icon_cat/restaurant.svg" alt="restaurant"></a>
      </div>
      <div class="cat_text">
         <p>Restaurant</p>
      </div>
   </div>
   <div class="categorie">
      <div class="cat_img">
         <a href="{{ route('map', 'cat=2') }}"><img src="images/icon_cat/magasin.svg" alt="magasin"></a>
      </div>
      <div class="cat_text">
         <p>Magasin</p>
      </div>
   </div>
   <div class="categorie">
      <div class="cat_img">
         <a href="{{ route('map', 'cat=3') }}"><img src="images/icon_cat/boucherie.svg" alt="boucherie"></a>
      </div>
      <div class="cat_text">
         <p>Boucherie</p>
      </div>
   </div>
   <div class="categorie">
      <div class="cat_img">
         <a href="{{ route('map', 'cat=4') }}"><img src="images/icon_cat/fruits_legumes.svg" alt="fruits et legumes"></a>
      </div>
      <div class="cat_text">
         <p>Fruits et légumes</p>
      </div>
   </div>
   <div class="categorie">
      <div class="cat_img">
         <a href="{{ route('map', 'cat=5') }}"><img src="images/icon_cat/debit_boissons.svg" alt="debit de boissons"></a>
      </div>
      <div class="cat_text">
         <p>Débit de boissons</p>
      </div>
   </div>
   <div class="categorie">
      <div class="cat_img">
         <a href="{{ route('map', 'cat=6') }}"><img src="images/icon_cat/magasin_vetements.svg" alt="magasins de vetements"></a>
      </div>
      <div class="cat_text">
         <p>Magasin de vêtements</p>
      </div>
   </div>
   <div class="categorie">
      <div class="cat_img">
         <a href="{{ route('map', 'cat=7') }}"><img src="images/icon_cat/culture.svg" alt="culture"></a>
      </div>
      <div class="cat_text">
         <p>Culture</p>
      </div>
   </div>
</div>

<div class="accroche_index ai2">
   <p>Les commerces populaires à proximité</p>
</div>

<div class="carousel_index">
   <p class="nocom">Il n'y a aucun commerce à proximité de votre localisation</p>
</div>

<form method="get" action="{{ route('map') }}">
   <button class="bouton plus">Voir plus de commerces</button>
</form>

@endsection

@push('scripts')
   <script src="{{ asset('js/index.js') }}"></script>
@endpush
