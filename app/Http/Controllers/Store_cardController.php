<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Store_cardController extends Controller
{
   public function home(){
      return view('layouts.store_card');
   }
}
