@extends('modele')
@section('title', 'Modification')
@section('contenu')
    <form action="" method="post">
        Intitule: <input type="text" name="intitule" value="{{$nom->intitule}}">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection