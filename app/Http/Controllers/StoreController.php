<?php

namespace App\Http\Controllers;

use App\Models\Store;
use Illuminate\Http\Request;

class StoreController extends Controller
{
   public function addFavorite(Request $request) {
      Store::where('id', $request->input('id'))->increment('favorite_number', 1);
      return true;
   }

   public function removeFavorite(Request $request) {
      $store = Store::select('favorite_number')->where('id', $request->input('id'))->first();
      if ($store->favorite_number >= 1) {
         Store::where('id', $request->input('id'))->decrement('favorite_number', 1);
      }
      return true;
   }

   public function randomNearStores(Request $request) {
      $stores = Store::with('ratings.user')->where('state', '>=', 3)->inRandomOrder()->get();

      $stores_near = [];
      $i = 0;
      foreach($stores as $store) {
         if ($i === 6) {
            break;
         } else if($this->distance($store->lat, $store->lon, $request->input('lat'), $request->input('lon'), 'kilometers') < 5) {
            $stores_near[] = $store;
         }
         $i++;
      }

      return $stores_near;
   }

   public function distance($latitude1, $longitude1, $latitude2, $longitude2, $unit = 'miles') {
      if ($latitude1 == $latitude2 && $longitude1 == $longitude2) {
         return 0;
      }
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
