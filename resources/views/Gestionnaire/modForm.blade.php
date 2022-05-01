@extends('modele')
@section('title', 'Modification')
@section('contenu')
    <form action="" method="post">
        Nom: <input type="text" name="nom" value="{{old('nom')}}">
        Prénom: <input type="text" name="prenom" value="{{old('prenom')}}">
        Numéro étudiant: <input type="text" name="noet" value="{{old('noet')}}">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection