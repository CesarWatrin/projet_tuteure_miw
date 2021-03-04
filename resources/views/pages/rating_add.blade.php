@extends('layouts.app')

@push('styles')
    <link href="{{ asset('css/ratings.css') }}" rel="stylesheet">
@endpush

@section('content')

    @include('layouts.container_corp')

    <div class="container_center">

        <a class="back_link" href="{{ route('dashboard') }}"><i class="fas fa-chevron-left"></i> Retour au tableau de bord</a>
    <h1 class="titre">@if(!$rating)Laisser un avis à @else Modifier l'avis laissé à @endif {{ $store->name }}</h1>
    @if(!$rating)
            <p class="texte">Mauvais commerce ? <a href="{{ route('commentscode_input') }}">Saisir un autre code</a></p>
        @endif

    <form class="form_center" method="POST" action="{{ route('rating_post') }}">
        @csrf

        <input type="hidden" name="store_id" value="{{ $store->id }}" required/>

        <div class="input_row">

            <label for="rating">Attribuez une note :</label>
            <div class="rate">
                <input type="radio" id="star5" name="rating" value="5" hidden required @if($rating && $rating->rating == 5) checked @endif/>
                <label for="star5"><svg><use xlink:href="{{ asset('images/sprite.svg#star') }}"></use></svg></label>
                <input type="radio" id="star4" name="rating" value="4" hidden required @if($rating && $rating->rating == 4) checked @endif/>
                <label for="star4"><svg><use xlink:href="{{ asset('images/sprite.svg#star') }}"></use></svg></label>
                <input type="radio" id="star3" name="rating" value="3" hidden required @if($rating && $rating->rating == 3) checked @endif/>
                <label for="star3"><svg><use xlink:href="{{ asset('images/sprite.svg#star') }}"></use></svg></label>
                <input type="radio" id="star2" name="rating" value="2" hidden required @if($rating && $rating->rating == 2) checked @endif/>
                <label for="star2"><svg><use xlink:href="{{ asset('images/sprite.svg#star') }}"></use></svg></label>
                <input type="radio" id="star1" name="rating" value="1" hidden required @if($rating && $rating->rating == 1) checked @endif/>
                <label for="star1"><svg><use xlink:href="{{ asset('images/sprite.svg#star') }}"></use></svg></label>
            </div>

            @error('rating')
            <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input_row">

            <label for="comment">Vous pouvez compléter votre note avec un commentaire :</label>
            <textarea id="comment" name="comment" class="input textarea" placeholder="Commentaire (facultatif)"
            >@if(old('comment')){{ old('comment') }}@elseif($rating){{ $rating->comment }}@endif</textarea>

            @error('comments_code')
            <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <button type="submit" class="bouton_form brouge bsubmit">
            @if(!$rating) Envoyer @else Modifier @endif
        </button>

    </form>
</div>
@endsection
