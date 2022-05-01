<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function showForm(){
        return view('auth.register');
    }
    //fonction créant un nouvel utilisateur
    public function store(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'mdp' => 'required|string|confirmed'
        ]);

        $user = new User();
        $user->login = $request->login;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->type = NULL;
        $user->mdp = Hash::make($request->mdp);
        $user->save();
   
        session()->flash('etat','User added');
 
        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
    //fonction créant un nouvel admin 
    public function storenewadmin(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'mdp' => 'required|string|confirmed'
        ]);

        $user = new User();
        $user->type = 'admin';
        $user->login = $request->login;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->mdp = Hash::make($request->mdp);
        $user->save();
   
        session()->flash('etat','User added');
 


        return redirect(RouteServiceProvider::HOME);
    }
    //fonction créant un nouveau gestionnaire
    public function storenewgestionnaire(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'mdp' => 'required|string|confirmed'
        ]);

        $user = new User();
        $user->login = $request->login;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->type = 'gestionnaire';
        $user->mdp = Hash::make($request->mdp);
        $user->save();
   
        session()->flash('etat','User added');
 


        return redirect(RouteServiceProvider::HOME);
    }

    public function storenewenseignant(Request $request){
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'login' => 'required|string|max:255|unique:users',
            'mdp' => 'required|string|confirmed'
        ]);

        $user = new User();
        $user->type = 'enseignant';
        $user->login = $request->login;
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->mdp = Hash::make($request->mdp);
        $user->save();
   
        session()->flash('etat','User added');
 


        return redirect(RouteServiceProvider::HOME);
    }

    //Fonction récupérant un utilisateur 
    public function modifymdpForm()
    {
        $user = Auth::user();
        return view('auth.modmdpForm',['user'=>$user]);
    }

    //fonction pour modifier les informations de son compte 
    public function modifyMDP(Request $request)
    {
        $request->validate([
            'nom' => 'required|string|max:40',
            'prenom' => 'required|string|max:40',
            'mdp' => 'required|string|confirmed'
        ]);

        $user = Auth::user(); // on récupere les infos de l'user déjà connecté
        $user->nom = $request->nom;
        $user->prenom = $request->prenom;
        $user->mdp = Hash::make($request->mdp);
        $user->save();

        session()->flash('etat', 'données de l`utilisateur modifié');

        return redirect(RouteServiceProvider::HOME);
    }
}