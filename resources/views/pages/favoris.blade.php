@extends ('layouts.app')

@push('styles')
    <link href="{{ asset('css/favoris.css') }}" rel="stylesheet">
@endpush

@section ('content')

<div class="favoris_header">
   <img class="sky_wave" src="../images/sky_wave.svg" alt="wave">
   <span class="corp">MAC-YO Corp.</span>
   <h1>Vos Favoris</h1>
   <div class="list_favoris"></div>
</div>

@endsection

@push('scripts')
    <script src="{{ asset('js/favori.js') }}"></script>
@endpush
