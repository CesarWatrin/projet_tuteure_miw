<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagerController extends Controller
{
    public function __construct() {
        $this->middleware('manager');
    }

    public function storeAdd() {
        return view('pages.manager.store_add');
    }
}
