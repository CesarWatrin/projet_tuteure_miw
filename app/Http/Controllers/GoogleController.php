<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {

            $user = Socialite::driver('google')->stateless()->user();

            $userFound = User::where('google_id', $user->id)->first();

            if($userFound) {

                Auth::login($userFound);

                return redirect()->route('account');

            } else {

                [$user->firstname, $user->surname] = explode(' ', $user->getName(), 2);
                $roles = Role::all()->except(3);

                return view('auth.google_register', ['user' => $user, 'roles' => $roles]);
            }

        } catch (Exception $e) {
            return redirect()->route('login');
        }
    }

    public function registerWithGoogle(Request $request) {

        $data = $request->all();

        $messages = [
            'cgu.required' => 'Vous devez avoir lu et accepté les CGU.',
            'phonenumber.required_unless' => 'Le champ nº de téléphone est obligatoire.'
        ];

        $attributes = [
            'role' => 'rôle',
            'surname' => 'nom de famille',
            'firstname' => 'prénom',
            'phonenumber' => 'nº de téléphone',
            'email' => 'adresse e-mail',
            'password' => 'mot de passe',
        ];

        $this->validate($request, [
            'role' => ['required', 'int', 'exists:roles,id'],
            'phonenumber' => ['required_unless:role,1', 'exclude_if:role,1', 'digits:10'],
            'cgu' => ['required']
        ], $messages, $attributes);

        $user_info = json_decode($data['user_info']);

        $newUser = User::create([
            'surname' => $user_info->surname,
            'firstname' => $user_info->firstname,
            'phonenumber' => $data['phonenumber'],
            'email' => $user_info->email,
            'password' => Hash::make(Hash::make($user_info->id.'_dummy_password')),
            'role_id' => $data['role'],
            'google_id' => $user_info->id
        ]);

        Auth::login($newUser);

        return redirect()->route('account');
    }

}
