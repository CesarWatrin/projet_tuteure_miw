@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endpush

@section('content')
{{--    <div class="connect">
        <div class="head">

            <h1 class="titreImg">{{__('Register')}}</h1>

            <div class="centre">
                <svg class="imagebvn"><use xlink:href="images/sprite.svg#imagebvn"></use></svg>
            </div>
        </div>
        <div class="formulaire">
            <h1 class="titreForm">{{__('Register')}}</h1>

        <form id="register_form" method="POST" action="{{ route('register') }}">
            @csrf

            <div class="input_row">
                <label for="role">{{__('Role')}}</label>

                @foreach($roles as $role)
                    <div>
                        <input type="radio" name="role" id="{{ $role->name }}"
                               value="{{ $role->id }}" @if(old('role')) checked @endif/>
                        <label for="{{ $role->name }}">{{ $role->name }}</label>
                    </div>
                @endforeach

                @error('role')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="input_row">
                <label for="surname">{{ __('Surname') }}</label>

                <input id="surname" name="surname" type="text"
                       value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                @error('surname')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">
                <label for="firstname">{{ __('First name') }}</label>

                <input id="firstname" name="firstname" type="text"
                       value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                @error('firstname')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">
                <label for="email">{{ __('E-Mail Address') }}</label>

                <input id="email" name="email" type="email"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">
                <label for="phonenumber">{{ __('Phone number') }}</label>

                <input id="phonenumber" name="phonenumber" type="phonenumber"
                       value="{{ old('phonenumber') }}" required autocomplete="phonenumber">

                @error('phonenumber')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">
                <label for="password">{{ __('Password') }}</label>

                <input id="password" type="password"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">
                <label for="password_confirmation">{{ __('Confirm Password') }}</label>

                <input id="password_confirmation" type="password" required
                       name="password_confirmation" autocomplete="new-password">
            </div>

            <div>
                <button type="submit">
                    {{ __('Register') }}
                </button>
            </div>
        </form>
    </div>
    </div>--}}
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
{{--                <label for="role">{{__('Role')}}</label>--}}

                @foreach($roles as $role)
                    <div class="role_button">
                        <input type="radio" name="role" class="role_radio" id="{{ $role->name }}"
                               value="{{ $role->id }}" @if(old('role')) checked @endif/>
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

            <div id="suite_form" style="display: none">

            <div class="input_row">
{{--                <label for="surname">{{ __('Surname') }}</label>--}}

                <input id="surname" name="surname" type="text" class="inputText" placeholder="Nom de famille"
                       value="{{ old('surname') }}" required autocomplete="surname" autofocus>

                @error('surname')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">
{{--                <label for="firstname">{{ __('First name') }}</label>--}}

                <input id="firstname" name="firstname" type="text" class="inputText" placeholder="Prénom"
                       value="{{ old('firstname') }}" required autocomplete="firstname" autofocus>

                @error('firstname')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">
{{--                <label for="email">{{ __('E-Mail Address') }}</label>--}}

                <input id="email" name="email" type="email" class="inputText" placeholder="Adresse e-mail"
                       value="{{ old('email') }}" required autocomplete="email">

                @error('email')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">
{{--                <label for="phonenumber">{{ __('Phone number') }}</label>--}}

                <input id="phonenumber" name="phonenumber" type="phonenumber" class="inputText" placeholder="Nº de téléphone"
                       value="{{ old('phonenumber') }}" required autocomplete="phonenumber">

                @error('phonenumber')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">
{{--                <label for="password">{{ __('Password') }}</label>--}}

                <input id="password" type="password" class="inputText" placeholder="Mot de passe"
                       name="password" required autocomplete="new-password">

                @error('password')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror
            </div>

            <div class="input_row">
{{--                <label for="password_confirmation">{{ __('Confirm Password') }}</label>--}}

                <input id="password_confirmation" type="password"  class="inputText" placeholder="Confirmation du mot de passe"
                       name="password_confirmation" required autocomplete="new-password">
            </div>

            <div>
                <button type="submit" class="button brouge">
                    S'inscrire
                </button>
            </div>

            </div>
        </form>




        {{--<form method="POST" action="{{ route('login') }}" class="formulaireConnect">
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
        </form>--}}
    </div>

</div>
@endsection
