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

    public function storePost(Request $request)
    {
        //  var_dump($request);
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'max:191'],
            'category_id' => ['required', 'string','min:1','max:1','exists:categories,id'],
            'subcategory_id' => ['required', 'string','min:1','max:1','exists:subcategories,id'],
            'phonenumber' => ['required', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:191'],
            'ville' => ['required','string','max:191'],
            'address1' => ['required','string','min:1','max:191'],
            'address2' => ['nullable','string','min:1','max:191'],
            'description' => ['required','string','min:1'],
            'opening_hours' => ['nullable','string','min:1'],
            'siret' => ['required','string','digits:14'],
            'website' => ['nullable','string','max:191'],
            'delivery' => ['required','boolean'],
            'delivery_conditions' => ['nullable','string']
            ]);

            $request->file('photo')->storeAs('./IMAGEU', 'imagetest2.jpg');


            // var_dump(parse_url($url));

            //importer image /////////


            //creer comment-code
            //modifier city
            //RE SET LES NULLABLES

    }

    public function dashboard($storeId){
        $store = Store::where('id', '=', $storeId)->get();
        $comments = Rating::where('store_id', '=', $storeId)->get();
        $avg = Rating::where('store_id', '=', $storeId)->avg('rating');
        $categories = Category::all();
        $subcategories = Subcategory::all();
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
        return view('pages.dashboard', ['store' => $store, 'comments' => $comments, 'avg' => $avg, 'rank_c' => $rank_c, 'rank_sc' => $rank_sc, "categories" => $categories, "subcategories" => $subcategories]);
    }

    public function storeUpdate($id, Request $request)
    {
        $store = Store::where('id', '=', $id)->get();



        $store->name = $request->input('name');
        /*$store->phonenumber = $request->input('phonenumber');
        $store->email = $request->input('email');
        $store->website = $request->input('website');
        $store->description = $request->input('description');

        $store->ville = $request->input('ville');
        $store->adrress1 = $request->input('address1');
        $store->adrress2 = $request->input('address2');
        $store->delivery = $request->input('delivery');
        $store->delivery_conditions = $request->input('delivery_conditions');

        $store->category_id = $request->input('category_id');
        $store->subcategory_id = $request->input('subcategory_id');
        $store->opening_hours = $request->input('opening_hours');
        $store->siret = $request->input('siret');
        $store->catalog = $request->input('catalog');*/


        // !!!!! changement de code postal pas encore fait

        $store->save();
        return back();
    }
}
