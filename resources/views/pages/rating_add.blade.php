@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/forms.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="container_corp">
        <span class="corp">MAC-YO Corp.</span>
    </div>
    <div class="container_center">

    <a class="back_link" href="{{ route('dashboard') }}">&lt; Retour au tableau de bord</a>
    <h1 class="titre">Laisser un avis à {{ $store->name }}</h1>
    <p class="texte">Mauvais commerce ? <a href="{{ route('commentscode_input') }}">Saisir un autre code</a></p>

    <form class="form_center" method="POST" action="{{ route('rating_post') }}">
        @csrf

        <input type="hidden" name="store_id" value="{{ $store->id }}" required/>

        <div class="input_row">

            <label for="rating">Attribuez une note :</label>
            <div class="rate">
                <input type="radio" id="star5" name="rating" value="5" hidden required/>
                <label for="star5"><svg><use xlink:href="../images/sprite.svg#star"></use></svg></label>
                <input type="radio" id="star4" name="rating" value="4" hidden required/>
                <label for="star4"><svg><use xlink:href="../images/sprite.svg#star"></use></svg></label>
                <input type="radio" id="star3" name="rating" value="3" hidden required/>
                <label for="star3"><svg><use xlink:href="../images/sprite.svg#star"></use></svg></label>
                <input type="radio" id="star2" name="rating" value="2" hidden required/>
                <label for="star2"><svg><use xlink:href="../images/sprite.svg#star"></use></svg></label>
                <input type="radio" id="star1" name="rating" value="1" hidden required/>
                <label for="star1"><svg><use xlink:href="../images/sprite.svg#star"></use></svg></label>
            </div>

            @error('rating')
            <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input_row">

            <label for="comment">Vous pouvez compléter votre note avec un commentaire :</label>
            <textarea id="comment" name="comment" class="input textarea"
                      @if(old('comment')) value="{{ old('comment') }}" @endif
                placeholder="Commentaire (facultatif)"
            ></textarea>

            @error('comments_code')
            <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="button brouge">
            Envoyer
        </button>

    </form>
</div>
@endsection
