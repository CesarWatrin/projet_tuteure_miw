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
            <input type="text" id="nom" class="input-store" placeholder="Nom du commerce" name="email" autofocus required>
        </div>
        <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea>
    </form>
</div>


<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
CKEDITOR.replace( 'summary-ckeditor' );
</script>
@endsection
