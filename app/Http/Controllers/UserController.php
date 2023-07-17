<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Role;
use App\Models\IdentificationType;


class UserController extends Controller
{

    public function index()
    {
        $users = User::with('role')->get();
        $roles = Role::pluck('name', 'id');
        $user_role = auth()->user()->role->name;
        $identificationTypes = IdentificationType::pluck('name', 'id');

        return view('users.index', compact('users', 'roles', 'user_role', 'identificationTypes'));
    }

    public function editRole(int $user)
    {

        $roles = Role::pluck('name', 'id');
        $user = User::findOrFail($user);

        return view('users.edit_role', compact('user', 'roles'));
    }


    public function update(Request $request, int $user)
    {
        $request->validate([
            'role_id' => 'required|exists:roles,id',
        ]);
        $user = User::findOrFail($user);

        $user->role_id = $request->input('role_id');
        $user->save();

        return redirect('/backstage')->with('success', 'El rol del usuario se actualizó correctamente.');
    }


    public function destroy(User $user)
    {
        //
    }
}
