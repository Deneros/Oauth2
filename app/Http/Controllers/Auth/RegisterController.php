<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\IdentificationType;
use App\Models\User;
use App\Models\Role;



class RegisterController extends Controller
{

    public function index(string $role = null)
    {
        $validRoles = ['admin', 'usuario', 'moderador'];
        $identificationTypes = IdentificationType::pluck('name', 'id');

        if ($role === null) {
            return view('register.register', compact('role', 'identificationTypes'));
        }

        if (in_array($role, $validRoles)) {
            $currentRole = Auth::user()->role->name;

            if ($currentRole === 'admin' || $currentRole === 'moderador') {
                return view('register.register', compact('role', 'identificationTypes'));
            } else {
                return redirect()->route('register')->with('error', 'No tienes permisos para registrar con el rol especificado.');
            }
        }

        abort(500);
    }


    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'family_name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'identification_type' => 'nullable|numeric',
            'identification_number' => 'nullable|numeric',
            'role' => 'nullable|string'
        ]);

        // $role_id = Role::where('name', $request->input('role'))->first()->id;

        $user = new User();
        $user->name = $request->input('name');
        $user->family_name = $request->input('family_name');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        $user->identification_type_id = $request->input('identification_type');
        $user->identification_number = $request->input('identification_number');
        $user->role_id = 2;
        $user->save();

        // if ($user->role_id != 3) {
        //     return redirect()->back()->with('success', 'Usuario creado exitosamente.');
        // }


        return redirect()->route('login')->with('success', 'Registro exitoso. Por favor, inicia sesión.');
    }
}
