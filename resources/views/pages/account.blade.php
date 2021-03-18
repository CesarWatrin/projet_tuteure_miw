@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/account.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('layouts.container_corp')

    <div class="user">
        <img class="waves" src="images/sky_wave.svg">

        <div class="user_gauche">
            <p class="titre">Mon compte</p>

            <div class="modout">

                <a href="{{ route('account_edit') }}" id="modif">
                    <svg class="icon with_label"><use xlink:href="{{ asset('images/sprite.svg#edit') }}"></use></svg>
                    <span>Modifier</span>
                </a>

                <a href="{{ route('logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   id="logout">
                    <svg class="icon with_label"><use xlink:href="{{ asset('images/sprite.svg#logout') }}"></use></svg>
                    <span>Se déconnecter</span>
                </a>

                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>

            </div>


            <div class="info">
                <div class="imgUser">
{{--                    <img src="images/user.jpg"/>--}}
                    <div class="initiales">{{ strtoupper(substr($user->firstname, 0, 1).substr($user->surname, 0, 1)) }}</div>
                </div>

                <p class="name">{{ $user->firstname }}<span class="orange">{{ $user->surname }}</span></p>
                <hr class="separation">
                @if(Auth::user()->is_manager())
                    <p class="tel">{{ join('.', str_split($user->phonenumber, 2)) }}</p>
                    <hr class="separation">
                @endif
                <p class="mail">{{ explode('@', $user->email)[0] }}<span class="orange">@</span>{{ explode('@', $user->email)[1] }}</p>
            </div>
        </div>

        <div class="user_droite">
            @if($ratings)
                <span class="sous_titre">Les avis que j'ai laissés</span>
                <a class="bouton_form bbleu" href="{{ route('commentscode_input') }}">Laisser un avis</a>
                <div class="ratings">
                    @foreach($ratings as $rating)
                        <div class="rating">
                            <div>
                                <span class="r_store_name">{{ $rating->store->name }}</span>
                                <span>{{ $rating->store->city }}</span>
                            </div>
                            <span class="r_rating">
                            <svg class="small_icon with_label"><use xlink:href="images/sprite.svg#star"></use></svg>
                            {{ $rating->rating }}/5
                        </span>
                            @if($rating->comment)
                            <div class="r_comment">
                                <svg class="big_icon quote"><use xlink:href="{{ asset('images/sprite.svg#quote') }}" </svg>
                                <p>{{ $rating->comment }}</p>
                                <svg class="big_icon quote qright"><use xlink:href="{{ asset('images/sprite.svg#quote') }}" </svg>
                            </div>
                            @endif
                            <div class="r_action">
                                <a href="{{ route('rate_store', ['comments_code' => $rating->store->comments_code]) }}" class="r_edit">
                                    <svg class="small_icon with_label"><use xlink:href="images/sprite.svg#edit"></use></svg>
                                    Modifier
                                </a>
                                <a href="{{ route('rating_delete') }}"
                                   onclick="event.preventDefault(); document.getElementById('rating_delete_{{ $rating->store->id }}').submit();"
                                   class="r_delete">
                                    <svg class="small_icon with_label"><use xlink:href="images/sprite.svg#delete"></use></svg>
                                    Supprimer
                                </a>
                                <form id="rating_delete_{{ $rating->store->id }}" action="{{ route('rating_delete') }}" method="POST">
                                    @csrf
                                    <input type="text" name="user_id" value="{{ Auth::id() }}"/>
                                    <input type="text" name="store_id" value="{{ $rating->store_id }}"/>
                                </form>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>

    </div>
@endsection
