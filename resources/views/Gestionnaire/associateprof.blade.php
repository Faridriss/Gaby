@extends('modele')
@section('title', 'Seance de cours')
@section('contenu')
    <form method="post">
        <input type="hidden" name="etuid" value="{{$prof-> id}}">      
        <select class ="form-select-padding-y-lg" name="id" aria-label="Default select example">
            <option selected> Choisir un cours</option>
            @foreach($cours as $d)
            <option value= "{{$d->id}}">{{$d->intitule}}</option>
            @endforeach
        </select>
        <input type="submit" value="Associer">
        @csrf
    </form>
@endsection