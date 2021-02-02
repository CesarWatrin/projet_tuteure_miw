@extends ('layouts.app')

@section ('content')

<div class="favoris_header">
   <span class="corp">MAC-YO Corp.</span>
   <h1>Vos Favoris</h1>
</div>
<div class="list_favoris">
   @for($i = 0; $i < 5; $i++)
      @include('layouts.store_card')
   @endfor
</div>
<!-- <img src="../images/sky_wave.svg" alt="wave"> -->

@endsection
