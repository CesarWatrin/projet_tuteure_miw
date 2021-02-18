@extends('layouts.app')
@section('content')
<div class="stores">
<img class="waves" src="images/sky_wave.svg">
    <h1>Vos Commerces</h1>
    @if($user->stores === null)
    t'as pas de store et toc l'abricot
    @else
    @foreach($user->stores as $store)
    <div class="card-store">
        <div class="img-store">
            <img src="images/commerce.png">
        </div>

        <div class="info-store">
            <h2 class="titre-store">{{$store->name}}</h2>
            <a href="#" class="voir-info">
            <svg xmlns="http://www.w3.org/2000/svg" width="15.31" height="9.758" viewBox="0 0 15.31 9.758">
                <g id="view" transform="translate(0 -92.835)">
                    <g id="Groupe_106" data-name="Groupe 106" transform="translate(0 92.835)">
                    <g id="Groupe_105" data-name="Groupe 105" transform="translate(0 0)">
                        <path id="Tracé_1413" data-name="Tracé 1413" d="M15.212,97.416c-.137-.187-3.4-4.581-7.558-4.581S.234,97.229.1,97.416a.505.505,0,0,0,0,.6c.137.187,3.4,4.581,7.558,4.581s7.421-4.394,7.558-4.581A.5.5,0,0,0,15.212,97.416Zm-7.558,4.167c-3.066,0-5.721-2.916-6.507-3.87.785-.954,3.435-3.869,6.507-3.869s5.721,2.916,6.507,3.87C13.377,98.668,10.727,101.583,7.655,101.583Z" transform="translate(0 -92.835)" fill="#ff847c"/>
                    </g>
                    </g>
                    <g id="Groupe_108" data-name="Groupe 108" transform="translate(4.626 94.686)">
                    <g id="Groupe_107" data-name="Groupe 107" transform="translate(0 0)">
                        <path id="Tracé_1414" data-name="Tracé 1414" d="M157.75,154.725a3.028,3.028,0,1,0,3.028,3.028A3.032,3.032,0,0,0,157.75,154.725Zm0,5.047a2.019,2.019,0,1,1,2.019-2.019A2.021,2.021,0,0,1,157.75,159.772Z" transform="translate(-154.722 -154.725)" fill="#ff847c"/>
                    </g>
                    </g>
                </g>
            </svg>
                Voir le commerce
            </a>
            <div class="store-status">
            <svg id="checked" xmlns="http://www.w3.org/2000/svg" width="12.569" height="12.569" viewBox="0 0 12.569 12.569">
                <g id="Groupe_104" data-name="Groupe 104">
                    <path id="Tracé_1412" data-name="Tracé 1412" d="M6.284,0a6.284,6.284,0,1,0,6.284,6.284A6.292,6.292,0,0,0,6.284,0ZM9.8,4.631,5.78,8.615a.618.618,0,0,1-.866.016L2.788,6.694a.639.639,0,0,1-.047-.882.623.623,0,0,1,.882-.032L5.308,7.324,8.9,3.733a.635.635,0,0,1,.9.9Z" fill="#00ac06"/>
                </g>
            </svg>
            En ligne
            </div>
        </div>
    </div>
    @endforeach
    @endif

    <a class="lien-ajout" href="#">

        <div class="card-store">
            <p class="ajout">+</p>
        </div>

    </a>


</div>
@endsection