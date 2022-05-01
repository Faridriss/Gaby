@extends('modele')

@section('contenu')
    <p>Page d' accueil du Gestionnaire.</p>
    <a href = "{{route('etu.liste')}}">Liste des étudiants </a>
    <a href = "{{route('gest.createForm')}}">Ajouter un étudiant</a>
    <a href = "{{route('gest.seance')}}">Ajouter une séance</a>
    <a href = "{{route('gest.listecours')}}">Liste des cours</a>
    <a href = "{{route('gest.listeprof')}}">Liste des enseignants</a>
    <a href = "{{route('seanceliste')}}">Liste des séances</a>


@endsection
