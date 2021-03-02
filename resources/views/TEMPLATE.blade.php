{{-- FICHIER DE DÉPART - À COPIER-COLLER --}}

@extends('layouts.app')

@push('styles')
    {{-- balises feuilles CSS ici --}}
    {{-- exemple : <link href="{{ asset('css/map.css') }}" rel="stylesheet"> --}}
@endpush

@section('content')

    @include('layouts.container_corp')

    {{-- contenu HTML ici --}}

@endsection

@push('scripts')
    {{-- balises scripts JS ici --}}
    {{-- exemple : <script src="{{ asset('js/map.js') }}"></script> --}}
@endpush
