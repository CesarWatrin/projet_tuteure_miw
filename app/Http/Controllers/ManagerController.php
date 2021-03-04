<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rating;
use App\Models\Store;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function __construct() {
        $this->middleware('manager');
    }

    public function storeAdd() {
        return view('pages.manager.store_add');
    }

    /*public function dashboard() {
        $manager_id = Auth::user()->id;
        $stores = Store::where('manager_id', '=', $manager_id)->get();
        return view('pages.dashboard', ['stores' => $stores]);
    }*/

    /*public function dashboard($storeId){
        $manager_id = Auth::user()->id;
        $stores = Store::where('manager_id', '=', $manager_id)->get();
        $store_info = Store::where('id', '=', $storeId)->get();
        return view('pages.dashboard', ['stores' => $stores, 'store_info' => $store_info]);
    }*/

    public function dashboard($storeId){
        $store = Store::where('id', '=', $storeId)->get();
        $categories = Category::all();
        $subCategories = Subcategory::all();
        $comments = Rating::where('store_id', '=', $storeId)->get();
        //$avg = Rating::where('store_id', '=', $storeId)->get();
        $avg = Rating::where('store_id', '=', $storeId)->avg('rating');
        return view('pages.dashboard', ['store' => $store, 'categories' => $categories, 'subCategories' => $subCategories, 'comments' => $comments, 'avg' => $avg]);
    }

    public function modify_store(Request $request){
       //$store_data = Store::$request->([


        return back();
    }
}
