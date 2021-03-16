@extends('layouts.app')

@push('styles')
   <link href="{{ asset('css/catalogue.css') }}" rel="stylesheet">
@endpush

@section('content')

   @include('layouts.container_corp')

   <div class="favoris_header">
      <img class="sky_wave" src="../images/sky_wave.svg" alt="wave">
      <h1 class="titre">Catalogue</h1>
   </div>

@endsection

@push('scripts')
   <script src="{{ asset('js/catalogue.js') }}"></script>
@endpush
