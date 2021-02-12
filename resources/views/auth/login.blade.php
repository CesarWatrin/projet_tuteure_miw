@extends('layouts.app')

@section('content')
<div class="connect">
  <div class="head">

    <h1 class="titreImg">Bienvenue</h1>

    <div class="centre">
        <svg class="imagebvn"><use xlink:href="images/sprite.svg#imagebvn"></use></svg>
    </div>
  </div>
  <div class="formulaire">
    <h1 class="titreForm">Bienvenue</h1>
    <form method="POST" action="{{ route('login') }}" class="formulaireConnect">
        @csrf
        <input type="email" id="email" class="inputText" placeholder="Adresse e-mail"
               name="email" value="{{ old('email') }}" autocomplete="email" autofocus required>
        <input type="password" id="password" class="inputText" placeholder="Mot de passe"
               name="password" required autocomplete="current-password" required>

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

      <button type="submit" class="button brouge" >Se connecter</button>
      <button type="button" class="button bgoogle"><svg class="logoGoogle"><use xlink:href="../images/sprite.svg#google"></use></svg>Continuer avec Google</button>
      <p class="ou">— ou —</p>
      <a href="{{ route('register') }}" class="button bbleu">S'inscrire</a>
    </form>
  </div>


  <!-- <div class="footer">

    <footer>
      'tite navbar sympatoche'
    </footer>
  </div> -->
</div>
@endsection
