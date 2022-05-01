<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory;

    public $timestamps = false;

    protected $hidden = ['mdp'];

    protected $fillable = ['nom','prenom','login', 'mdp', 'type'];

    protected $attributes = [
        'type' => 'user'
    ];


     public function getAuthPassword(){
        return $this->mdp;
    }

    public function isAdmin(){
         return $this->type == 'admin';
    }

    public function isgest()
    {
        return $this->type == 'gestionnaire';
    }

    public function isProf()
    {
        return $this->type == 'enseignant';
    }


    public function cours()
    {
        return $this->belongsToMany(Cours::class, 'cours_users');
    }
}
