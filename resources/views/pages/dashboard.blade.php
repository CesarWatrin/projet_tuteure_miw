@extends ('layouts.app')


@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endpush


@section ('content')
<div class="container">
    <div class="dashboard">
        <div class="header_dashboard">
            <h1>{{$store[0]->name}}</h1>
            <a href="{{ route('stores') }}"><- Vos Magasins</a>
        </div>
            <!--<div class="dashboard_bar">
                <select class="shops" onchange="changeStore()">
                    {{--@foreach($stores as $store)
                        <option value="{{$store->id}}">{{$store->name}}</option>
                    @endforeach--}}
                </select>
            </div>-->
            <div class="rewards">
                <div class="categorie_reward reward">
                    <p>n°{{$rank_c}}</p>
                    <p>{{ucfirst($store[0]->category->name)}}</p>
                    <svg><use xlink:href="{{asset("images/sprite.svg#reward_bg")}}"></use></svg>
                </div>
                <div class="subcategorie_reward reward">
                    <p>n°{{$rank_sc}}</p>
                    <p>{{ucfirst($store[0]->subcategory->name)}}</p>
                    <svg><use xlink:href="{{asset("images/sprite.svg#reward_bg")}}"></use></svg>
                </div>
            </div>
        </div>


        <div class="data_shop">
            <div class="data data_visitors">
                <p>{{sizeof($store[0]->views_all)}}</p>
                <p>Visiteurs</p>
            </div>
            <div class="data data_avg">
                <p>{{round($avg, 1)}}</p>
                <p>Moyenne</p>
            </div>
            <div class="data data_delivery">
                <p>{{sizeof($store[0]->ratings)}}</p>
                <p>Avis</p>
            </div>
            <div class="data data_followers">
                <p>{{sizeof($store[0]->favorited_by)}}</p>
                <p>Abonnés</p>
            </div>
        </div>

        <div class="container_comments">
            <h3>Commentaires</h3>
            <p>Nombre de commentaires: {{sizeof($comments)}}</p>
            <div class="comments">
                @if(sizeof($comments) == 0)
                    <p>Vous n'avez aucun commentaires</p>
                @else
                    @foreach($comments as $comment)
                        <div class="comment">
                            <div class="comment_text">
                                @if(is_null($comment->comment))
                                    <p>Aucun message</p>
                                @else
                                    <p>{{$comment->comment}}</p>
                                @endif
                            </div>
                            <div class="comment_actions">
                                <div class="rating_note">
                                    <p>{{$comment->rating}} </p>
                                    <svg class="icon"><use xlink:href="{{asset("images/sprite.svg#star")}}"></use></svg>
                                </div>
                                <svg><use xlink:href="{{asset("images/sprite.svg#report")}}"></use></svg>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <div class="info_shop">
        <div class="infos_header">
            <div class="infos_title">
                <svg><use xlink:href="{{asset("images/sprite.svg#reward_bg")}}"></use></svg>
                <h2>Votre Commerce</h2>
            </div>
            <div class="infos_categorie">
                <p class="active_categorie">Général</p>
                <p>Localisation</p>
                <p>Complément</p>
            </div>
        </div>

        <form action="{{-- route('modify_shop') --}}" method="GET">
            <div class="infos_general infos_active">
                <div class="infos_left">
                    <input type="text" placeholder="Nom" name="name" value="{{isset($store) ? $store[0]->name: ""}}">
                    <input type="tel" placeholder="Numéro de Téléphone" name="phonenumber" value="{{isset($store) ? $store[0]->phonenumber: ""}}">
                    <input type="email" placeholder="Mail" name="email" value="{{isset($store) ? $store[0]->email: ""}}">
                    <input type="text" placeholder="Site Web" name="website" value="{{isset($store) ? $store[0]->website: ""}}">
                </div>
                <div class="infos_right">
                    <textarea placeholder="Description" name="description">{{isset($store) ? $store[0]->description: ""}}</textarea>
                </div>
            </div>

            <div class="infos_localisation">
                <div class="infos_left">
                    <input type="text" placeholder="Adresse" name="address1" value="{{isset($store) ? $store[0]->address1: ""}}">
                    <input type="text" placeholder="Complément d'adresse" name="address2" value="{{isset($store) ? $store[0]->address2: ""}}">
                    <input type="text" placeholder="Ville" name="city_id" value="{{isset($store) ? $store[0]->city_id: ""}}">
                </div>
                <div class="infos_right">
                    <input type="number" placeholder="Latitude" name="lat" value="{{isset($store) ? $store[0]->lat: ""}}" disabled>
                    <input type="number" placeholder="Longitude" name="long" value="{{isset($store) ? $store[0]->long: ""}}" disabled>
                </div>
            </div>

            <div class="infos_complementary">
                <div class="infos_left">
                {{--<select name="category_id">
                        @if(isset($store))
                            <option value="{{$store[0]->category_id}}">{{$categories[$store[0]->category_id - 1]->name}}</option>
                        @else
                            <option>--Catégorie--</option>
                        @endif
                        @foreach($categories as $category)
                            @if($category->id != $store[0]->category_id)
                                <option value="{{$category->id}}">{{$category->name}}</option>
                                @endif
                        @endforeach
                    </select>
                    <select name="subcategory_id">
                        @if(isset($store))
                            <option value="{{$store[0]->subcategory_id}}">{{$subCategories[$store[0]->subcategory_id - 1]->name}}</option>
                        @else
                            <option>--Sous-Catégorie--</option>
                        @endif
                            @foreach($subCategories as $subCategory)
                                @if($subCategory->id != $store[0]->subcategory_id)
                                    <option value="{{$subCategory->id}}">{{$subCategory->name}}</option>
                                @endif
                            @endforeach
                    </select>--}}
                    <div class="delivery">
                        <label for="delivery_cat">Livraison : </label>
                        <div class="delivery_cat" id="delivery_cat">
                            <div class="oui">
                                <input type="radio" id="oui" name="delivery" value="oui">
                                <label for="oui">Oui</label>
                            </div>
                            <div class="non">
                                <input type="radio" id="non" name="delivery" value="non">
                                <label for="non">Non</label>
                            </div>
                        </div>
                    </div>
                    <textarea placeholder="Condition livraison" name="delivery_conditions">{{isset($store) ? $store[0]->delivery_conditions: ""}}</textarea>
                    <textarea placeholder="Horraire" name="opening_hours">{{isset($store) ? $store[0]->opening_hours: ""}}</textarea>
                </div>
                <div class="infos_right">
                    {{--<textarea placeholder="Catalogue"></textarea>--}}
                </div>
            </div>
            <div class="infos_buttons">
                <input class="reset" type="reset" value="Annuler">
                <input class="submit" type="submit" value="Sauvegarder">
            </div>

        </form>
    </div>
</div>
<script>
    function resetClassnameInfo(){
        let formDiv = document.getElementsByTagName('form')[0].children;
        formDiv[0].className = "infos_general";
        formDiv[1].className = "infos_localisation";
        formDiv[2].className = "infos_complementary";
    }

    function resetClassnameCategorie(){
        let navShop = document.getElementsByClassName('infos_categorie')[0].getElementsByTagName('p');
        for (let i = 0; i < navShop.length ; i++) {
            navShop[i].className = "";
        }
    }

    let navShop = document.getElementsByClassName('infos_categorie')[0].getElementsByTagName('p');
    for (let i = 0; i < navShop.length; i++) {
        navShop[i].addEventListener("click", function () {
            resetClassnameInfo();
            resetClassnameCategorie();
            navShop[i].className = "active_categorie";
            let formDiv = document.getElementsByTagName('form')[0].children;
            formDiv[i].className += " infos_active";
        });
    }
</script>
@endsection
