<?php

namespace App\Http\Controllers\Admin\Charts;

use Backpack\CRUD\app\Http\Controllers\ChartController;
use ConsoleTVs\Charts\Classes\Chartjs\Chart;
use Illuminate\Support\Facades\DB;

/**
 * Class WeeklyRatingsChartController
 * @package App\Http\Controllers\Admin\Charts
 * @property-read \Backpack\CRUD\app\Library\CrudPanel\CrudPanel $crud
 */
class WeeklyRatingsChartController extends ChartController
{
    public function setup()
    {
        $this->chart = new Chart();

        $this->chart->displayAxes(false);
        $this->chart->displayLegend(false);
        $this->chart->height(100);

        for ($weeks_backwards = 4; $weeks_backwards >= 0; $weeks_backwards--) {
            if ($weeks_backwards == 0) {
                $labels[] = 'Cette semaine';
            } elseif ($weeks_backwards == 1) {
                $labels[] = 'La semaine dernière';
            } else {
                $labels[] = 'Il y a '.$weeks_backwards.' semaines';
            }
        }
        $this->chart->labels($labels);
        for ($weeks_backwards = 4; $weeks_backwards >= 0; $weeks_backwards--) {
            // Could also be an array_push if using an array rather than a collection.
            $users[] = DB::table('ratings')->whereBetween('created_at', [today()->weekday(0)->subWeeks($weeks_backwards), today()->weekday(6)->subWeeks($weeks_backwards)])->count();
        }

        $this->chart->dataset('nouveaux avis', 'line', $users)
            ->color('rgba(22, 28, 45, 1)')
            ->backgroundColor('rgba(22, 28, 45, 0)');

    }
}
