@extends ('layouts.app')

@push('styles')
    <link href="{{ asset('css/favoris.css') }}" rel="stylesheet">
@endpush

@section ('content')

   @include('layouts.container_corp')

   <div class="favoris_header">
      <img class="sky_wave" src="../images/sky_wave.svg" alt="vague">
      <h1 class="titre">Vos Favoris</h1>
      <div class="list_favoris"><strong>Vous n'avez pas de favoris pour le moment</strong></div>
   </div>

@endsection

@push('scripts')
    <script src="{{ asset('js/favori.js') }}"></script>
@endpush
