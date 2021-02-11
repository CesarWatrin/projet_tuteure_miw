@extends ('layouts.app')

@section ('content')

<div class="favoris_header">
   <img class="sky_wave" src="../images/sky_wave.svg" alt="wave">
   <span class="corp">MAC-YO Corp.</span>
   <h1>Vos Favoris</h1>
   <div class="list_favoris">
      @for($i = 0; $i < 5; $i++)
         @include('layouts.store_card')
      @endfor
   </div>
</div>

@endsection
