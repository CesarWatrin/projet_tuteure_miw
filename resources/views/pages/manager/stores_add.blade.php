@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/stores_add.css') }}" rel="stylesheet">
@endpush

@section('content')
@include('layouts.container_corp')

<div class="add-store">
    <h1>Ajouter un magasin</h1>
    <form method="post" action="{{route('store_post')}}">

    @csrf
        <div class="input-row">
            <label for="name"> Nom du commerce <span class="orange_requiered">*</span></label>
            <input type="text" id="name" class="input-store" placeholder="Nom du commerce" name="name" onfocusout="verifyName(this.value)" autofocus required>
            @error('name')
                <span class="input_error">
                    <strong>{{ $message }}</strong>7
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="category_id">Catégorie <span class="orange_requiered">*</span></label>
            <select name="category_id" id="category_id" class="cat" onChange="toggleCat(this.value)">
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
            <label for="subcategory_id">Sous-catégorie <span class="orange_requiered">*</span></label>
            <select name="subcategory_id" id="subcategory_id" class="cat">
                <option disabled selected>Sous-Catégorie du commerce</option>
            </select>
            @error('subcategory_id')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="email">Adresse Email <span class="orange_requiered">*</span></label>
            <input type="email" id="email" class="input-store" placeholder="Adresse Email" name="email" onfocusout="verifyEmail(this.value)" required>
            @error('email')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="phonenumber">Téléphone <span class="orange_requiered">*</span></label>
            <input type="phone" id="phonenumber" class="input-store" placeholder="Numéro de Téléphone" name="phonenumber" onfocusout="verifyPhone(this.value)" required>
            @error('phonenumber')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="ville">Ville <span class="orange_requiered">*</span></label>
            <input type="text" id="city_Id" class="input-store" placeholder="Ville" name="ville"  onfocusout="verifyVille(this.value)" required>
            @error('ville')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>


        <div class="input-row">
            <label for="address1">Adresse <span class="orange_requiered">*</span></label>
            <input type="text" id="address1" class="input-store" placeholder="Adresse" name="address1"  onfocusout="verifyAdresse1(this.value)" required>
            @error('address1')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="address2">Complement d'adresse</label>
            <input type="text" id="address2" class="input-store" placeholder="Complement d'adresse"  onfocusout="verifyAdresse2(this.value)" name="address2" >
            @error('address2')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="description">Catalogue de Produits <span class="orange_requiered">*</span></label>
            <textarea class="form-control" id="description"  onfocusout="verifyDesc()"  name="description"></textarea>
            @error('description')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-file">
            <label for="description">Photo du magasin <span class="orange_requiered">*</span></label>
            <input type="file" id="photo" name="photo"  required>
            @error('photo')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        
        <div class="input-row">
            <label for="opening_hours">Horaires <span class="orange_requiered">*</span></label>
            <textarea class="input-store" id="opening_hours" name="opening_hours"  onfocusout="verifyHoraires(this.value)"  placeholder="Horaires d'ouverture"></textarea>
            @error('opening_hours')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="input-row">
            <label for="siret">Numéro de Siret <span class="orange_requiered">*</span></label>
            <input type="text" id="siret" class="input-store" placeholder="Numero de Siret" name="siret"  onfocusout="verifySiret(this.value)"  required>
            @error('siret')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="website">Site Web</label>
            <input type="text" id="website" class="input-store" placeholder="Url du site web" name="website"  onfocusout="verifyWeb(this.value)" required>
            @error('website')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="input-row">
            <p>Livraison <span class="orange_requiered">*</span></p>

            <div class="livraison_button">
                <input type="radio" name="delivery" class="livraison_radio" id="deliveryOui" value="1" onclick="ischecked(this)"/>
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
            <input type="text" id="delivery_conditions" class="input-store" placeholder="Conditions de livraison" name="delivery_conditions">
        </div>

        <input type="submit" class="bouton_form brouge bsubmit" value="Ajouter le commerce">

    </form>
</div>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'description' );



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
        console.log(content)
        
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
            phonenumber.setAttribute('title','Veuillez de saisir un numéro de téléphone valide.')
            console.log()
        }
        console.log(content)
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
        console.log(content)
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
        console.log(content) 
    }

    function verifyHoraires(content)
    {
        if(content.replace(/\s+/, '').length !=0)
        {
            opening_hoursValid = true
            opening_hours.style.borderColor = "#475BF5"
            opening_hours.style.color = "#475BF5"
        }
        else{
            opening_hoursValid = false
            opening_hours.style.borderColor = "red"
            opening_hours.style.color = "red"
        }
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
    }


    function validateForm()
    {
        if(nameValid && emailValid && phonenumberValid && cityValid && address1Valid && opening_hoursValid && siretValid && websiteValid)
        {
            
        }
    }

</script>
@endsection
