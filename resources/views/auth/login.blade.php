@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/connect.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('layouts.container_corp')

<div class="connect">
  <div class="head">

    <h1 class="titreImg">Bienvenue</h1>

    <div class="centre">
        <svg class="imagebvn"><use xlink:href="images/sprite.svg#imagebvn"></use></svg>
    </div>
  </div>
  <div class="formulaire">
    <h1 class="titreForm">Bienvenue</h1>
    <form method="POST" action="{{ route('login') }}" class="formulaireConnect form_center">
        @csrf
        <div class="input_row">
            <input type="email" id="email" class="input" placeholder="Adresse e-mail"
                   name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
        </div>
        <div class="input_row">
            <input type="password" id="password" class="input" placeholder="Mot de passe"
                   name="password" required autocomplete="current-password" required>
        </div>

        @error('email')
        <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror
        @error('password')
        <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
        @enderror

        @if (Route::has('password.request'))
            <a class="btn btn-link" href="{{ route('password.request') }}">
                Mot de passe oublié ?
            </a>
        @endif

      <button type="submit" class="bouton_form brouge bsubmit" >Se connecter</button>
      <a href="{{ route('redirect_to_goggle') }}" type="button" class="bouton_form bgoogle">
          <svg class="logoGoogle"><use xlink:href="../images/sprite.svg#google"></use></svg>
          Continuer avec Google
      </a>
      <p class="ou">— ou —</p>
      <a href="{{ route('register') }}" class="bouton_form bbleu">S'inscrire</a>
    </form>
  </div>

</div>
@endsection
