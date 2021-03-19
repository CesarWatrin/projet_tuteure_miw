@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/connect.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('layouts.container_corp')

<div class="connect">
    <div class="head">

        <h1 class="titreImg">S'inscrire</h1>

        <div class="centre">
            <svg class="imagebvn"><use xlink:href="images/sprite.svg#imagebvn"></use></svg>
        </div>
    </div>
    <div class="formulaire">
        <h1 class="titreForm">S'inscrire</h1>



        <form class="formulaireConnect" id="register_form" method="POST" action="{{ route('register') }}">
            @csrf

            <strong>Veuillez choisir un statut :</strong>
            <div class="input_row roles_row">

                @foreach($roles as $role)
                    <div class="role_button">
                        <input type="radio" name="role" class="role_radio" id="{{ $role->name }}"
                               value="{{ $role->id }}" @if(old('role') == $role->id) checked @endif
                               onclick="togglePhonenumber()"/>
                        <label for="{{ $role->name }}" class="role_label"
                               onclick="document.getElementById('suite_form').style.display = 'block'">
                            <span class="role_titre">{{ $role->name }}</span>
                            <span>{{ $role->description }}</span>
                        </label>
                    </div>
                @endforeach

                @error('role')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div id="suite_form" @if(!$errors->any()) style="display: none" @endif>

            <div class="input_row">

                <input id="surname" name="surname" type="text" class="input" placeholder="Nom de famille"
                       value="{{ old('surname') }}" required autocomplete="family-name" autofocus>

                @error('surname')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">

                <input id="firstname" name="firstname" type="text" class="input" placeholder="Prénom"
                       value="{{ old('firstname') }}" required autocomplete="given-name">

                @error('firstname')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">

                <input id="email" name="email" type="email" class="input" placeholder="Adresse e-mail"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row" id="phone_row">

                <input id="phonenumber" name="phonenumber" type="phonenumber" class="input" placeholder="Nº de téléphone"
                       value="{{ old('phonenumber') }}" autocomplete="tel">

                @error('phonenumber')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">

                <input id="password" type="password" class="input" placeholder="Mot de passe"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">

                <input id="password_confirmation" type="password"  class="input" placeholder="Confirmation du mot de passe"
                       name="password_confirmation" required autocomplete="new-password">
            </div>

            <div class="input_row">

                <div class="cgu">
                    <input id="cgu" type="checkbox"  class="input" name="cgu" required>
                    <label for="cgu">J'ai lu et j'accepte les <a href="{{ route('legal') }}">Conditions générales d'utilisation</a>.</label>
                </div>

                @error('cgu')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div>
                <button type="submit" class="bouton_form brouge">
                    S'inscrire
                </button>
            </div>

            </div>
            <p class="ou">— Vous avez déjà un compte ? —</p>
            <a href="{{ route('login') }}" class="bouton_form bbleu">Se connecter</a>
        </form>

    </div>

</div>
@endsection

@push('scripts')
    <script>
        function togglePhonenumber() {
            let radioUser = document.getElementById('Utilisateur');
            if(!radioUser.checked) {
                document.getElementById('phone_row').style.display = 'block';
                document.getElementById('phonenumber').setAttribute('required', 'true');
            } else {
                document.getElementById('phone_row').style.display = 'none';
                document.getElementById('phonenumber').removeAttribute('required');
            }
        }

        togglePhonenumber();
    </script>
@endpush
