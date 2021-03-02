@extends ('layouts.app')


@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
    <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
@endpush


@section ('content')
<div class="container">
    <div class="dashboard">
            <div class="dashboard_bar">
                <select class="shops" onchange="changeStore()">
                    @foreach($stores as $store)
                        <option value="{{$store->id}}">{{$store->name}}</option>
                    @endforeach
                </select>
                <div class="data_time">
                    <p class="active_data">Semaine</p>
                    <p>Mois</p>
                    <p>Année</p>
                </div>
            </div>

            <div class="rewards">
                <div class="categorie_reward reward">
                    <p>n°1</p>
                    <p>Categorie</p>
                    <svg><use xlink:href="images/sprite.svg#reward_bg"></use></svg>
                </div>
                <div class="subcategorie_reward reward">
                    <p>n°1</p>
                    <p>Categorie</p>
                    <svg><use xlink:href="images/sprite.svg#reward_bg"></use></svg>
                </div>
            </div>

            <div class="top_product">
                <h2>Votre top Produit</h2>
                <h3>Nom produit</h3>
                <img>
            </div>
        </div>


        <div class="data_shop">
            <div class="data data_visitors">
                <p>6854694</p>
                <p>visiteurs</p>
            </div>
            <div class="data data_avg">
                <p>564</p>
                <p>Moyenne</p>
            </div>
            <div class="data data_delivery">
                <p>5654</p>
                <p>commandes</p>
            </div>
            <div class="data data_followers">
                <p>5464</p>
                <p>abonnés</p>
            </div>
        </div>

        <div class="container_comments">
            <h3>Commentaires</h3>
            <div class="comments">
                @for($i = 0; $i < 10; $i++)
                    <div class="comment">
                        <div class="comment_text">
                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. In cursus est quis nisi elementum faucibus. Nullam nec sagittis nunc. Donec eu leo in risus rhoncus accumsan vel nec risus. Nunc a lectus nisi. Nullam tincidunt tempor rhoncus. Ut feugiat dolor sit amet lorem sollicitudin, quis malesuada libero finibus. Suspendisse congue consequat elit. Aenean semper, sapien sed accumsan congue, metus ipsum dictum elit, a sodales sapien neque nec ligula. Nulla ut odio molestie erat tempus consectetur. Vivamus sed aliquet urna. Duis nibh risus
                        </div>
                        <div class="comment_actions">
                            <svg><use xlink:href="images/sprite.svg#reward_bg"></use></svg>
                            <svg><use xlink:href="images/sprite.svg#reward_bg"></use></svg>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>

    <div class="info_shop">
        <div class="infos_header">
            <div class="infos_title">
                <svg><use xlink:href="images/sprite.svg#reward_bg"></use></svg>
                <h2>Votre Commerce</h2>
            </div>
            <div class="infos_categorie">
                <p class="active_categorie">Général</p>
                <p>Localisation</p>
                <p>Complément</p>
            </div>
        </div>
        <form>
            <div class="infos_general infos_active">
                <div class="infos_left">
                    <input type="text" placeholder="Nom" name="name" value="{{isset($store_info[0]) ? $store_info[0]->name: ""}}">
                    <input type="tel" placeholder="Numéro de Téléphone" name="phonenumber" value="{{isset($store_info[0]) ? $store_info[0]->phonenumber: ""}}">
                    <input type="email" placeholder="Mail" name="email">
                    <input type="text" placeholder="Site Web" name="website">
                </div>
                <div class="infos_right">
                    <textarea placeholder="Description" name="description"></textarea>
                </div>
            </div>

            <div class="infos_localisation">
                <div class="infos_left">
                    <input type="text" placeholder="Adresse" name="adresse1">
                    <input type="text" placeholder="Complément d'adresse" name="adresse2">
                    <input type="text" placeholder="Ville" name="city_id">
                </div>
                <div class="infos_right">
                    <input type="number" placeholder="Latitude" name="lat" disabled>
                    <input type="number" placeholder="Longitude" name="long" disabled>
                </div>
            </div>

            <div class="infos_complementary">
                <div class="infos_left">
                    <select name="category_id">
                        <option>--Catégorie--</option>
                    </select>
                    <select name="subcategory_id">
                        <option>--Sous-Catégorie--</option>
                    </select>
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
                    <textarea placeholder="Condition livraison" name="delivery_conditions"></textarea>
                    <textarea placeholder="Horraire" name="opening_hours"></textarea>
                </div>
                <div class="infos_right">
                    <textarea placeholder="Catalogue"></textarea>
                </div>
            </div>
            <div class="infos_buttons">
                <input class="submit" type="submit" value="Sauvegarder">
                <input class="reset" type="reset" value="Annuler">
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
    console.log(navShop);
    console.log(navShop[0]);
    console.log(navShop[0].className);
    for (let i = 0; i < navShop.length; i++) {
        navShop[i].addEventListener("click", function(){
            resetClassnameInfo();
            resetClassnameCategorie();
            navShop[i].className = "active_categorie";
            let formDiv = document.getElementsByTagName('form')[0].children;
            formDiv[i].className += " infos_active";
        });
    }




    //selectStore.addEventListener("onchange");

    function changeStore(){
        let selectStore = document.getElementsByClassName('shops')[0];
        console.log(selectStore);
        console.log(selectStore.value);
        let url = "{{ route('dashboard', ':id_store') }}";
        url = url.replace(':id_store', selectStore.value);
        document.location.href=url;
    }

</script>
@endsection

