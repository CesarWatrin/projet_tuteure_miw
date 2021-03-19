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
            <img src="/storage/images/store_{{$store->id}}/commerce.jpg">
        </div>

        <div class="info-store">
            <h2 class="titre-store">{{$store->name}}</h2>
            <div class="contain">
                <a href="#dashboard" class="voir-info">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30.31" height="18.758" viewBox="0 0 15.31 9.758">
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
                <p>Voir le commerce</p>
            </div>
            </a>



            @if($store->state == 1)
            
            
            <div class="store-status-red">
            <svg id="remove" xmlns="http://www.w3.org/2000/svg" width="30.31" height="18.758" viewBox="0 0 34.681 34.681">
            <path id="Tracé_2115" data-name="Tracé 2115" d="M17.34,0a17.34,17.34,0,1,0,17.34,17.34A17.36,17.36,0,0,0,17.34,0Zm0,0" fill="#f44336"/>
            <path id="Tracé_2116" data-name="Tracé 2116" d="M168.666,166.623a1.445,1.445,0,1,1-2.043,2.043l-4.342-4.342-4.342,4.342a1.445,1.445,0,0,1-2.043-2.043l4.342-4.342-4.342-4.342a1.445,1.445,0,0,1,2.043-2.043l4.342,4.342,4.342-4.342a1.445,1.445,0,1,1,2.043,2.043l-4.342,4.342Zm0,0" transform="translate(-144.94 -144.94)" fill="#fafafa"/>
            </svg>





                <p>Hors-ligne</p>
            
            
            
            
            </div>
            
            
            @elseif($store->state == 2 || $store->state == 3)
            
            <div class="store-status-orange">
                <svg id="wait" xmlns="http://www.w3.org/2000/svg" width="30.31" height="18.7587" viewBox="0 0 36.279 36.016">
                    <g id="time-left" transform="translate(0 -1.688)">
                        <g id="Groupe_138" data-name="Groupe 138" transform="translate(0 1.688)">
                        <g id="Layer_2_16_" transform="translate(0)">
                            <g id="Groupe_137" data-name="Groupe 137">
                            <path id="Tracé_2107" data-name="Tracé 2107" d="M254.767,423.2c-.3.075-.6.141-.907.2a1.459,1.459,0,0,0,.531,2.868c.361-.067.724-.146,1.08-.235a1.458,1.458,0,0,0-.7-2.83Z" transform="translate(-232.963 -390.286)" fill="#ff7300"/>
                            <path id="Tracé_2108" data-name="Tracé 2108" d="M412.883,139.083a1.458,1.458,0,0,0,2.769-.917c-.115-.348-.243-.7-.379-1.038a1.458,1.458,0,1,0-2.708,1.083C412.679,138.5,412.786,138.79,412.883,139.083Z" transform="translate(-380.293 -125.719)" fill="#ff7300"/>
                            <path id="Tracé_2109" data-name="Tracé 2109" d="M322.387,394.153c-.257.17-.523.334-.79.488a1.458,1.458,0,1,0,1.457,2.527c.318-.183.634-.379.941-.581a1.458,1.458,0,0,0-1.608-2.434Z" transform="translate(-295.843 -363.323)" fill="#ff7300"/>
                            <path id="Tracé_2110" data-name="Tracé 2110" d="M430.55,208.713a1.458,1.458,0,1,0-2.915.115c.012.308.015.62.008.927a1.458,1.458,0,1,0,2.916.064C430.568,209.452,430.565,209.08,430.55,208.713Z" transform="translate(-394.285 -191.276)" fill="#ff7300"/>
                            <path id="Tracé_2111" data-name="Tracé 2111" d="M379.726,344.361a1.458,1.458,0,0,0-2.042.292c-.185.247-.38.49-.58.725a1.459,1.459,0,0,0,.165,2.056c.035.03.07.057.107.082a1.458,1.458,0,0,0,1.949-.247c.238-.28.471-.571.692-.866A1.459,1.459,0,0,0,379.726,344.361Z" transform="translate(-347.374 -317.367)" fill="#ff7300"/>
                            <path id="Tracé_2112" data-name="Tracé 2112" d="M415.98,279.419a1.458,1.458,0,0,0-1.828.955c-.092.294-.194.589-.3.878a1.458,1.458,0,0,0,2.725,1.039c.131-.344.252-.695.362-1.044A1.459,1.459,0,0,0,415.98,279.419Z" transform="translate(-381.485 -257.698)" fill="#ff7300"/>
                            <path id="Tracé_2113" data-name="Tracé 2113" d="M15.442,34.81A15.059,15.059,0,0,1,11.7,33.621c-.014-.007-.027-.016-.041-.022-.28-.132-.559-.272-.829-.42l0,0a15.558,15.558,0,0,1-1.451-.907A15.219,15.219,0,0,1,9.439,7.341L9.491,7.3a15.245,15.245,0,0,1,17.086-.137L25.438,8.814c-.317.458-.122.792.433.742l4.95-.443a.815.815,0,0,0,.738-1.066L30.229,3.258c-.149-.537-.53-.6-.847-.143L28.24,4.765a18.011,18.011,0,0,0-13.2-2.806q-.7.121-1.381.295l-.009,0L13.6,2.27A17.984,17.984,0,0,0,3.627,8.953c-.021.025-.043.049-.062.076-.083.111-.165.225-.245.339-.131.187-.261.378-.385.57-.016.023-.027.047-.041.07A17.981,17.981,0,0,0,.019,20.615c0,.012,0,.025,0,.037.016.366.045.737.085,1.1,0,.024.007.046.011.069.041.367.092.735.156,1.1a18,18,0,0,0,5.075,9.761l.019.019.007.006A18.377,18.377,0,0,0,7.7,34.654a17.982,17.982,0,0,0,7.232,3.027,1.458,1.458,0,0,0,.515-2.871Z" transform="translate(0 -1.688)" fill="#ff7300"/>
                            <path id="Tracé_2114" data-name="Tracé 2114" d="M207.167,83.2a1.18,1.18,0,0,0-1.18,1.18V96.134l10.752,5.558a1.18,1.18,0,0,0,1.084-2.1l-9.476-4.9V84.378A1.18,1.18,0,0,0,207.167,83.2Z" transform="translate(-189.923 -76.841)" fill="#ff7300"/>
                            </g>
                        </g>
                        </g>
                    </g>

                </svg>


                <p>En Attente</p>
            
            
            
            
            </div>
            
            @elseif($store->state == 4)
            <div class="store-status-green">
                <svg id="checked" xmlns="http://www.w3.org/2000/svg" width="30.31" height="18.758" viewBox="0 0 12.569 12.569">
                    <g id="Groupe_104" data-name="Groupe 104">
                        <path id="Tracé_1412" data-name="Tracé 1412" d="M6.284,0a6.284,6.284,0,1,0,6.284,6.284A6.292,6.292,0,0,0,6.284,0ZM9.8,4.631,5.78,8.615a.618.618,0,0,1-.866.016L2.788,6.694a.639.639,0,0,1-.047-.882.623.623,0,0,1,.882-.032L5.308,7.324,8.9,3.733a.635.635,0,0,1,.9.9Z" fill="#00ac06"/>
                    </g>
                </svg>
                <p>En ligne</p>
            </div>
            


            @endif
                
        </div>
    </div>
    @endforeach
    @endif

    <a class="lien-ajout" href="stores/add">

        <div class="card-store">
            <p class="ajout">+</p>
        </div>

    </a>


</div>
@endsection