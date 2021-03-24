@extends('layouts.app')

@section('content')

    @include('layouts.container_corp')

    <div class="container_center">

        <h1 class="titre">Réinitialiser le mot de passe</h1>
        <p class="texte">Saisissez votre adresse e-mail ainsi qu'un nouveau mot de passe.</p>

        <form class="form_center" method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $token }}">

            <div class="input_row">

                <label for="email">Adresse e-mail :</label>
                <input id="email" name="email" type="email" class="input input_center"
                       @if(old('email')) value="{{ $email ?? old('email') }}" @elseif($_GET['email']) value="{{ $_GET['email'] }}" disabled @endif
                       required autocomplete="email" autofocus>

                @error('email')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                @enderror

            </div>

            <div class="input_row">

                <label for="password">Mot de passe :</label>
                <input id="password" name="password" type="password" class="input input_center"
                       required autocomplete="new-password">

            </div>

            <div class="input_row">

                <label for="password-confirm">Mot de passe :</label>
                <input id="password-confirm" name="password_confirmation" type="password" class="input input_center"
                       required autocomplete="new-password">

            </div>

            @error('password')
            <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror

            <button type="submit" class="bouton_form brouge bsubmit">
                Réinitialiser le mot de passe
            </button>

        </form>

    </div>

{{--<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('password.update') }}">
                        @csrf

                        <input type="hidden" name="token" value="{{ $token }}">

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Reset Password') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>--}}
@endsection
