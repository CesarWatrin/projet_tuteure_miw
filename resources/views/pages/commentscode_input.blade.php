@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/ratings.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('layouts.container_corp')

    <div class="container_center">

    <a class="back_link" href="{{ route('account') }}"><i class="fas fa-chevron-left"></i> Retour à Mon compte</a>
    <h1 class="titre">Laisser un avis</h1>
    <p class="texte">Lors du retrait de votre achat, le commerçant vous a donné un code permettant de laisser un avis sur notre plateforme.</p>

    <form class="form_center" method="GET" action="{{ route('rate_store') }}">

        <div class="input_row">

            <label for="comments_code">Saisissez ce code ici :</label>
            <input id="comments_code" name="comments_code" type="text" class="input input_center"
                   @if(old('comments_code')) value="{{ old('comments_code') }}" @endif
                   required autofocus>

            @error('comments_code')
            <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="bouton_form brouge bsubmit">
            Valider
        </button>

    </form>
</div>

@endsection
