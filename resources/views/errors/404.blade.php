<html>
<head>
    <title>
        Cette page n'existe pas
    </title>
    <link href="{{ asset('css/main.min.css') }}" rel="stylesheet">
    <style>

        body {
            background-color: #EAEFFC;
        }

        .logo {
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 2.25rem;
        }

        .illu {
            width: 100%;
            max-width: 600px;
            max-height: 30%;
            margin: 1rem 0;
        }

        .legende {
            text-align: center;
        }

        @media screen and (min-width: 768px) {

            .illu {
                max-height: 60%;
            }

        }

    </style>

</head>
<body>
<div class="logo">

    <h1 class="titre">Oups, ce n'était pas censé se produire !</h1>
    <img class="illu" src="{{ asset('images/404_illustration.svg') }}"/>
    <p class="legende">Pas d'inquiétude, nous allons vous ramener à bon port.</p>
    <a class="bouton_form brouge bsubmit" href="/">Retour à l'accueil</a>
</div>
</body>
</html>
