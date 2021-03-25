@extends('layouts.app')

@section('content')

    @include('layouts.container_corp')

    <div class="grid_with_title">

        <div class="grid_title">
            <a class="back_link" href="{{ route('account') }}"><i class="fas fa-chevron-left"></i> Retour à mon compte</a>
        </div>


        <div class="container_center">

    <h1 class="titre">Modifier mon profil</h1>

        <form class="form_center" id="account_edit_form" method="POST" action="{{ route('account_update') }}">
        @csrf

        <input type="hidden" name="role" value="{{ $user->role->id }}"/>

            <div class="input_row">

                <label for="surname">Nom de famille</label>
                <input id="surname" name="surname" type="text" class="input"
                       @if(old('surname')) value="{{ old('surname') }}" @else value="{{ $user->surname }}" @endif
                       required autocomplete="family-name" autofocus>

                @error('surname')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">

                <label for="firstname">Prénom</label>
                <input id="firstname" name="firstname" type="text" class="input"
                       @if(old('firstname')) value="{{ old('firstname') }}" @else value="{{ $user->firstname }}" @endif
                       required autocomplete="given-name">

                @error('firstname')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">

                <label for="email">Adresse e-mail</label>
                <input id="email" name="email" type="email" class="input"
                       @if(old('email')) value="{{ old('email') }}" @else value="{{ $user->email }}" @endif
                       required autocomplete="email">

                @error('email')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

        @if(!$user->is_basic())
            <div class="input_row" id="phone_row">

                <label for="phonenumber">Nº de téléphone</label>
                <input id="phonenumber" name="phonenumber" type="phonenumber" class="input"
                       @if(old('phonenumber')) value="{{ old('phonenumber') }}" @else value="{{ $user->phonenumber }}" @endif
                       required autocomplete="tel">

                @error('phonenumber')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>
        @endif

            <div>
                <button type="submit" class="bouton_form brouge bsubmit">
                    Modifier
                </button>
            </div>

    </form>

    </div>


    <div class="container_center">

        <h1 class="titre">Modifier mon mot de passe</h1>

        <form class="form_center" id="account_edit_password" method="POST" action="{{ route('password_update') }}">
            @csrf

            <div class="input_row">

                <label for="current_password">Mot de passe actuel</label>
                <input id="current_password" type="password" class="input"
                       name="current_password" required>


                @error('current_password')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">

                <label for="password">Nouveau mot de passe</label>
                <input id="password" type="password" class="input"
                       name="password" required autocomplete="new-password">

            </div>

            <div class="input_row">

                <label for="password">Confirmation du mot de passe</label>
                <input id="password_confirmation" type="password" class="input"
                       name="password_confirmation" required autocomplete="new-password">

                @error('password')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div>
                <button type="submit" class="bouton_form brouge bsubmit">
                    Modifier mon mot de passe
                </button>
            </div>

        </form>

    </div>

    </div>


@endsection
