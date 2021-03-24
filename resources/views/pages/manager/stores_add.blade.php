@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/stores_add.css') }}" rel="stylesheet">
@endpush

@section('content')
@include('layouts.container_corp')

<div class="add-store">
    <h1>Ajouter un magasin</h1>
    <form method="post" action="{{route('store_post')}}" enctype="multipart/form-data">

    @csrf
        <div class="input-row">
            <label for="name"> Nom du commerce <span class="orange_requiered">*</span></label>
            <input type="text" value="{{ old('name') }}" id="name" class="input-store" placeholder="Nom du commerce" name="name" onfocusout="verifyName(this.value)" autofocus required>
            @error('name')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="category_id">Catégorie <span class="orange_requiered">*</span></label>
            <select name="category_id" value="{{ old('category_id') }}" id="category_id" class="cat" onChange="toggleCat(this.value)">
                <option disabled selected>Catégorie du commerce</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
            @error('category_id')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="subcategory_id">Sous-catégorie</label>
            <select name="subcategory_id" value="{{ old('subcategory_id') }}" id="subcategory_id" class="cat">
                <option disabled selected>Sous-Catégorie du commerce</option>
            </select>
            @error('subcategory_id')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="description">Description <span class="orange_requiered">*</span></label>
            <textarea class="input-store" id="description" name="description" value="{{ old('description') }}" onfocusout="verifyDesc(this.value)"  placeholder="Description du commerce"></textarea>
            @error('description')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="email">Adresse Email <span class="orange_requiered">*</span></label>
            <input type="email" id="email" value="{{ old('email') }}" class="input-store" placeholder="Adresse Email" name="email" onfocusout="verifyEmail(this.value)" required>
            @error('email')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="phonenumber">Téléphone <span class="orange_requiered">*</span></label>
            <input type="phone" id="phonenumber" value="{{ old('phonenumber') }}" maxlength="10" class="input-store" placeholder="Numéro de Téléphone" name="phonenumber" onfocusout="verifyPhone(this.value)" required>
            @error('phonenumber')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="ville">Ville <span class="orange_requiered">*</span></label>
            <input type="text" id="city_Id" value="{{ old('ville') }}" class="input-store" placeholder="Ville" name="ville"  onfocusout="verifyVille(this.value)" required>
            @error('ville')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="input-row">
            <label for="zip">Code Postal <span class="orange_requiered">*</span></label>
            <input type="text" id="zip" maxlength="5" value="{{ old('zip') }}" class="input-store" placeholder="Code Postal" name="zip"  onfocusout="verifyZip(this.value)" required>
            @error('zip')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="input-row">
            <label for="address1">Adresse <span class="orange_requiered">*</span></label>
            <input type="text" id="address1" value="{{ old('address1') }}" class="input-store" placeholder="Adresse" name="address1"  onfocusout="verifyAdresse1(this.value)" required>
            @error('address1')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="address2">Complement d'adresse</label>
            <input type="text" id="address2" class="input-store" value="{{ old('address2') }}" placeholder="Complement d'adresse" name="address2" >
            @error('address2')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="catalog">Catalogue de Produits</label>
            <textarea class="form-control" id="catalog" value="{{ old('catalog') }}" name="catalog"></textarea>
            @error('catalog')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-file">
            <label for="photo">Photo du magasin <span class="orange_requiered">*</span></label>
            <input type="file" id="photo" name="photo" value="{{ old('photo') }}" accept="image/png, image/jpeg" required>
            @error('photo')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="input-row">
            <label for="opening_hours">Horaires</label>
            <textarea class="input-store" id="opening_hours" name="opening_hours"  value="{{ old('opening_hours') }}" placeholder="Horaires d'ouverture"></textarea>
            @error('opening_hours')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="input-row">
            <label for="siret">Numéro de Siret <span class="orange_requiered">*</span></label>
            <input type="text" id="siret" class="input-store" maxlength="14" placeholder="Numero de Siret" name="siret" value="{{ old('siret') }}" onfocusout="verifySiret(this.value)"  required>
            @error('siret')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="website">Site Web</label>
            <input type="text" id="website" class="input-store" placeholder="Url du site web" name="website" value="{{ old('website') }}" onfocusout="verifyWeb(this.value)">
            @error('website')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="input-row">
            <p>Livraison <span class="orange_requiered">*</span></p>

            <div class="livraison_button">
                <input type="radio" name="delivery" class="livraison_radio" id="deliveryOui" value="1"/>
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

            @error('delivery')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="delivery_conditions">Conditions de livraison</label>
            <input type="text" value="{{ old('delivery_conditions') }}" id="delivery_conditions" class="input-store" placeholder="Conditions de livraison" name="delivery_conditions">
        </div>

        <input type="submit" id="submit" class="bouton_form brouge bsubmit" title="Veuillez completer tous les champs" disabled value="Ajouter le commerce">

        <input type="hidden" id="lat" name="lat" />
        <input type="hidden" id="long" name="long" />

    </form>
</div>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'catalog' );



    let subcategories = {!! $subcategories !!}
    console.log(subcategories)

    let lesSousCat = document.getElementById('subcategory_id')

    function toggleCat(catid)
    {
        let afficheSousCat = "<option disabled selected>Sous-Catégorie du commerce</option>";
        subcategories.forEach(subCat => {
            if(catid==subCat.category_id)
            {

                afficheSousCat += "<option value="+subCat.id+">"+subCat.name+"</option>"
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
    let zip = document.getElementById('zip');


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
    let zipValid = false

    //lancer chaque fonction avec valeur par defaut

    function verifyName(content)
    {
        if(content.replace(/\s+/, '').length >= 2)
        {
            nameValid = true
            name.style.borderColor = "#475BF5"
            name.style.color = "#475BF5"
        }
        else{
            nameValid = false
            name.style.borderColor = "red"
            name.style.color = "red"
            name.setAttribute('title','Le nom du commerce doit comporter au minimum 2 caracteres.')
            
        }
        console.log(nameValid)
        validateForm()
    }

    function verifyDesc(content)
    {
        if(content.replace(/\s+/, '').length >= 5)
        {
            descriptionValid = true
            description.style.borderColor = "#475BF5"
            description.style.color = "#475BF5"
        }
        else{
            descriptionValid = false
            description.style.borderColor = "red"
            description.style.color = "red"
            description.setAttribute('title','La description du commerce doit comporter au minimum 5 caracteres.')
        }
            console.log(descriptionValid)
        validateForm()
    }

    function verifyEmail(content)
    {
        var patt = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/g;
        if(patt.test(content))
        {
            emailValid = true
            email.style.borderColor = "#475BF5"
            email.style.color = "#475BF5"
            console.log(content)
        }
        else{
            emailValid = false
            email.style.borderColor = "red"
            email.style.color = "red"
            email.setAttribute('title','Veuillez de saisir une adresse email valide.')
            console.log()
        }
        console.log(emailValid)
        validateForm()
        
    }

    function verifyPhone(content)
    {
        var patt = /^[0-9]{10}$/g;
        if(patt.test(content))
        {
            phonenumberValid = true
            phonenumber.style.borderColor = "#475BF5"
            phonenumber.style.color = "#475BF5"
            console.log(content)
        }
        else{
            phonenumberValid = false
            phonenumber.style.borderColor = "red"
            phonenumber.style.color = "red"
            phonenumber.setAttribute('title','Veuillez de saisir un numéro de téléphone valide. Format: 0102030405')
            console.log()
        }
        console.log(phonenumberValid)
        validateForm()
    }

    function verifyVille(content)
    {
        if(content.replace(/\s+/, '').length != 0)
        {
            cityValid = true
            city.style.borderColor = "#475BF5"
            city.style.color = "#475BF5"
        }
        else{
            cityValid = false
            city.style.borderColor = "red"
            city.style.color = "red"
        }
        console.log(cityValid)
        getCoords()
    }

    function verifyAdresse1(content)
    {
        if(content.replace(/\s+/, '').length !=0)
        {
            address1Valid = true
            address1.style.borderColor = "#475BF5"
            address1.style.color = "#475BF5"
        }
        else{
            address1Valid = false
            address1.style.borderColor = "red"
            address1.style.color = "red"
        }
        console.log(address1Valid)
        getCoords();
    }


    
    function verifySiret(content)
    {
        var patt = /^[0-9]{14}$/g;
        if(patt.test(content))
        {
            siretValid = true
            siret.style.borderColor = "#475BF5"
            siret.style.color = "#475BF5"
        }
        else{
            siretValid = false
            siret.style.borderColor = "red"
            siret.style.color = "red"
            siret.setAttribute('title','Veuillez de saisir un numéro de Siret valide.')
        } 
        console.log(siretValid)
        validateForm()
    }
    
    function verifyWeb(content)
    {
        var patt = /^(https?:\/\/)?(www\.)[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)|(https?:\/\/)?(www\.)?(?!ww)[-a-zA-Z0-9@:%._\+~#=]{2,256}\.[a-z]{2,4}\b([-a-zA-Z0-9@:%_\+.~#?&//=]*)$/g
        if(patt.test(content) || content.replace(/\s+/, '').length == 0)
        {
            websiteValid = true
            website.style.borderColor = "#475BF5"
            website.style.color = "#475BF5"
        }
        else{
            websiteValid = false
            website.style.borderColor = "red"
            website.style.color = "red"
            phonenumber.setAttribute('title','Veuillez de saisir une Url valide.')
        }
        console.log(websiteValid)
        validateForm()
    }
    
    function verifyZip(content)
    {
        if(content.replace(/\s+/, '').length <= 5 && content.replace(/\s+/, '').length > 0)
        {
            zipValid = true
            zip.style.borderColor = "#475BF5"
            zip.style.color = "#475BF5"
        }
        else{
            zipValid = false
            zip.style.borderColor = "red"
            zip.style.color = "red"
            zip.setAttribute('title','Veuillez saisir un code postal valide.')
            
        }
        console.log(zipValid)
        validateForm()
    }


    async function getCoords()
    {
        let url = "https://api-adresse.data.gouv.fr/search/?q="+address1.value+"+"+city.value;
        console.log(encodeURI(url))
        const res = await fetch(url);
        const adresse = await res.json();
        console.log(adresse.features[0].geometry.coordinates);
        let long = adresse.features[0].geometry.coordinates[0];
        let lat = adresse.features[0].geometry.coordinates[1];
        document.getElementById('lat').value = lat;
        document.getElementById('long').value = long;

        console.log("la long: "+long+" la lat "+lat)     
        validateForm()   
    }

    let valider = document.getElementById("submit")
            valider.style.backgroundColor = "#feb3b1";




    function verifyAll()
    {
        if(name.value != "" && email.value != "" && phonenumber.value != "")
        {
            verifyName(name.value)
            verifyEmail(email.value)
            verifyPhone(phonenumber.value)
            verifyVille(city.value)
            verifyAdresse1(address1.value)
            verifySiret(siret.value)
        }
    }
    verifyAll()

    function validateForm()
    {
        
        //rajouter code postal et desc et cat
        if(nameValid && emailValid && phonenumberValid && cityValid && address1Valid && siretValid)
        {
            valider.style.backgroundColor = "#ff847c";
            valider.removeAttribute("disabled")
            console.log("C4EST BOOOON")
        }
        else{
            valider.style.backgroundColor = "#feb3b1";
            valider.setAttribute("disabled",true)
        }
    }

</script>
@endsection
