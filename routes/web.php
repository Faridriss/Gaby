<?php

use App\Http\Controllers\AuthenticatedSessionController;
use App\Http\Controllers\GestController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\RegisterUserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[AdminController::class,'home'])->name('home');

Route::view('/home','home')->middleware('auth');

Route::view('/admin','admin.admin_home')->middleware('auth')->middleware('is_admin')->name('admin.home');

Route::view('/enseignant','enseignant.homeprof')->middleware('auth')->middleware('is_prof')->name('prof.home');

Route::view('/gestionnaire','Gestionnaire.gest_home')->middleware('auth')->middleware('is_gest')->name('gest.home');



Route::get('/login', [AuthenticatedSessionController::class,'showForm'])
    ->name('login');
Route::post('/login', [AuthenticatedSessionController::class,'login']);
Route::get('/logout', [AuthenticatedSessionController::class,'logout'])
    ->name('logout')->middleware('auth');

Route::get('/register', [RegisterUserController::class,'showForm'])
    ->name('register');
Route::post('/register', [RegisterUserController::class,'store']);


//ajout Cours 
Route::get('/admin/create', [AdminController::class, 'createForm'])->middleware('is_admin')->name('cours.createForm');
Route::post('/admin/create', [AdminController::class, 'create'])->name('cours.create');

//ajout Etudiant 
Route::get('/gest/create', [GestController::class, 'createFormGest'])->middleware('is_gest')->name('gest.createForm');
Route::post('/gest/create', [GestController::class, 'createEtudiant'])->name('gest.create');

//liste des étudiants
Route::get('/étudiants',[GestController::class, 'afficheetu'])->name('etu.liste');

//liste séances
Route::get('/séance',[GestController::class, 'afficheseance'])->middleware('is_gest')->name('seanceliste');

//modifier une séance 
Route::get('/seance/{id}/modify', [GestController::class, 'modifyFormseance'])->middleware('is_gest')->name('modFormseance');
Route::post('/seance/{id}/modify', [GestController::class, 'modifyseance'])->middleware('is_gest')->name('modseance');

//ajout Seance 
Route::get('/gest/createseance', [GestController::class, 'createFormSeance'])->middleware('is_gest')->name('gest.seance');
Route::post('/gest/createseance', [GestController::class, 'createSeance'])->name('gest.create');

//ajout association
Route::get('/gest/{id}/associateetu', [GestController::class, 'AssociateForm'])->middleware('is_gest')->name('gest.associateetu');
Route::post('/gest/{id}/associateetu', [GestController::class, 'Associate'])->name('gest.associate');

//modifier un etudiant
Route::get('/etu/{id}/modify', [GestController::class, 'modifyFormEtu'])->middleware('is_gest')->name('gest.modForm');
Route::post('/etu/{id}/modify', [GestController::class, 'modifyEtu'])->middleware('is_gest')->name('gest.mod');

//liste des étudiants associés à un cours
Route::get('/cours/{id}/etudiant',[GestController::class, 'listeEtuCours'])->name('gest.etuasso');

//liste des cours associés à un professeur
Route::get('/cours/prof',[ProfController::class, 'profcours'])->name('profassociate');

//liste des séances associés à un cours
Route::get('/cours/{id}/seance',[GestController::class, 'listeseanceCours'])->name('gest.seanceasso');

//Suppresion seance
Route::get('/seance/{id}/suppression',[GestController::class, 'supprimerseanceFormulaire'])->middleware('is_admin')->name('seance.suppForm');
Route::post('/seance/{id}/suppression',[GestController::class, 'supprimerseance'])->middleware('is_admin')->name('seance.supp');

//liste des cours pour le gestionnaire
Route::get('/listecours',[GestController::class, 'affichecours'])->name('gest.listecours');

//liste des enseignants pour le gestionnaire
Route::get('/listeprof',[GestController::class, 'afficheprof'])->name('gest.listeprof');

//liste des users à valider
Route::get('/listevalide',[AdminController::class, 'affichevalide'])->name('adminvalide');

//detachement cours etudiant
Route::get('/gest/{id}/detacheetu', [GestController::class, 'DetacheForm'])->middleware('is_gest')->name('gest.detacheetu');
Route::post('/gest/{id}/detacheetu', [GestController::class, 'Detache'])->name('gest.detache');


//ajout association prof/cours
Route::get('/gest/{id}/associateprof', [GestController::class, 'AssociateprofForm'])->middleware('is_gest')->name('gest.associateprof');
Route::post('/gest/{id}/associateprof', [GestController::class, 'Associateprof'])->name('gest.association');

//liste des enseignants associés à un cours
Route::get('/cours/{id}/prof',[GestController::class, 'listeprofCours'])->name('gest.profasso');

//detachement cours/enseignant
Route::get('/gest/{id}/detacheprof', [GestController::class, 'DetacheprofForm'])->middleware('is_gest')->name('gest.detacheprof');
Route::post('/gest/{id}/detacheprof', [GestController::class, 'Detacheprof'])->name('gest.detachement');


//liste des cours pour l'admin
Route::get('/cours',[AdminController::class, 'affichecours'])->name('user.liste');
//modifier une cours
Route::get('/cours/{id}/modify', [AdminController::class, 'modifyForm'])->middleware('is_admin')->name('admin.modForm');
Route::post('/cours/{id}/modify', [AdminController::class, 'modify'])->middleware('is_admin')->name('nom.mod');

//liste user admin 
Route::get('/userlist',[AdminController::class, 'afficheuser'])->middleware('is_admin')->name('adminUser.liste');
//Suppresion user admin 
Route::get('/user/{id}/suppression',[AdminController::class, 'supprimerFormulaire'])->middleware('is_admin')->name('suppuser');
Route::post('/user/{id}/suppression',[AdminController::class, 'supprimer'])->middleware('is_admin')->name('user.supp');
//suppression cours admin
Route::get('/cours/{id}/suppression',[AdminController::class, 'supprimercoursFormulaire'])->middleware('is_admin')->name('courssupForm');
Route::post('/cours/{id}/suppression',[AdminController::class, 'supprimercours'])->middleware('is_admin')->name('coursup');



//modification mdp
Route::get('/register/changemdp', [RegisterUserController::class,'modifymdpForm'])->name('mdp_change');
Route::post('/register/changemdp', [RegisterUserController::class,'modifyMDP']);

//Route pour le panier 
Route::get('/user/list/{id}/cart',[AdminController::class,'addcart'])->name('cart');
Route::post('/user/list/{id}/cart',[AdminController::class,'addcart']);

//route pour ajouter un admin
Route::get('/admin/createadmin', [RegisterUserController::class, 'showForm'])->middleware('is_admin')->name('adminregister');
Route::post('/admin/createadmin', [RegisterUserController::class, 'storenewadmin'])->middleware('is_admin');
//route pour ajouter un gestionnaire
Route::get('/admin/creategestionnaire', [RegisterUserController::class, 'showForm'])->name('gestionnaireregister')->middleware('is_admin');
Route::post('/admin/creategestionnaire', [RegisterUserController::class, 'storenewgestionnaire'])->middleware('is_admin');

//route pour ajouter un enseignant 
Route::get('/admin/createenseignant', [RegisterUserController::class, 'showForm'])->name('enseignantregister')->middleware('is_admin');
Route::post('/admin/createenseignant', [RegisterUserController::class, 'storenewenseignant'])->middleware('is_admin');