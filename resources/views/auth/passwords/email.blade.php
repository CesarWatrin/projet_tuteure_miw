@extends('layouts.app')

@section('content')

    @include('layouts.container_corp')

    <div class="container_center">

        <a class="back_link" href="{{ route('login') }}"><i class="fas fa-chevron-left"></i> Retour à la page de connexion</a>
        <h1 class="titre">Mot de passe oublié</h1>
        <p class="texte">Saisissez votre adresse e-mail. Nous allons vous envoyer un lien permettant de réinitialiser votre mot de passe.</p>

        <form class="form_center" method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="input_row">

                <label for="email">Adresse e-mail :</label>
                <input id="email" name="email" type="email" class="input input_center"
                       @if(old('email')) value="{{ old('email') }}" @endif
                       required autocomplete="email" autofocus>

                @error('email')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
                @if (session('status'))
                <span class="input_success">
                    <strong>{{ session('status') }}</strong>
                </span>
                @endif
            </div>

            <button type="submit" class="bouton_form brouge bsubmit">
                Envoyer le lien
            </button>

        </form>

    </div>

@endsection
