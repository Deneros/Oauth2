<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
   
    public function index()
    {
        $users = User::all();

        return view('users.index', compact('users'));
    }


 
  
    // public function editRole(User $user)
    // {
    //     // Obtener los roles disponibles desde tu modelo de roles
    //     $roles = Role::all();

    //     return view('users.edit_role', compact('user', 'roles'));
    // }


    public function update(Request $request, User $user)
    {
        
    }

 
    public function destroy(User $user)
    {
        //
    }
}
