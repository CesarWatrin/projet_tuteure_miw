@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/register.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div>
        <div>{{ __('Register') }}</div>

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
@endsection
