@extends('modele')

@section('contenu')
    <p>Page d' accueil admin.</p>
    <a href = "{{route('user.liste')}}">Liste des Cours</a>
    <a href = "{{route('cours.createForm')}}">Ajouter un Cours</a>
    <a href = "{{route('adminUser.liste')}}">Liste des Utilisateurs</a>
     <a href = "{{route('adminvalide')}}">Liste des Utilisateurs à vérifier</a>
@endsection
