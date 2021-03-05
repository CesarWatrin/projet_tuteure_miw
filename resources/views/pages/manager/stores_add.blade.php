@extends('layouts.app')

@push('styles')
<link href="{{ asset('css/stores_add.css') }}" rel="stylesheet">
@endpush

@section('content')

<div class="add-store">
    <h1>Ajouter un magasin</h1>
    <form>
        <div class="input-row">
            <label for="nom">Nom du Commerce:</label>
            <input type="text" id="nom" class="input-store" placeholder="Nom du commerce" name="nom" autofocus required>
        </div>

        <div class="input-row">
            <label for="nom">Catégorie:</label>
            <select name="categorie" id="categorie" class="cat" onChange="toggleCat(this.value)">
                <option disabled selected>Catégorie du commerce</option>
                @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
                @endforeach
            </select>
        </div>

        <div class="input-row">
            <label for="nom">Sous-Catégorie:</label>
            <select name="souscategorie" id="souscategorie" class="cat">
                <option disabled selected>Sous-Catégorie du commerce</option>
            </select>
        </div>

        <div class="input-row">
            <label for="email">Adresse Email:</label>
            <input type="email" id="email" class="input-store" placeholder="Adresse Email" name="email" required>
        </div>
        <div class="input-row">
            <label for="tel">Téléphone:</label>
            <input type="phone" id="tel" class="input-store" placeholder="Numéro de Téléphone" name="tel" required>
        </div>
        <div class="input-row">
            <label for="ville">Adresse Complete</label>
            <input type="text" id="ville" class="input-store" placeholder="Adresse" name="ville" required>
        </div>

        <div class="input-row">
            <label for="summary-ckeditor-desc">Description</label>
            <textarea class="form-control" id="summary-ckeditor-desc" name="summary-ckeditor"></textarea>
        </div>
        
        <div class="input-row">
            <label for="horaires">Horaires</label>
            <textarea class="input-store" id="horaires" name="horaires" placeholder="Horaires d'ouverture"></textarea>
        </div>
        
        <div class="input-row">
            <label for="siret">Numéro de Siret</label>
            <input type="text" id="siret" class="input-store" placeholder="Numero de Siret" name="siret" required>
        </div>

        <div class="input-row">
            <label for="website">Site Web</label>
            <input type="text" id="website" class="input-store" placeholder="adresse" name="website" required>
        </div>
        
        <div class="input-row">
            <p>Livraison</p>

            <div class="livraison_button">
                <input type="radio" name="livraison" class="livraison_radio" id="livraisonOui" value="1"/>
                <label for="livraison" class="livraison_label" onclick="this.checked ? this.style.backgroundColor = 'blue' : this.style.backgroundColor = 'white'">
                    <span class="livraison_titre">Oui</span>
                </label>
            </div>
            <div class="livraison_button">
                <input type="radio" name="livraison" class="livraison_radio" id="livraisonNon" value="0"/>
                <label for="livraison" class="livraison_label" onclick="">
                    <span class="livraison_titre">Non</span>
                </label>
            </div>




    </form>
</div>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );


    let subcategories = {!! $subcategories !!}
    console.log(subcategories)

    let lesSousCat = document.getElementById('souscategorie')

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


</script>
@endsection
