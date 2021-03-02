<?php

namespace App\Http\Controllers;

use App\Models\Rating;
use App\Models\Store;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function home() {
        return view('pages.account', ['user' => Auth::user()]);
    }

    public function edit() {
        return view('pages.account_edit', ['user' => Auth::user()]);
    }

    public function update(Request $request) {
        $this->validate($request, [
            'surname' => ['required', 'string', 'min:2', 'max:255'],
            'firstname' => ['required', 'string', 'min:2', 'max:255'],
            'phonenumber' => ['required_unless:role,1', 'exclude_if:role,1', 'digits:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.Auth::user()->id ],
        ]);

        Auth::user()->surname = $request->input('surname');
        Auth::user()->firstname = $request->input('firstname');
        Auth::user()->phonenumber = $request->input('phonenumber');
        Auth::user()->email = $request->input('email');

        Auth::user()->save();

        return redirect()->route('account')->with('success', 'Profil modifié avec succès.');
    }

    public function dashboard() {
        return view('pages.dashboard');
    }

    public function commentscode() {
        return view ('pages.commentscode_input');
    }

    public function rateStore(Request $request, $comments_code = null) {
        // TODO rediriger vers la modification si le code d'un commerce déjà noté est entré
        $rating = null;
        $this->validate($request, [
            'comments_code' => ['required', 'string', 'min:10', 'max:10', 'exists:stores,comments_code'],
        ]);
        $store = Store::all()->where('comments_code', $request->input('comments_code'))->first();
        $rating = Rating::all()->where('user_id', Auth::id())->where('store_id', $store->id)->first();
        return view('pages.rating_add', ['store' => $store, 'rating' => $rating]);

    }

    public function postRating(Request $request) {
        $this->validate($request, [
            'store_id' => ['required', 'exists:stores,id'],
            'rating' => ['required', 'integer', 'in:1,2,3,4,5'],
            'comment' => 'nullable'
        ]);

        $rating = Rating::all()->where('user_id', Auth::id())->where('store_id', $request->input('store_id'))->first();

        if(is_null($rating)) {
            $rating = new Rating();
            $rating->user_id = Auth::id();
            $rating->store_id = $request->input('store_id');
        }
        $rating->rating = $request->input('rating');
        $rating->comment = $request->input('comment');

        $rating->save();

        return redirect()->route('dashboard')->with('success', 'Avis posté avec succès.');
    }
}
