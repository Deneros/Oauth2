<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;




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

        $existing_user = User::where('email', $user->getEmail())->first();

        if ($existing_user) {
            auth()->login($existing_user, true);
        } else {
            $new_user = User::create([
                'name' => $user->user['given_name'],
                'family_name' => $user->user['family_name'],
                'email' => $user->getEmail(),
                'password' => Hash::make($user->id),
                'role_id' => 2,
            ]);

            auth()->login($new_user, true);
        }

        return redirect('/home');
    }

    public function auth(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect('/form');
        } else {
            return redirect()->back()->withErrors(['message' => 'Invalid credentials']);
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
