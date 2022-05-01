@extends('modele')
@section('title', 'Supprimer')
@section('contenu')
    <body>
    <p class= "texte" >Voulez vous supprimer la personne {{$login->login}} de la liste ? </p>
    <form action ="{{route('user.supp',['id'=>$login->id])}}" method = "post">
        <input type ="submit" name = "Oui" value="Oui">
        <input type ="submit" name = "Non" value="Non">
        @csrf
    </form>
    </body>
@endsection