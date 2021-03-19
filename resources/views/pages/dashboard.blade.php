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
                    <svg>
                        <use xlink:href="{{asset("images/sprite.svg#reward_bg")}}"></use>
                    </svg>
                </div>
                <div class="subcategorie_reward reward">
                    <p>n°{{$rank_sc}}</p>
                    <p>{{ucfirst($store[0]->subcategory->name)}}</p>
                    <svg>
                        <use xlink:href="{{asset("images/sprite.svg#reward_bg")}}"></use>
                    </svg>
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
                                    {{--<svg><use xlink:href="{{asset("images/sprite.svg#quote")}}">
                                        </use></svg>--}}<p>{{$comment->comment}}</p>
                                    {{--<svg><use xlink:href="{{asset("images/sprite.svg#quote")}}">
                                        </use></svg>--}}
                                @endif
                            </div>
                            <div class="comment_actions">
                                <div class="rating_note">
                                    <p>{{$comment->rating}} </p>
                                    <svg class="icon">
                                        <use xlink:href="{{asset("images/sprite.svg#star")}}"></use>
                                    </svg>
                                </div>
                                <svg>
                                    <use xlink:href="{{asset("images/sprite.svg#report")}}"></use>
                                </svg>
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
                <svg>
                    <use xlink:href="{{asset("images/sprite.svg#reward_bg")}}"></use>
                </svg>
                <h2>Votre Commerce</h2>
            </div>
            <div class="infos_categorie">
                <p class="active_categorie">Général</p>
                <p>Localisation</p>
                <p>Complément</p>
            </div>
        </div>

        <form method="post" action="{{route('store_update', ['id' => $store[0]->id])}}" enctype="multipart/form-data">
            @csrf
            <div class="infos_general infos_active">
                <div class="infos_left">
                    <div class="input-row">
                        <label for="name"> Nom du commerce <span class="orange_requiered">*</span></label>
                        <input type="text" id="name" class="input-store" placeholder="Nom du commerce" name="name"
                               onfocusout="verifyName(this.value)" value="{{isset($store) ? $store[0]->name: ""}}"
                               required>
                        @error('name')
                        <span class="input_error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-row">
                        <label for="phonenumber">Téléphone <span class="orange_requiered">*</span></label>
                        <input type="phone" id="phonenumber" class="input-store" placeholder="Numéro de Téléphone"
                               name="phonenumber" onfocusout="verifyPhone(this.value)"
                               value="{{isset($store) ? $store[0]->phonenumber: ""}}" required>
                        @error('phonenumber')
                        <span class="input_error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-row">
                        <label for="email">Adresse Email <span class="orange_requiered">*</span></label>
                        <input type="email" id="email" class="input-store" placeholder="Adresse Email" name="email"
                               onfocusout="verifyEmail(this.value)" value="{{isset($store) ? $store[0]->email: ""}}"
                               required>
                        @error('email')
                        <span class="input_error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="input-row">
                        <label for="website">Site Web</label>
                        <input type="text" id="website" class="input-store" placeholder="Url du site web" name="website"
                               onfocusout="verifyWeb(this.value)" value="{{isset($store) ? $store[0]->website: ""}}"
                               required>
                        @error('website')
                        <span class="input_error">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                </div>
                <div class="infos_left">
                    <div class="input-row">
                        <label for="description">Description <span class="orange_requiered">*</span></label>
                        <textarea class="input-store" id="description" name="description"
                                  onfocusout="verifyDesc(this.value)"
                                  placeholder="Description du commerce">{{isset($store) ? $store[0]->description: ""}}</textarea>
                        @error('description')
                        <span class="input_error">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                </div>
            </div>

            <div class="infos_localisation">
                <div class="infos_left">
                    <div class="input-row">
                        <label for="ville">Ville <span class="orange_requiered">*</span></label>
                        <input type="text" id="city_Id" class="input-store" placeholder="Ville" name="ville"
                               onfocusout="verifyVille(this.value)" value="{{isset($store) ? $store[0]->city: ""}}"
                               required>
                        @error('ville')
                        <span class="input_error">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-row">
                        <label for="address1">Adresse <span class="orange_requiered">*</span></label>
                        <input type="text" id="address1" class="input-store" placeholder="Adresse" name="address1"
                               onfocusout="verifyAdresse1(this.value)"
                               value="{{isset($store) ? $store[0]->address1: ""}}"
                               required>
                        @error('address1')
                        <span class="input_error">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="input-row">
                        <label for="address2">Complement d'adresse</label>
                        <input type="text" id="address2" class="input-store" placeholder="Complement d'adresse"
                               onfocusout="verifyAdresse2(this.value)"
                               value="{{isset($store) ? $store[0]->address2: ""}}"
                               name="address2">
                        @error('address2')
                        <span class="input_error">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="infos_right">
                    <div class="input-row">
                        <p>Livraison <span class="orange_requiered">*</span></p>
                        @if(isset($store) && $store[0]->delivery)
                            <div class="livraison_button">
                                <input type="radio" name="delivery" class="livraison_radio" id="deliveryOui" value="1"
                                       onclick="ischecked(this)"/>
                                <label for="deliveryOui" class="livraison_label">
                                    <span class="livraison_titre">Oui</span>
                                </label>
                            </div>
                            <div class="livraison_button">
                                <input type="radio" name="delivery" class="livraison_radio" id="deliveryNon" value="0"
                                       checked/>
                                <label for="deliveryNon" class="livraison_label">
                                    <span class="livraison_titre">Non</span>
                                </label>
                            </div>
                        @elseif(isset($store) && !$store[0]->delivery)
                            <div class="livraison_button">
                                <input type="radio" name="delivery" class="livraison_radio" id="deliveryOui" value="1"
                                       onclick="ischecked(this)" checked/>
                                <label for="deliveryOui" class="livraison_label">
                                    <span class="livraison_titre">Oui</span>
                                </label>
                            </div>
                            <div class="livraison_button">
                                <input type="radio" name="delivery" class="livraison_radio" id="deliveryNon" value="0"/>
                                <label for="deliveryNon" class="livraison_label">
                                    <span class="livraison_titre">Non</span>
                                </label>
                            </div>
                        @else
                            <div class="livraison_button">
                                <input type="radio" name="delivery" class="livraison_radio" id="deliveryOui" value="1"
                                       onclick="ischecked(this)"/>
                                <label for="deliveryOui" class="livraison_label">
                                    <span class="livraison_titre">Oui</span>
                                </label>
                            </div>
                            <div class="livraison_button">
                                <input type="radio" name="delivery" class="livraison_radio" id="deliveryNon" value="0"/>
                                <label for="deliveryNon" class="livraison_label">
                                    <span class="livraison_titre">Non</span>
                                </label>
                            </div>
                        @endif
                        @error('delivery')
                        <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                    <div class="input-row">
                        <label for="delivery_conditions">Conditions de livraison</label>
                        <input type="text" id="delivery_conditions" class="input-store"
                               placeholder="Conditions de livraison"
                               name="delivery_conditions"
                               value="{{isset($store) ? $store[0]->delivery_conditions: ""}}">
                    </div>
                    <input type="hidden" id="lat" name="lat"/>
                    <input type="hidden" id="long" name="long"/>
                </div>
            </div>

            <div class="infos_complementary">
                <div class="infos_left">
                    <div class="input-row">
                        <label for="category_id">Catégorie <span class="orange_requiered">*</span></label>
                        <select name="category_id" id="category_id" class="cat" onChange="toggleCat(this.value)">
                            @if(isset($store))
                                <option value="{{$store[0]->category_id}}">{{$store[0]->category->name}}</option>
                            @else
                            <option disabled selected>Catégorie du commerce</option>
                            @endif
                            @foreach($categories as $category)
                                    @if($category->id != $store[0]->category_id)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endif
                            @endforeach
                        </select>
                        @error('category_id')
                        <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                    <div class="input-row">
                        <label for="subcategory_id">Sous-catégorie <span class="orange_requiered">*</span></label>
                        <select name="subcategory_id" id="subcategory_id" class="cat">
                            @if(isset($store))
                                <option value="{{$store[0]->subcategory_id}}">{{$store[0]->subcategory->name}}</option>
                            @else
                            <option disabled selected>Sous-Catégorie du commerce</option>
                            @endif
                        </select>
                        @error('subcategory_id')
                        <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                    <div class="input-row">
                        <label for="opening_hours">Horaires <span class="orange_requiered">*</span></label>
                        <textarea class="input-store" id="opening_hours" name="opening_hours"
                                  onfocusout="verifyHoraires(this.value)"
                                  placeholder="Horaires d'ouverture">{{isset($store) ? $store[0]->opening_hours: ""}}</textarea>
                        @error('opening_hours')
                        <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                    <div class="input-row">
                        <label for="siret">Numéro de Siret <span class="orange_requiered">*</span></label>
                        <input type="text" id="siret" class="input-store" placeholder="Numero de Siret" name="siret"
                               onfocusout="verifySiret(this.value)" value="{{isset($store) ? $store[0]->siret: ""}}"
                               required>
                        @error('siret')
                        <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>
                <div class="infos_right">
                    <div class="input-row">
                        <label for="catalog">Catalogue de Produits</label>
                        <textarea class="form-control" id="catalog"
                                  name="catalog">{{isset($store) ? $store[0]->catalog: ""}}</textarea>
                        @error('catalog')
                        <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
                        @enderror
                    </div>
                </div>
            </div>

            <div class="infos_buttons">
                <input type="reset" class="reset" value="Annuler">
                <input type="submit" class="submit" value="Modifier">
            </div>
        </form>

    </div>
    </div>
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        function resetClassnameInfo() {
            let formDiv = document.getElementsByTagName('form')[0].children;
            formDiv[0].className = "infos_general";
            formDiv[1].className = "infos_localisation";
            formDiv[2].className = "infos_complementary";
        }

        function resetClassnameCategorie() {
            let navShop = document.getElementsByClassName('infos_categorie')[0].getElementsByTagName('p');
            for (let i = 0; i < navShop.length; i++) {
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

        CKEDITOR.replace('catalog');


        let subcategories = {!! $subcategories !!}
        console.log(subcategories)

        let lesSousCat = document.getElementById('subcategory_id')

        function toggleCat(catid) {
            let afficheSousCat = "<option disabled selected>Sous-Catégorie du commerce</option>";
            subcategories.forEach(subCat => {
                if (catid == subCat.category_id) {

                    afficheSousCat += "<option value=" + subCat.id + ">" + subCat.name + "</option>"
                }
            });
            lesSousCat.innerHTML = afficheSousCat;
        }

        let name = document.getElementById('name');
        let city = document.getElementById('city_Id');
        let description = document.getElementById('description')
        let address1 = document.getElementById('address1');
        let address2 = document.getElementById('address2');
        let phonenumber = document.getElementById('phonenumber');
        let email = document.getElementById('email');
        let siret = document.getElementById('siret');
        let delivery = document.getElementById('delivery');
        let delivery_conditions = document.getElementById('delivery_conditions');
        let website = document.getElementById('website');
        let opening_hours = document.getElementById('opening_hours');
        let category_id = document.getElementById('category_id');
        let subcategory_id = document.getElementById('subcategory_id');


        let nameValid = false
        let cityValid = false
        let address1Valid = false
        let address2Valid = false
        let phonenumberValid = false
        let emailValid = false
        let siretValid = false
        let descriptionValid = false
        let deliveryValid = false
        let delivery_conditionsValid = false
        let websiteValid = false
        let opening_hoursValid = false
        let category_idValid = false
        let subcategory_idValid = false

        //lancer chaque fonction avec valeur par defaut

        function verifyName(content) {
            if (content.replace(/\s+/, '').length >= 2) {
                nameValid = true
                name.style.borderColor = "#475BF5"
                name.style.color = "#475BF5"
            } else {
                nameValid = false
                name.style.borderColor = "red"
                name.style.color = "red"
                name.setAttribute('title', 'Le nom du commerce doit comporter au minimum 2 caracteres.')

            }
            console.log(nameValid)
            validateForm()
        }

        function verifyDesc(content) {
            if (content.replace(/\s+/, '').length >= 5) {
                descriptionValid = true
                description.style.borderColor = "#475BF5"
                description.style.color = "#475BF5"
            } else {
                descriptionValid = false
                description.style.borderColor = "red"
                description.style.color = "red"
                description.setAttribute('title', 'La description du commerce doit comporter au minimum 5 caracteres.')

            }
            validateForm()
        }

        function verifyEmail(content) {
            var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/g;
            if (patt.test(content)) {
                emailValid = true
                email.style.borderColor = "#475BF5"
                email.style.color = "#475BF5"
                console.log(content)
            } else {
                emailValid = false
                email.style.borderColor = "red"
                email.style.color = "red"
                email.setAttribute('title', 'Veuillez de saisir une adresse email valide.')
                console.log()
            }
            console.log(content)

        }

        function verifyPhone(content) {
            var patt = /^[0-9]{10}$/g;
            if (patt.test(content)) {
                phonenumberValid = true
                phonenumber.style.borderColor = "#475BF5"
                phonenumber.style.color = "#475BF5"
                console.log(content)
            } else {
                phonenumberValid = false
                phonenumber.style.borderColor = "red"
                phonenumber.style.color = "red"
                phonenumber.setAttribute('title', 'Veuillez de saisir un numéro de téléphone valide.')
                console.log()
            }
            console.log(content)
        }

        function verifyVille(content) {
            if (content.replace(/\s+/, '').length != 0) {
                cityValid = true
                city.style.borderColor = "#475BF5"
                city.style.color = "#475BF5"
            } else {
                cityValid = false
                city.style.borderColor = "red"
                city.style.color = "red"
            }
            console.log(content)
            getCoords()
        }

        function verifyAdresse1(content) {
            if (content.replace(/\s+/, '').length != 0) {
                address1Valid = true
                address1.style.borderColor = "#475BF5"
                address1.style.color = "#475BF5"
            } else {
                address1Valid = false
                address1.style.borderColor = "red"
                address1.style.color = "red"
            }
            console.log(content)
            getCoords();
        }

        function verifyHoraires(content) {
            if (content.replace(/\s+/, '').length != 0) {
                descriptionValid = true
                description.style.borderColor = "#475BF5"
                description.style.color = "#475BF5"
            } else {
                descriptionValid = false
                description.style.borderColor = "red"
                description.style.color = "red"
            }
        }


        function verifySiret(content) {
            var patt = /^[0-9]{14}$/g;
            if (patt.test(content)) {
                siretValid = true
                siret.style.borderColor = "#475BF5"
                siret.style.color = "#475BF5"
            } else {
                siretValid = false
                siret.style.borderColor = "red"
                siret.style.color = "red"
                siret.setAttribute('title', 'Veuillez de saisir un numéro de Siret valide.')
            }
        }

        function verifyWeb(content) {
            var patt = /^(https?:\/\/)?(www\.)[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)|(https?:\/\/)?(www\.)?(?!ww)[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)$/g
            if (patt.test(content) || content.replace(/\s+/, '').length == 0) {
                websiteValid = true
                website.style.borderColor = "#475BF5"
                website.style.color = "#475BF5"
            } else {
                websiteValid = false
                website.style.borderColor = "red"
                website.style.color = "red"
                phonenumber.setAttribute('title', 'Veuillez de saisir une Url valide.')
            }
        }

        function verifyHoraires(content) {
            if (content.replace(/\s+/, '').length != 0) {
                opening_hoursValid = true
                opening_hours.style.borderColor = "#475BF5"
                opening_hours.style.color = "#475BF5"
            } else {
                opening_hoursValid = false
                opening_hours.style.borderColor = "red"
                opening_hours.style.color = "red"
            }
        }


        async function getCoords() {
            let url = "https://api-adresse.data.gouv.fr/search/?q=" + address1.value + "+" + city.value;
            console.log(encodeURI(url))
            const res = await fetch(url);
            const adresse = await res.json();
            console.log(adresse.features[0].geometry.coordinates);
            let long = adresse.features[0].geometry.coordinates[0];
            let lat = adresse.features[0].geometry.coordinates[1];
            document.getElementById('lat').value = lat;
            document.getElementById('long').value = long;

            console.log("la long: " + long + " la lat " + lat)
        }

        function validateForm() {
            // getCoords();
            if (nameValid && emailValid && phonenumberValid && cityValid && address1Valid && opening_hoursValid && siretValid && websiteValid) {

            }
        }
    </script>
@endsection
