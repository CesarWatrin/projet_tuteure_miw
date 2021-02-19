@extends ('layouts.app')


@push('styles')
    <link href="{{ asset('css/index.css') }}" rel="stylesheet">
@endpush


@section ('content')
<div class="container">
    <div class="dashboard">
            <div class="dashboard_bar">
                <select class="shops">
                    <option>-- Choix du magasin --</option>
                </select>
                <div class="data_time">
                    <p>Semaine</p>
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
                <p>Général</p>
                <p>Localisation</p>
                <p>Complément</p>
            </div>
        </div>
        <form>
            <div class="infos_general active">
                <div class="infos_left">
                    <input type="text" placeholder="Nom">
                    <input type="tel" placeholder="Numéro de Téléphone">
                    <input type="email" placeholder="Mail">
                    <input type="text" placeholder="Site Web">
                </div>
                <div class="infos_right">
                    <textarea placeholder="Description"></textarea>
                </div>
            </div>

            <div class="infos_localisation">
                <div class="infos_left">
                    <input type="text" placeholder="Adresse">
                    <input type="text" placeholder="Complément d'adresse">
                    <input type="text" placeholder="Ville">
                </div>
                <div class="infos_right">
                    <input type="number" placeholder="Latitude">
                    <input type="number" placeholder="Longitude">
                </div>
            </div>

            <div class="infos_complementary">
                <div class="infos_left">
                    <select>
                        <option>--Catégorie--</option>
                    </select>
                    <select>
                        <option>--Sous-Catégorie--</option>
                    </select>
                    <div>
                        <label for="delivery_cat">Livraison : </label>
                        <div id="delivery_cat">
                            <input type="radio" id="oui" name="delivery" value="oui">
                            <label for="oui">Oui</label><br>
                            <input type="radio" id="non" name="delivery" value="non">
                            <label for="non">Non</label><br>
                        </div>
                    </div>
                    <textarea placeholder="Condition livraison"></textarea>
                    <textarea placeholder="Horraire"></textarea>
                </div>
                <div class="infos_right">
                    <textarea placeholder="Catalogue"></textarea>
                </div>
            </div>

            <input type="submit" value="Sauvegarder">
            <input type="reset" value="Annuler">
        </form>
    </div>
</div>

@endsection
