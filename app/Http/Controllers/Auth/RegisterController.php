<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class RegisterController extends Controller
{

    public function index()
    {
        return view('register.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        User::create([
            'name' => $request->input('name'),
            'family_name' => $request->input('family_name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password')),
        ]);


        return redirect()->route('login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }
}
