<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Models\View;
use Illuminate\Http\Request;
use function PHPUnit\Framework\throwException;

class MapController extends Controller
{

   public function home(Request $request) {
      //dd($this->getDistanceBetweenPointsNew(44.545061, 6.063290, 44.533836, 6.043525, 'kilometers'));
      if($request->has('q'))
      return view('pages.map', ['search' => $request->input('q')]);
      else
      return view('pages.map');
   }

   public function getStores(Request $request) {

      //dd($request->lat);
      //dd(urlencode($request->input('lat')));
      if($request->has(['lat', 'lon', 'cat', 'subcat'])) {

         $stores = Store::with('city')->with('ratings.user')->where('category_id', $request->input('cat'))->where('subcategory_id', $request->input('subcat'))->get();
         $stores_near = [];
         foreach($stores as $store) {
            if($this->distance($store->lat, $store->lon, $request->input('lat'), $request->input('lon'), 'kilometers') < 10) {
               $stores_near[] = $store;
            }
         }
         return $stores_near;

      } else if($request->has(['lat', 'lon', 'cat'])) {

         $stores = Store::with('city')->with('ratings.user')->where('category_id', $request->input('cat'))->get();

         $stores_near = [];
         foreach($stores as $store) {
            if($this->distance($store->lat, $store->lon, $request->input('lat'), $request->input('lon'), 'kilometers') < 10) {
               $stores_near[] = $store;
            }
         }
         return $stores_near;

      } else if($request->has(['lat', 'lon'])) {
         $stores = Store::with('city')->with('ratings.user')
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
      } else if ($request->has('ids')) {
         $ids = $request->input('ids');
         $ids = explode(',', $ids);
         $array_ids = array();
         foreach ($ids as $id) {
            $stores = Store::with('city')->with('ratings.user')->where('id', $id)->get();
            array_push($array_ids, $stores[0]);
         }
         return $array_ids;
      } else if ($request->has('id')) {
         $store = Store::with('city')->where('id', $request->input('id'))->first();
         return $store;
      } else {
         throw new \Exception('lat et/ou lon et/ou id ne sont pas définis');
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

   public function addView(Request $request)
   {
       $store_id = $request['store_id'];
       if(Store::find($store_id)) {
           $view = new View();
           $view->store_id = $store_id;
           return $view->save();
       }
       return null;
   }

}
