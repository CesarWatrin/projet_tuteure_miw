@extends('layouts.app')

@push('styles')
   <link href="{{ asset('css/catalogue.css') }}" rel="stylesheet">
@endpush

@section('content')

   @include('layouts.container_corp')

   <div class="favoris_header">
      <img class="sky_wave" src="../images/sky_wave.svg" alt="vague">
      <a id="store_link" href="#"><h1 id="titre" class="titre"></h1><a>
      <p class="sub_title">Catalogue</p>
      <div class="ckeditor_container">Ce magasin n'a aucun contenu dans son catalogue.</div>
   </div>

@endsection

@push('scripts')
   <script src="{{ asset('js/catalogue.js') }}"></script>
@endpush
