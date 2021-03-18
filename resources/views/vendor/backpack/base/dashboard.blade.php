@extends(backpack_view('blank'))

@php
    $widgets['before_content'][] = [
        'type'        => 'jumbotron',
        'heading'     => trans('backpack::base.welcome'),
        'content'     => 'Voici le panneau d\'administration de la plateforme MAC-YO Corp.<br/>Depuis cet endroit, vous pouvez consulter les données présente du site, les modifier, les supprimer, etc.<br/>Sélectionnez une entité dans la barre latérale pour commencer.',
        'button_link' => backpack_url('logout'),
        'button_text' => trans('backpack::base.logout'),
    ];
@endphp

@section('content')
    <h2 class="mt-4">Statistiques</h2>
    @php
        use Backpack\CRUD\app\Library\Widget;
        use Illuminate\Support\Carbon;
        use \App\Models\User;
        use \App\Models\Store;
        use \App\Models\Rating;

        $inscritsCeMois = User::all()->where('created_at', '>', Carbon::today()->firstOfMonth() )->count();
        $inscrits = User::all()->count();

        $widgetNbInscrits = [
            'type'        => 'progress',
            'class'       => 'card text-white bg-primary mb-2',
            'value'       => $inscritsCeMois,
            'description' => 'Utilisateurs inscrits ce mois-ci.',
            'hint'        => $inscrits.' inscrits au total.',
        ];

        $commercesCeMois = Store::all()->where('created_at', '>', Carbon::today()->firstOfMonth() )->count();
        $commerces = Store::all()->count();

        $widgetNbCommerces = [
            'type'        => 'progress',
            'class'       => 'card text-white bg-dark mb-2',
            'value'       => $commercesCeMois,
            'description' => 'Commerces enregistrés ce mois-ci.',
            'hint'        => $commerces.' enregistrés au total.',
        ];

        $avisCeMois = Rating::all()->where('created_at', '>', Carbon::today()->firstOfMonth() )->count();
        $avis = Rating::all()->count();

        $widgetNbAvis = [
            'type'        => 'progress',
            'class'       => 'card text-black bg-white mb-2',
            'value'       => $avisCeMois,
            'description' => 'Avis enregistrés ce mois-ci.',
            'hint'        => $avis.' enregistrés au total.',
        ];

        Widget::add()->to('after_content')
             ->type('div')
             ->class('row col-md-12 mt-4')
             ->content([
                   $widgetNbInscrits,
                   $widgetNbCommerces,
                   $widgetNbAvis
        ]);

    @endphp
@endsection
