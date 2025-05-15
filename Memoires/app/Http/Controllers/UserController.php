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


        public function edit($id)
    {
        // c'est pour recuper les
        // dd($id);
        
        $roles=Role::all();
        $users=User::findOrFail($id);
        
        // dd($roles);
        return view('admin.user.edit')->with(compact('users','roles'));
    }

    public function update(Request $request,$id)
    {
        $request->validate([
            'nom' => 'required|string|min:3',
            'prenom' => 'required|string|min:3',
            'telephone' => 'required|string|min:10',
            'password' => 'required|string|min:4',
        ]);
        $users=User::findOrFail($id);
    //    dd($request->id);
        $users->nom=$request->nom;
        $users->prenom=$request->prenom;
        $users->email=$request->email;
        $users->telephone=$request->telephone;
        $users->statut=$request->statut;
        $users->password=$request->password;
        $users->role_id=$request->role_id;           
        $users->save();
       return redirect()->route('list_user')->with('success', 'Utilisateur ajouter avec succès');  
    }

    public function show($id)
   {
    //  dd($id);
     $roles=Role::all();
     $users=User::findOrFail($id);
     
     // dd($stagiaires);
     return view('admin.user.show')->with(compact('users','roles'));
 
   }
    public function delete($id)
   {
       // Trouver le stagiaire par son ID
      
       $roles=Role::all();
       $users = User::findOrFail($id);
       
       if ($users) {
           // Supprimer le stagiaire
           $users->delete();
           return redirect()->route('list_user')->with('success', 'Utilisateur supprimer avec succes'); 
       }
   }


public function toggleStatus($id) {
    $user = User::find($id);

    if (!$user) {
        return response()->json([
            'statut' => 'Erreur',
            'message' => 'Utilisateur non trouvé !'
        ], 404);
    }

    $user->statut = $user->statut === 'Actif' ? 'Inactif' : 'Actif';
    $user->save();

    return response()->json([
        'statut' => $user->statut,
        'message' => 'Statut mis à jour avec succès !'
    ]);
}

}

