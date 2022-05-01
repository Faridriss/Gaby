@extends('modele')
@section('title', 'Modification')
@section('contenu')
    <form method="post">
        Nouveau nom <input type="text" name="nom"  value="{{$user->nom}}">
        Nouveau prenom <input type="text" name="prenom" value="{{$user->nom}}">
        Nouveau mdp <input type="password" name="mdp">
        Confirmation mdp <input type="password" name="mdp_confirmation">
        <input type="submit" value="Modifier">
        @csrf
    </form>
@endsection