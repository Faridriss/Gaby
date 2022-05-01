<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cours extends Model
{
    use HasFactory;

    public $timestamps = true;
    
    public function etudiant()
    {
        return $this->belongsToMany(Etudiant::class,'cours_etudiants');
    }

    public function seance()
    {
        return $this->hasMany(Seance::class);
    }

    public function user()
    {
        return $this->belongsToMany(User::class,'cours_users');
    }
}
