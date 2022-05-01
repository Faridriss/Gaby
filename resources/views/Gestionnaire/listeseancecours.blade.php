@extends('modele')
@section('title', 'Liste des étudiants associés au cours')
@section('contenu')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <h1>Liste des Séances</h1>
    <table class = "center">
        <thead>
            <tr>
                <th>id</th>
                <th>date début</th>
                <th>date date fin </th>
            </tr>
        </thead>
        <tbody>
                @if(is_object($seance)|| is_array($seance))
                @foreach($seance as $getname)
                    <tr>
                        <td>{{$getname -> id}}</td>
                        <td>{{$getname -> date_debut}}</td>
                        <td>{{$getname -> date_fin}}</td>
                    </tr>
                @endforeach
                @endif
        </tbody>
    </table>

@endsection