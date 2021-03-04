@extends ('layouts.app')

@push('styles')
<link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@section ('content')

<header class="index_header">
   <span class="corp">MAC-YO Corp.</span>
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
         <button class="bouton geoloc">
            Autour de moi
            <svg class="icon"><use xlink:href="images/sprite.svg#geoloc"></use></svg>
         </button>
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
         <img src="images/illustration_index_1.svg" alt="illustration_1">
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
         <img src="images/illustration_index_2.svg" alt="illustration_2">
      </div>
   </div>
   <div class="etape etape_link_2">
      <img src="images/trait_index.svg" alt="trait">
   </div>
   <div class="etape">
      <div class="etape_img">
         <img src="images/illustration_index_3.svg" alt="illustration_3">
      </div>
      <div class="etape_text">
         <p>Contactez le commerce pour passer commande.</p>
      </div>
   </div>
</div>

<div class="accroche_index ai2">
   <p>Les commerces populaires à proximité</p>
</div>

<div class="carousel_index">
   @for($i = 0; $i < 4; $i++)
      @include('layouts.store_card')
   @endfor
</div>

<form method="get" action="{{ route('map') }}">
   <button class="bouton plus">Voir plus de commerces</button>
</form>

@endsection
