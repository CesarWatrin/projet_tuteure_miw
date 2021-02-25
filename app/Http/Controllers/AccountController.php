<?php

namespace App\Http\Controllers;

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
}
