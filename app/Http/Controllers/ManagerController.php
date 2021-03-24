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
        $this->validate($request, [
            'name' => ['required', 'string', 'min:2', 'max:191'],
            'category_id' => ['required', 'string','exists:categories,id'],
            'subcategory_id' => ['nullable', 'string','exists:subcategories,id'],
            'phonenumber' => ['required', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:191'],
            'ville' => ['required','string','max:191'],
            'zip' => ['required','string','max:5','min:2'],
            'address1' => ['required','string','min:1','max:191'],
            'address2' => ['nullable','string','min:1','max:191'],
            'description' => ['required','string','min:1'],
            'catalog' => ['nullable','string'],
            'opening_hours' => ['nullable','string','min:1'],
            'siret' => ['required','string','digits:14'],
            'website' => ['nullable','string','max:191'],
            'delivery' => ['required','boolean'],
            'delivery_conditions' => ['nullable','string']
            ]);

            
            $last_store = Store::orderBy('id','desc')->first();
            $newId = $last_store->id+1;
            $store = new Store();
            
            
            
            $store->id = $newId;
            $store->name = $request->input('name');
            $store->address1 = $request->input('address1');
            $store->address2 = $request->input('address2');
            $store->zip = $request->input('zip');
            $store->city = $request->input('ville');
            $store->lat = $request->input('lat');
            $store->lon = $request->input('long');
            $store->phonenumber = $request->input('phonenumber');
            $store->email = $request->input('email');
            $store->siret = $request->input('siret');
            $store->description = $request->input('description');
            $store->catalog = $request->input('catalog');
            $store->delivery = $request->input('delivery');
            $store->delivery_conditions = $request->input('delivery_conditions');
            $store->state = "2";
            $nom = $request->input('name');
            $commentCode=substr(md5($nom),1,6)."-".$newId;
            $store->comments_code = $commentCode;
            $store->website = $request->input('website');
            $store->opening_hours = $request->input('opening_hours');
            $store->category_id = $request->input('category_id');
            $store->subcategory_id = $request->input('subcategory_id');
            $store->manager_id = Auth::id();
            
            $request->file('photo')->storeAs('./images/store_'.$newId, 'commerce.jpg');
    
            $store->save();

            return redirect()->route('stores');


        }

    public function dashboard($storeId){
        $store = Store::where('id', '=', $storeId)->get();
        $categories = Category::all();
        $subCategories = Subcategory::all();
        $comments = Rating::where('store_id', '=', $storeId)->get();
        $views = View::where('store_id', '=', $storeId)->count();
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
        return view('pages.dashboard', ['store' => $store, 'categories' => $categories, 'subCategories' => $subCategories, 'comments' => $comments, 'avg' => $avg, 'views' => $views, 'rank_c' => $rank_c, 'rank_sc' => $rank_sc]);
    }

    public function modify_store(Request $request){
       $store_data = Store::$request->update([]);
        return back();
    }
}
