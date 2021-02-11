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
    <form class="formulaireConnect">
      <input type="email" id="email" class="inputText" placeholder="Adresse e-mail" required>
      <input type="password" id="password" class="inputText" placeholder="Mot de passe" required>

      <button type="button" class="button brouge">Se connecter</button>
      <button type="button" class="button bgoogle"><img src="../images/google.svg" class="logoGoogle">Continuer avec Google</button>
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
