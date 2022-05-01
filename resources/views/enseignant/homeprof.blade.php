@extends('modele')

@section('contenu')
    <p>Page d' accueil de l'enseignant.</p>
    <a href = "{{route('profassociate')}}">Liste des cours associés</a>
    <a href = "{{route('gest.createForm')}}">Liste des inscrits dans un cours</a>

@endsection