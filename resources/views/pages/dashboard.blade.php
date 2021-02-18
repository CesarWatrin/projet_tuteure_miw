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
                    <img src="">
                </div>
                <div class="subcategorie_reward reward">
                    <p>n°1</p>
                    <p>Categorie</p>
                    <img src="">
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

        <div class="comments">
            <h3>Commentaires</h3>
            @for($i = 0; $i < 10; $i++)
                <div class="comment">
                    <div class="user_comment">
                        <img class="user_image">
                        <p class="user_name">lorem ipsum</p>
                    </div>
                    <p class="comment ">Lorem ipsum dolor sit amet, consectetur adipiscing elit. In cursus est quis nisi elementum faucibus. Nullam nec sagittis nunc. Donec eu leo in risus rhoncus accumsan vel nec risus. Nunc a lectus nisi. Nullam tincidunt tempor rhoncus. Ut feugiat dolor sit amet lorem sollicitudin, quis malesuada libero finibus. Suspendisse congue consequat elit. Aenean semper, sapien sed accumsan congue, metus ipsum dictum elit, a sodales sapien neque nec ligula. Nulla ut odio molestie erat tempus consectetur. Vivamus sed aliquet urna. Duis nibh risus</p>
                    <img class="delete" src="">
                </div>
            @endfor
        </div>
    </div>

    <div class="info_shop">

    </div>
</div>



@endsection
