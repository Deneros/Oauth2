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

        dd($user);

        // Comprueba si el usuario existe en tu base de datos
        $existingUser = User::where('email', $user->getEmail())->first();

        if ($existingUser) {
            // Autentica al usuario existente
            auth()->login($existingUser, true);
        } else {
            // Crea un nuevo usuario en tu base de datos
            $newUser = new User();
            $newUser->name = $user->getName();
            $newUser->email = $user->getEmail();
            // ...
            $newUser->save();

            // Autentica al nuevo usuario
            auth()->login($newUser, true);
        }

        // Redirige al usuario a la página de inicio
        return redirect('/');
    }

    public function auth(){
        echo 'hola';
    }
}
