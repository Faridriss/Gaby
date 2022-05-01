<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use App\Models\Etudiant;
use App\Models\Seance;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function affichecours()
    {
        $getname = Cours::paginate(3);
        return view('admin.liste',['intitule' => $getname]);
    }
//fonction allant vers le formulaire d'ajout 
    public function createForm()
    {
        return view('admin.create_view');
    }
//fonction permettant de rajouter un cours dans la liste
    public function create(Request $requete)
    {
        $validated = $requete->validate([
        'intitule' => 'required|string|max:40',
        ]);
        $cours = new Cours();
        $cours->intitule = $validated['intitule'];

        $cours->save();
        $requete->session()->flash('status', 'Ajout réussi');
        return redirect()->route('home');
    }
//Fonction récupérant le cours et retournant la vue du formulaire de modification 
    public function modifyForm($id)
    {
        $p = Cours::findOrFail($id);
        return view('admin.modForm',['nom'=>$p]);
    }
//Fonction permettant de modifier un cours 
    public function modify(Request $requete, $id)
    {
        $p = Cours::findOrFail($id);

        $validated = $requete->validate([
        'intitule' => 'required|alpha|max:40',
        ]);

        $p->intitule = $validated['intitule'];
        $p->save();
        $requete->session()->flash('status', 'Modification réussie');
        return redirect()->route('home');
    }

    //affiche la liste des utilisateurs 
    public function afficheuser()
    {
        $getname = User::paginate(3);
        return view('admin.user_list',['login' => $getname]);
    }

    //fonction prenant l'id de la personne que l'on veut supprimer et nous renvoie vers un formulaire 
    public function supprimerFormulaire($id)
    {
        $p = User::findOrFail($id);
        return view('admin.suppForm',['login'=>$p]);
    }
    //fonction permettant de supprimer un user
    public function supprimer (Request $requete, $id)
    {
        $p = User::findOrFail($id);

        if($requete -> has('Oui'))
        {
            $p->cours()->detach();
            $p -> delete();
            //si la suppression s'effectue on renvoie un message pour le confirmer
            $requete ->session()->flash('status','Suppression réussie');
        }
        else
        {
            //sinon on renvoie un message pour dire que l'action a été annulée
            $requete ->session()->flash('status','Suppression non aboutie');
        } 
        return redirect()->route('home');
    }

    public function supprimercoursFormulaire($id)
    {
        $p = Cours::findOrFail($id);
        return view('admin.suppcours',['login'=>$p]);
    }
    //fonction permettant de supprimer un cours
    public function supprimercours (Request $requete, $id)
    {
        $c = Cours::findOrFail($id);

        if($requete -> has('Oui'))
        {
            $c -> etudiants() -> detach();
            $c -> users() -> detach();
            $seances = $c -> seances;
            foreach ($seances as $s){
                $seance = Seance::findOrFail($s -> id);
                $presents = $seance -> etudiants;
                foreach ($presents as $present){
                    $etu = Etudiant::findOrFail($present -> id);
                    $seance -> etudiants() -> detach($etu -> id);
                }
            $seance -> cours() -> dissociate();
        }
        $c -> seances() -> delete();
        $c-> delete();

            //si la suppression s'effectue on renvoie un message pour le confirmer
            $requete ->session()->flash('status','Suppression réussie');
        }
        else
        {
            //sinon on renvoie un message pour dire que l'action a été annulée
            $requete ->session()->flash('status','Suppression non aboutie');
        } 
        return redirect()->route('home');
    }

    public function affichevalide()
    {
        $getname = User::where('type','=',NULL)->get();
        return view('admin.listevalide',['nom' => $getname]);
    }
    
}