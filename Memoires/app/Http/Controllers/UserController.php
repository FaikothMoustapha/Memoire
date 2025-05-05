<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        $users=User::all();
        return view('admin.user.list')->with(compact('users'));
    }

    public function add()
        {
            $roles=Role::all();
            return view('admin.user.add')->with(compact('roles'));
            
        }
        public function store(Request $request)
        {
            // dd($request->all());
            $request->validate([
                'nom' => 'required|string|min:3',
                'prenom' => 'required|string|min:3',
               'email' =>'required|email|unique:users',
               'telephone' => 'required|string|min:10',
               'password' => 'required|string|min:4',
               
            ]);
           
            $users=new User;
            $users->nom=$request->nom;
            $users->prenom=$request->prenom;
            $users->email=$request->email;
            $users->telephone=$request->telephone;
            $users->statut=$request->statut;
            $users->password=$request->password;
            $users->role_id=$request->role_id;           
            $users->save();
            
                return redirect()->back()->with('success', 'Utilisateur ajouter avec succès');      
        }

}

