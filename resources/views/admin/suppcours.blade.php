@extends('modele')
@section('title', 'Supprimer')
@section('contenu')
    <body>
    <p class= "texte" >Voulez vous supprimer le cours {{$login->login}} de la liste ? </p>
    <form action ="{{route('coursup',['id'=>$login->id])}}" method = "post">
        <input type ="submit" name = "Oui" value="Oui">
        <input type ="submit" name = "Non" value="Non">
        @csrf
    </form>
    </body>
@endsection