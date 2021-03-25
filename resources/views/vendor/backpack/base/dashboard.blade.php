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
        use App\Http\Controllers\Admin\Charts\WeeklyUsersChartController;
        use App\Http\Controllers\Admin\Charts\WeeklyStoresChartController;
        use App\Http\Controllers\Admin\Charts\WeeklyRatingsChartController;
        use Backpack\CRUD\app\Library\Widget;

        $nvxUsers = DB::table('users')->whereBetween('created_at', [today()->subWeeks(1)->addDay(), today()->addDay()])->count();
        $totalUsers = DB::table('users')->count();

        $widgetNvxUsers = [
            'type'       => 'chart',
            'controller' => WeeklyUsersChartController::class,
            'class'   => 'card text-white bg-primary',
            'content' => [
                'body'   => '
                <div class="p-2">
                    <div class="text-value-lg">'.$nvxUsers.'</div>
                    <div>Utilisateurs inscrits cette semaine.</div>
                </div>',
                'hint'   => $totalUsers.' utilisateurs inscrits au total.'
            ],
        ];

        $nvxCommerces = DB::table('stores')->whereBetween('created_at', [today()->subWeeks(1)->addDay(), today()->addDay()])->count();
        $totalCommerces = DB::table('stores')->count();

        $widgetNvxCommerces = [
            'type'       => 'chart',
            'controller' => WeeklyStoresChartController::class,
            'class'   => 'card text-white bg-dark',
            'content' => [
                'body'   => '
                <div class="p-2">
                    <div class="text-value-lg">'.$nvxCommerces.'</div>
                    <div>Commerces enregistrés cette semaine.</div>
                </div>',
                'hint'   => $totalCommerces.' commerces enregistrés au total.'
            ],
        ];

        $nvxAvis = DB::table('ratings')->whereBetween('created_at', [today()->subWeeks(1)->addDay(), today()->addDay()])->count();
        $totalAvis = DB::table('ratings')->count();

        $widgetNvxAvis = [
            'type'       => 'chart',
            'controller' => WeeklyRatingsChartController::class,
            'class'   => 'card bg-white',
            'content' => [
                'body'   => '
                <div class="p-2">
                    <div class="text-value-lg">'.$nvxAvis.'</div>
                    <div>Avis publiés cette semaine.</div>
                </div>',
                'hint'   => $totalAvis.' avis publiés au total.'
            ],
        ];

        Widget::add()->to('after_content')
                 ->type('div')
                 ->class('row col-md-12 mt-4')
                 ->content([
                       $widgetNvxUsers,
                       $widgetNvxCommerces,
                       $widgetNvxAvis
            ]);

    @endphp
@endsection
