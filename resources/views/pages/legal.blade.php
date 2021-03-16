@extends('layouts.app')

@push('styles')
    {{-- balises feuilles CSS ici --}}
    {{-- exemple : <link href="{{ asset('css/map.css') }}" rel="stylesheet"> --}}
@endpush

@section('content')

    @include('layouts.container_corp')

    <h1 class="titre">Mentions légales</h1>
    <h2 class="sous_titre">Conditions Générales d'Utilisation</h2>

    <div class="mentions_legales">

        <h3>1. Présentation du service proposé</h3>

        <p>[nomdusite] a pour but de vous présenter les différents commerces inscrits sur la plateforme et proposant la vente à emporter, autour de votre position ou d'une adresse postale.
            <br/>Chaque commerce fournit le catalogue des produits disponibles ainsi que des informations pratiques (numéro de téléphone, horaires d'ouverture, etc.) et la liste des avis laissés par la communauté.
            <br/>Lorsqu'il se rend chez un commerçant, l'utilisateur reçoit un code lui permettant de laisser à son tour une note et un commentaire pour le commerce.</p>
        <p>[nomdusite] est conçu par MM. Anthony Brochier, César Watrin, Maxime Didier et Yohan Salamone, quatre étudiants en Licence Professionnelle Mobilité - Internet et Web, dans le cadre de leur projet tuteuré. Le projet tuteuré est supervisé par le responsable de la licence, M. Roland Grosso.</p>

        <h3>2. Les droits et obligations de chaque profil utilisateur</h3>

        <h4>Profil Client :</h4>
        <ul>
            L’utilisateur a le droit de :
            <li>modifier ou supprimer ses informations personnelles ;</li>
            <li>consulter les informations d’une entreprise.</li>
        </ul>
        <ul>
            L’utilisateur à l’obligation de :
            <li>renseigner des informations correctes</li>
        </ul>
        <h4>Profil Gérant :</h4>
        <ul>Le gérant à le droit de :
            <li>modifier ses informations personnelles ;</li>
            <li>modifier les informations relatives à son commerce ;</li>
            <li>retirer son commerce et l’ensemble de ses informations de la plateforme.</li>
        </ul>
        <ul>Le gérant à l’obligation de :
            <li>renseigner des informations correctes ;</li>
            <li>s’engager à la conformité des produits qu’il met en vente ;</li>
            <li>assurer une mis à jour quant à la disponibilité de ses produits et de ses informations en cas de changement.</li>
        </ul>

        <h3>3. Les droits et obligations de l’éditeur</h3>

        <ul>[nomdusite], en sa qualité d'éditeur, se réserve les droits suivants concernant la plateforme :
            <li>le droit d’utiliser un module de géolocalisation afin de proposer une expérience utilisateur personnalisée (la position de l’utilisateur n'étant ni enregistrée ni transmise) ;</li>
            <li>le droit récolter des données anonymes concernant la consultation du site internet et des différents commerces, dans l'objectif d'élaborer des statistiques ;</li>
            <li>le droit de connaître l’identité (nom, prénom) de ses utilisateurs, ainsi que des informations complémentaires au sujet de ses utilisateurs (adresse e-mail).</li>
        </ul>
        <ul>De plus, l'éditeur met en œuvre les moyens nécessaires afin de :
            <li>maintenir l’accès au site ;</li>
            <li>assurer le bon fonctionnement du site ;</li>
            <li>assurer la sécurité de ses utilisateurs, et de leurs informations ;</li>
            <li>ne pas divulguer d’informations personnelles au sujet de ses utilisateurs ;</li>
            <li>surveiller le contenu de son site.</li>
        </ul>
        <p>Cependant, tout événement dû à la force majeure écarterait la responsabilité de l'éditeur sur un quelconque dysfonctionnement de la plateforme.</p>

        <h3>4. Conditions d'utilisation de l'espace Avis</h3>

        <p>L’espace Avis est réservé aux personnes ayant un compte utilisateur chez [nomdusite] et ayant déjà visité le commerce en question. Pour s’en assurer, le commerce délivrera lors de la visite un code permettant de le noté ultérieurement.</p>
        <ul>
            Dans ce cadre, le Client est invité à compléter les catégories suivantes :
            <li>un avis en caractère libre ;</li>
            <li>une note globale ;</li>
            <li>une adresse e-mail valide et personnelle.</li>
        </ul>
        <p>[nomdusite] se réserve le droit de modérer l’espace “Avis”, et de censurer des commentaires injurieux, et l’auteur du commentaire pourrait se voir accusé de diffamation par le commerce.</p>
        <p>Tout avis ne correspondant pas aux critères ci-dessus ne pourra être publié.</p>
        <p>Utilisateurs et commerces peuvent également signaler un avis qu’ils jugent problématique pour un examen par la modération de [nomdusite]</p>

        <h3>5. Politique vis-à-vis des hyperliens</h3>

        <p>Le site peut contenir des liens hypertextes pointant vers d'autres sites internet sur lesquels ce site n'exerce pas de contrôle. Malgré les vérifications préalables et régulières réalisées par l'éditeur, celui-ci décline tout responsabilité quant aux contenus qu'il est possible de trouver sur ces sites.</p>
        <p>L'éditeur autorise la mise en place de liens hypertextes vers toute page ou document de son site.</p>
        <p>Sont exclus de cette autorisation les sites diffusant des informations à caractère illicite, violent, polémique, pornographique, xénophobe ou pouvant porter atteinte à la sensibilité du plus grand nombre.</p>
        <p>Enfin, ce site se réserve le droit de faire supprimer à tout moment un lien hypertexte pointant sur lui, s'il l'estime non conforme à sa politique éditoriale.</p>

        <h3>6. Modalités de règlement des litiges</h3>

        <p>En cas de litige, un règlement à l'amiable (par le moyen de modes alternatifs tels que la conciliation, la médiation, l'arbitrage…) sera favorisé. À défaut, l'utilisateur aura le choix du tribunal de son domicile, ou bien du tribunal du siège de l'éditeur.</p>

    </div>

    {{-- <h2 class="sous_titre">Crédits images</h2>
    <div class="mentions_legales">

    </div> --}}

@endsection

@push('scripts')
    {{-- balises scripts JS ici --}}
    {{-- exemple : <script src="{{ asset('js/map.js') }}"></script> --}}
@endpush
