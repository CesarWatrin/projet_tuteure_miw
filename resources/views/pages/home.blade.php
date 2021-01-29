@extends ('layouts.app')

@section ('content')

    <header class="index_header">
        <span class="corp">MAC-YO Corp.</span>
        <img class="main_illustration" src="images/main_illustration.svg"/>
        <div class="flex_container">
            <h1 class="accroche">Ventes<br>à emporter ?<span>C'est ici.</span></h1>
            <form>
                <input type="text" class="inputVille" placeholder="Essayez un nom de ville..."/>
                <button class="bouton recherche">
                    <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
                </button>
            </form>
            <span class="separateur">— ou —</span>
            <button class="bouton geoloc">
                Autour de moi
                <svg class="icon"><use xlink:href="images/sprite.svg#geoloc"></use></svg>
            </button>
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
