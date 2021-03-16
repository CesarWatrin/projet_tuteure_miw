<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Rating;
use App\Models\Store;
use App\Models\Subcategory;
use App\Models\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerController extends Controller
{
    public function __construct() {
        $this->middleware('manager');
    }

    public function storesAdd() {
        $categories = Category::all();
        $subcategories = Subcategory::all();
        return view('pages.manager.stores_add',["categories" => $categories, "subcategories" => $subcategories]);
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


    public function storePost(Request $request)
    {
        // var_dump($request);
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'max:191'],
            'category_id' => ['required', 'string','min:1','max:1','exists:categories,category_id'],
            'subcategory_id' => ['required', 'string','min:1','max:1','exists:subcategories,subcategory_id'],
            'phonenumber' => ['required', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:191'],
            'ville' => ['requiered','string','max:191'],
            'address1' => ['requiered','string','min:1','max:191'],
            'address2' => ['nullable','string','min:1','max:191'],
            'description' => ['requiered','string','min:1'],
            // 'photo' => ['requiered','string','min:1'],
            'opening_hours' => ['nullable','string','min:1'],
            'siret' => ['requiered','string','digits:14'],
            'website' => ['nullable','string','url','max:191'],
            'delivery' => ['requiered','boolean'],
            'delivery_conditions' => ['nullable','string',]
            ]);

            //importer image
            //creer comment-code
            //modifier city
            //RE SET LES NULLABLES
            //calculer coord
            
    }

    public function dashboard($storeId){
        $store = Store::where('id', '=', $storeId)->get();
        $comments = Rating::where('store_id', '=', $storeId)->get();
        $avg = Rating::where('store_id', '=', $storeId)->avg('rating');

        $shops = Store::where('category_id', '=', $store[0]->category_id)->get();
        $shops_avg = [];
        foreach ($shops as $shop){
            $shop_avg = Rating::where('store_id', '=', $shop->id)->avg('rating');
            if ($shop_avg != null){
                array_push($shops_avg, $shop_avg);
            }

        }
        rsort($shops_avg);
        $rank_c = array_search($avg, $shops_avg)+1;

        $shops = Store::where('subcategory_id', '=', $store[0]->subcategory_id)->get();
        $shops_avg = [];
        foreach ($shops as $shop){
            $shop_avg = Rating::where('store_id', '=', $shop->id)->avg('rating');
            if ($shop_avg != null){
                array_push($shops_avg, $shop_avg);
            }

        }
        rsort($shops_avg);
        $rank_sc = array_search($avg, $shops_avg)+1;
        return view('pages.dashboard', ['store' => $store, 'comments' => $comments, 'avg' => $avg, 'rank_c' => $rank_c, 'rank_sc' => $rank_sc]);
    }

    public function modify_store(Request $request){
       $store_data = Store::$request->update([]);
        return back();
    }
}
