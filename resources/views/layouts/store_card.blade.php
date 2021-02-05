<div class="card">
    <div class="img_store">
      <img src="images/commerce.png">
    </div>
    <div class="infos_store">
        <div class="text">
            <h3>SPAR Gap</h3>
            <div class="distance">
                <!--<img src="images/cursor.svg" alt="position">-->
                <svg class="small_icon"><use xlink:href="images/sprite.svg#cursor"></use></svg>
                <p>&nbsp;à 3.2km</p>
            </div>
            <div class="note">
                <!--<img src="images/star.svg" alt="etoile">-->
                <svg class="small_icon"><use xlink:href="images/sprite.svg#star"></use></svg>
                <p>&nbsp;4.5/5</p>
            </div>
        </div>
        <div class="icons">
            @if (Route::current()->uri === 'map')
                <img src="images/corbeille.svg" alt="corbeille">
            @endif
            @if (Route::current()->uri === '/')
                 <img src="images/corbeille.svg" alt="corbeille">
                 <p>favoris</p>
            @endif
            @if (Route::current()->uri === 'favoris')
               <!--<img src="images/corbeille.svg" alt="corbeille">-->
               <div class="card_btn">
                   <svg class="icon"><use xlink:href="images/sprite.svg#heart_full"></use></svg>
                   <span>Favori</span>
               </div>
                @endif
        </div>
    </div>
</div>
