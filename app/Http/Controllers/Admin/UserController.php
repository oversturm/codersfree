<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:Leer usuarios')->only('index');
        $this->middleware('can:Editar usuarios')->only('edit', 'update');
    }

    public function index()
    {
        return view('admin.users.index');
    }


    public function edit(User $user)
    {
        $roles = Role::all();

        return view('admin.users.edit',compact('user', 'roles'));
    }


    public function update(Request $request, User $user)
    {
        //Accedemos registro usuario
        //Pedimos recurperar relacion roles
        //Que nos sincronice con los roles que estoy mandando por el formulario
        //Para eso le pasamos el objeto request y acedemos a la informacion de roles
        $user->roles()->sync($request->roles);
        //retornamos redirecionando a la la vista edit con el registro user
        return redirect()->route('admin.users.edit', $user);
    }



}
