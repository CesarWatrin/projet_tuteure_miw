<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FavorisController extends Controller
{
   public function home(){
      return view('pages.favoris');
   }
}
