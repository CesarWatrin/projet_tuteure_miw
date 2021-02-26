@extends ('layouts.app')

@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush

@section ('content')

    <header class="index_header">
        <span class="corp">MAC-YO Corp.</span>
        <div class="header_content">
            <img class="main_illustration" src="images/main_illustration.svg"/>
            <div class="flex_container">
                <h1 class="accroche">Ventes<br>à emporter ?<span>C'est ici.</span></h1>
                <form method="get" action="{{ route('map') }}">
                    <button class="bouton recherche">
                        <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
                    </button>
                    <input type="text" class="input" name="q" placeholder="Essayez un nom de ville..."/>
                </form>
                <span class="separateur">— ou —</span>
                <button class="bouton geoloc">
                    Autour de moi
                    <svg class="icon"><use xlink:href="images/sprite.svg#geoloc"></use></svg>
                </button>
            </div>
        </div>
    </header>

    <!--<svg class="vagues_header"><use xlink:href="images/sprite.svg#separation_header"></use></svg>-->
    <img src="images/separation_header.svg"/>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <br/>

@endsection
