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
}
