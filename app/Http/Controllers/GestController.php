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

class GestController extends Controller
{
    public function afficheetu()
    {
        $getname = Etudiant::paginate(3);
        return view('Gestionnaire.liste_etu',['nom' => $getname]);
    }

    //fonction allant vers le formulaire d'ajout 
    public function createFormGest()
    {
        return view('Gestionnaire.create_etu');
    }
//fonction permettant de rajouter un cours dans la liste
    public function createEtudiant(Request $requete)
    {
        $validated = $requete->validate([
        'nom' => 'required|string|max:40',
        'prenom' => 'required|string|max:40',
        'noet' => 'bail|required|integer|gte:0|lte:9999',
        ]);
        $etu = new Etudiant();
        $etu->nom = $validated['nom'];
        $etu->prenom = $validated['prenom'];
        $etu->noet = $validated['noet'];
        $etu->save();
        $requete->session()->flash('status', 'Ajout réussi');
        return redirect()->route('home');
    }

    //Fonction récupérant l'etudiant et retournant la vue du formulaire de modification 
    public function modifyFormEtu($id)
    {
        $p = Etudiant::findOrFail($id);
        return view('Gestionnaire.modForm',['nom'=>$p]);
    }
//Fonction permettant de modifier un etudiant 
    public function modifyEtu(Request $requete, $id)
    {
        $p = Etudiant::findOrFail($id);

        $validated = $requete->validate([
        'nom' => 'required|alpha|max:40',
        'prenom' => 'required|alpha|max:40',
        'noet' => 'bail|required|integer|gte:0|lte:99999999',
        ]);

        $p->nom = $validated['nom'];
        $p->prenom = $validated['prenom'];
        $p->noet = $validated['noet'];
        $p->save();
        $requete->session()->flash('status', 'Modification réussie');
        return redirect()->route('home');
    }

    //fonction allant vers le formulaire d'ajout 
    public function createFormSeance()
    {
        $p = Cours::all();
        return view('Gestionnaire.seance',['cours'=>$p]);
    }
    //fonction permettant de rajouter un cours dans la liste
    public function createSeance(Request $requete)
    {
        $validated = $requete->validate([
        'date_debut' => 'required|date',
        'date_fin' => 'required|date',
        'id' => 'required',
        ]);

        $s = new Seance();
        $s->date_debut = $validated['date_debut'];
        $s->date_fin = $validated['date_fin'];
        $s->cours_id = $validated['id'];
        $s->save();
        $requete->session()->flash('status', 'Ajout réussi');
        return redirect()->route('home');
    }

    //fonction allant vers le formulaire d'association
    public function AssociateForm($id)
    {
        $p = Cours::all();
        $etu = Etudiant::findOrFail($id);
        return view('Gestionnaire.Associate',['cours'=>$p,'etu'=>$etu]);
    }
    //fonction permettant de rajouter un cours dans la liste
    public function Associate(Request $requete)
    {
        $validated = $requete->validate([
        'id' => 'required',
        'etuid' => '',
        ]);

        $s= Cours::findOrFail($validated['id']);
        $etu = Etudiant::findOrFail($validated['etuid']);
        $etu->cours()->attach($validated['id']);
        $etu->save();
        $requete->session()->flash('status', 'Association réussi');
        return redirect()->route('home');
    }

    public function affichecours()
    {
        $getname = Cours::paginate(3);
        return view('Gestionnaire.listecours',['intitule' => $getname]);
    }

    public function listeEtuCours($id)
    {
        $c = Cours::findOrFail($id);
        $e = $c->etudiant;
        return view('Gestionnaire.listecoursetu',['cours'=>$c,'etudiant'=>$e]);
    }

    //fonction allant vers le formulaire de détachement
    public function DetacheForm($id)
    {
        $etu = Etudiant::findOrFail($id);
        $p = $etu->cours;
        return view('Gestionnaire.Detache',['cours'=>$p,'etu'=>$etu]);
    }

    //fonction permettant de détacher un cours par rapport à un étudiant 
    public function detache(Request $requete)
    {
        $validated = $requete->validate([
        'id' => 'required',
        'etuid' => '',
        ]);

        $s= Cours::findOrFail($validated['id']);
        $etu = Etudiant::findOrFail($validated['etuid']);
        $s->etudiant()->detach($validated['etuid']);
        $etu->save();
        $requete->session()->flash('status', 'Détachement réussi');
        return redirect()->route('home');
    }

    public function afficheprof()
    {
        $getname = User::where('type','=','enseignant')->get();
        return view('Gestionnaire.listeprof',['nom' => $getname]);
    }

    //fonction allant vers le formulaire d'association
    public function AssociateprofForm($id)
    {
        $p = Cours::all();
        $prof = User::findOrFail($id);
        return view('Gestionnaire.associateprof',['cours'=>$p,'prof'=>$prof]);
    }
    //fonction permettant de rajouter un prof dans la liste
    public function Associateprof(Request $requete)
    {
        $validated = $requete->validate([
        'id' => 'required',
        'etuid' => '',
        ]);

        $s= Cours::findOrFail($validated['id']);
        $prof = User::findOrFail($validated['etuid']);
        $prof->cours()->attach($validated['id']);
        $prof->save();
        $requete->session()->flash('status', 'Association réussi');
        return redirect()->route('home');
    }
    //liste des professeurs associés à un cours
    public function listeprofCours($id)
    {
        $c = Cours::findOrFail($id);
        $e = $c->user;
        return view('Gestionnaire.listecoursprof',['cours'=>$c,'professeur'=>$e]);
    }

    //fonction allant vers le formulaire de détachement
    public function DetacheprofForm($id)
    {
        $etu = User::findOrFail($id);
        $p = $etu->cours;
        return view('Gestionnaire.Detache',['cours'=>$p,'etu'=>$etu]);
    }

    //fonction permettant de détacher un cours par rapport à un professeur 
    public function detacheprof(Request $requete)
    {
        $validated = $requete->validate([
        'id' => 'required',
        'etuid' => '',
        ]);

        $s= Cours::findOrFail($validated['id']);
        $prof = User::findOrFail($validated['etuid']);
        $s->user()->detach($validated['etuid']);
        $prof->save();
        $requete->session()->flash('status', 'Détachement réussi');
        return redirect()->route('home');
    }

    public function afficheseance()
    {
        $getname = Seance::paginate(3);
        return view('Gestionnaire.liste_seance',['nom' => $getname]);
    }

    //Fonction récupérant l'etudiant et retournant la vue du formulaire de modification 
    public function modifyFormseance($id)
    {
        $p = Seance::findOrFail($id);
        $c = Cours::all();
        return view('Gestionnaire.modseance',['seance'=>$p,'cours'=>$c]);
    }
//Fonction permettant de modifier un etudiant 
    public function modifyseance(Request $requete, $id)
    {
        $p = Seance::findOrFail($id);

        $validated = $requete->validate([
        'id' => 'required',
        'date_debut' => 'required|date',
        'date_fin' => 'required|date',
        ]);

        $p->date_debut = $validated['date_debut'];
        $p->date_fin = $validated['date_fin'];
        $p->cours_id = $validated['id'];
        $p->save();
        $requete->session()->flash('status', 'Modification réussie');
        return redirect()->route('home');
    }

    public function supprimerseanceFormulaire($id)
    {
        $p = Cours::findOrFail($id);
        return view('Gestionnaire.suppseance',['login'=>$p]);
    }
    //fonction permettant de supprimer une séance
    public function supprimerseance (Request $requete, $id)
    {
        $s = Seance::findOrFail($id);

        if($requete -> has('Oui'))
        {
            $s->etudiants()->detach();
            $s->cours()->dissociate();
            $s->delete();
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

    //liste des seances associés à un cours
    public function listeseanceCours($id)//pagination à faire
    {
        $c = Cours::findOrFail($id);
        $s = $c->seance;
        return view('Gestionnaire.listeseancecours',['cours'=>$c,'seance'=>$s]);
    }

    public function supprimeretudiantFormulaire($id)
    {
        $p = Etudiant::findOrFail($id);
        return view('',['login'=>$p]);
    }
    //fonction permettant de supprimer un étudiant
    public function supprimeretudiant (Request $requete, $id)
    {
        $s = Seance::findOrFail($id);

        if($requete -> has('Oui'))
        {
            $s->seance()->dissociate();
            $s->cours()->detach();
            $s->delete();
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
}