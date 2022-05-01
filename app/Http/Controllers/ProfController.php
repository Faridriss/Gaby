<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use App\Http\Controllers\Controller;
use App\Models\Cours;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\IsProf;

class ProfController extends Controller
{
    public function profcours()
    {
        $user = Auth::user();
        $cours = $user->cours;
        return view('enseignant.asso', ['cours' => $cours, 'user' => $user]);
    } 

    public function inscritCours()
    {

    }
}