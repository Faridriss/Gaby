@extends('modele')
@section('title', 'Seance de cours')
@section('contenu')
    <form method="post">
        Date de début <input type="datetime-local" name="date_debut"  value="{{old('date_debut')}}">
        Date de fin  <input type="datetime-local" name="date_fin" value="{{old('date_fin')}}">
       
        <select class ="form-select-padding-y-lg" name="id" aria-label="Default select example">
            <option selected> Choisir un cours</option>
            @foreach($cours as $d)
            <option value= "{{$d->id}}">{{$d->intitule}}</option>
            @endforeach
        </select>
        <input type="submit" value="Modifier">
        @csrf
    </form>
@endsection