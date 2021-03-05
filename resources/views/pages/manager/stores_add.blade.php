@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/stores_add.css') }}" rel="stylesheet">
@endpush

@section('content')
@include('layouts.container_corp')

<div class="add-store">
    <h1>Ajouter un magasin</h1>
    <form>
        <div class="input-row">
            <label for="name"> Nom du commerce <span class="orange_requiered">*</span></label>
            <input type="text" id="name" class="input-store" placeholder="Nom du commerce" name="name" onkeyup="verifyName(this.value)" autofocus required>
            @error('name')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
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
            <input type="email" id="email" class="input-store" placeholder="Adresse Email" name="email" required>
            @error('email')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="phonenumber">Téléphone <span class="orange_requiered">*</span></label>
            <input type="phone" id="phonenumber" class="input-store" placeholder="Numéro de Téléphone" name="phonenumber" required>
            @error('phonenumber')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

<!-- A FAIRE EN FONCTION DE LA BDD -->
        <div class="input-row">
            <label for="ville">Ville <span class="orange_requiered">*</span></label>
            <input type="text" id="ville" class="input-store" placeholder="Ville" name="ville" required>
            @error('ville')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

<!-- A FAIRE EN FONCTION DE LA BDD -->

        <div class="input-row">
            <label for="adresse1">Adresse <span class="orange_requiered">*</span></label>
            <input type="text" id="adresse1" class="input-store" placeholder="Adresse" name="adresse1" required>
            @error('adresse1')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="adresse2">Complement d'adresse <span class="orange_requiered">*</span></label>
            <input type="text" id="adresse2" class="input-store" placeholder="Complement d'adresse" name="adresse2" >
            @error('adresse2')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="description">Description <span class="orange_requiered">*</span></label>
            <textarea class="form-control" id="description-desc" name="description"></textarea>
            @error('description')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="input-row">
            <label for="opening_hours">Horaires <span class="orange_requiered">*</span></label>
            <textarea class="input-store" id="opening_hours" name="opening_hours" placeholder="Horaires d'ouverture"></textarea>
            @error('opening_hours')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        
        <div class="input-row">
            <label for="siret">Numéro de Siret <span class="orange_requiered">*</span></label>
            <input type="text" id="siret" class="input-store" placeholder="Numero de Siret" name="siret" required>
            @error('siret')
                <span class="input_error">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>

        <div class="input-row">
            <label for="website">Site Web</label>
            <input type="text" id="website" class="input-store" placeholder="adresse" name="website" required>
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
                <label for="delivery" class="livraison_label" onclick="this.checked ? this.style.backgroundColor = 'blue' : this.style.backgroundColor = 'white'">
                    <span class="livraison_titre">Oui</span>
                </label>
            </div>
            <div class="livraison_button">
                <input type="radio" name="delivery" class="livraison_radio" id="deliveryNon" value="0"/>
                <label for="delivery" class="livraison_label" onclick="">
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
    let city = document.getElementById('cityId');
    let address1 = document.getElementById('address1');
    let address2 = document.getElementById('address2');
    let phonenumber = document.getElementById('phonenumber');
    let email = document.getElementById('email');
    let siret = document.getElementById('siret');
    let description = document.getElementById('description');
    let delivery = document.getElementById('delivery');
    let delivery_conditions = document.getElementById('delivery_conditions');
    let website = document.getElementById('website');
    let opening_hours = document.getElementById('opening_hours');
    let category_id = document.getElementById('category_id');
    let subcategory_id = document.getElementById('subcategory_id');

    function verifyName(content)
    {
        return 
    }

    function verifyCat(content)
    {
        return 
    }

    function verifySubCat(content)
    {
        return 
    }

    function verifyEmail(content)
    {
        return 
    }

    function verifyPhone(content)
    {
        return 
    }

    function verifyVille(content)
    {
        return 
    }

    function verifyAdresse1(content)
    {
        return 
    }

    function verifyAdresse2(content)
    {
        return 
    }

    function verifyDesc(content)
    {
        return 
    }

    function verifyHoraires(content)
    {
        return 
    }

    
    function verifySiret(content)
    {
        return 
    }
    
    function verifyWeb(content)
    {
        return 
    }

    function verifyLivraison(content)
    {
        return 
    }
    
    function verifyConditions(content)
    {
        return 
    }






</script>
@endsection
