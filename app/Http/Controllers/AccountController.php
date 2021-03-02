<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home() {
        return view('pages.account', ['user' => Auth::user()]);
    }
}
