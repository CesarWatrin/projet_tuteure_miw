<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;
use function PHPUnit\Framework\throwException;

class MapController extends Controller
{

    public function home() {
        //dd($this->getDistanceBetweenPointsNew(44.545061, 6.063290, 44.533836, 6.043525, 'kilometers'));

        return view('pages.map');
    }

    public function getStores(Request $request) {

        //dd($request->lat);
        //dd(urlencode($request->input('lat')));

        if($request->has(['lat', 'lon'])) {
            $stores = Store::with('city')
                //->where('( 6371 * acos( cos(radians('.$request->input('lat').')) * cos(radians(lat)) * cos(radians(lon) - radians('.$request->input('lon').')) + sin(radians('.$request->input('lat').')) * sin(radians(lat)) ) )', '<', 10)
                ->get();

            $stores_near = [];
            foreach($stores as $store) {
                if($this->distance($store->lat, $store->lon, $request->input('lat'), $request->input('lon'), 'kilometers') < 10) {
                    $stores_near[] = $store;
                }
            }

            //dd($stores_near);

            return $stores_near;
        } else {
            throw new \Exception('lat et/ou lon ne sont pas définis');
        }

    }

    public function distance($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'miles') {
        $theta = $longitude1 - $longitude2;
        $distance = (sin(deg2rad($latitude1)) * sin(deg2rad($latitude2))) + (cos(deg2rad($latitude1)) * cos(deg2rad($latitude2)) * cos(deg2rad($theta)));
        $distance = acos($distance);
        $distance = rad2deg($distance);
        $distance = $distance * 60 * 1.1515;
        switch($unit) {
            case 'miles':
                break;
            case 'kilometers' :
                $distance = $distance * 1.609344;
        }
        return (round($distance, 1));
    }

}
