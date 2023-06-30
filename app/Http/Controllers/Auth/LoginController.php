<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;


class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }


    public function handleGoogleCallback()
    {
        $user = Socialite::driver('google')->stateless()->user();

        dd($user->user['given_name']);

        $existing_user = User::where('email', $user->getEmail())->first();

        if ($existing_user) {
            auth()->login($existing_user, true);
        } else {
            $new_user = new User();
            $new_user->name = $user->getName();
            $new_user->email = $user->getEmail();
            $new_user->save();

            auth()->login($new_user, true);
        }

        return redirect('/');
    }

    public function auth()
    {
        echo 'hola';
    }
}
