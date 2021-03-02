@extends('layouts.app')

@section('content')

    @include('layouts.container_corp')

    <div class="container_center">

    <a class="back_link" href="{{ route('account') }}"><i class="fas fa-chevron-left"></i> Retour à mon compte</a>
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

        @if($user->role->id != 1)
            <div class="input_row" id="phone_row">

                <label for="phonenumber">Nº de téléphone</label>
                <input id="phonenumber" name="phonenumber" type="phonenumber" class="input"
                       @if(old('phonenumber')) value="{{ old('phonenumber') }}" @else value="{{ $user->phonenumber }}" @endif
                       autocomplete="tel">

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

@endsection
