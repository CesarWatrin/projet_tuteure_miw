<div class="card">
    <div class="img_store">
    <img src="images/main_illustration.svg">
    </div>
    <div class="infos_store">
        <div class="text">
            <h3>Nom magasin</h3>
            <div class="distance">
                <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
                <p>à 3.2km</p>
            </div>
            <div class="note">
                <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
                <p>4.5/5</p>
            </div>
        </div>
        <div class="icons">
            @if (Route::current()->uri === 'map')
                <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
            @endif
            @if (Route::current()->uri === '/')
                 <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
                 <p>favoris</p>
            @endif
            @if (Route::current()->uri === 'favoris')
                <svg class="icon"><use xlink:href="images/sprite.svg#loupe"></use></svg>
            @endif
        </div>
    </div>
</div>
