@extends('layouts.app')

@section('content')

    @include('layouts.container_corp')

    <div class="container_center">

        <a class="back_link" href="{{ route('login') }}"><i class="fas fa-chevron-left"></i> Retour à la page de connexion</a>
        <h1 class="titre">Bonjour {{ $user->firstname }}</h1>
        <p class="texte">Puisqu'il s'agit de votre première connexion sur notre plateforme avec votre compte Google, veuillez sélectionner le statut sous lequel vous souhaitez vous inscrire :</p>

        <form class="formulaireConnect form_center" method="POST" action="{{ route('register_with_google') }}">
            @csrf

            <input type="hidden" name="user_info" value="{{ old('user_info') ?? json_encode($user) }}"/>

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

                <strong>Veuillez corriger et/ou compléter les informations suivantes :</strong>

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
                    <button id="submit_form" type="submit" class="bouton_form brouge">
                        S'inscrire
                    </button>
                </div>

        </form>
    </div>

@endsection

@push('scripts')
    <script>
        let radioUser = document.getElementById('Utilisateur');

        function togglePhonenumber() {
            if(!radioUser.checked) {
                document.getElementById('phone_row').style.display = 'block';
                document.getElementById('phonenumber').setAttribute('required', 'true');
                phoneOK = false;
                toggleSubmit();
            } else {
                document.getElementById('phone_row').style.display = 'none';
                document.getElementById('phonenumber').removeAttribute('required');
                document.getElementById('phonenumber').value = '';
                phoneOK = true;
                toggleSubmit();
            }
        }

        let phoneOK = false;
        let cguOK = false;

        document.getElementById('phonenumber').oninput = (e) => {
            phoneOK = radioUser.checked ? true : (!isNaN(e.target.value) && e.target.value.length === 10);
            toggleSubmit();
        };
        document.getElementById('cgu').oninput = (e) => {
            cguOK = e.target.checked;
            toggleSubmit();
        };

        function toggleSubmit() {
            console.log(phoneOK, cguOK);
            if(!phoneOK || !cguOK)
                document.getElementById('submit_form').setAttribute('disabled', 'true');
            else
                document.getElementById('submit_form').removeAttribute('disabled');
        }

        togglePhonenumber();
        toggleSubmit();
    </script>
@endpush
