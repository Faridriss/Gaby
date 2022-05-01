@extends('modele')
@section('title', 'Liste des séances')
@section('contenu')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <h1>Liste des Séances </h1>
    <table class = "center">
        <thead>
            <tr>
                <th>id</th>
                <th>date de début</th>
                <th>fin</th>
            </tr>
        </thead>
        <tbody>
                @foreach($nom as $getname)
                    <tr>
                        <td>{{$getname -> cours_id}}</td>
                        <td>{{$getname -> date_debut}}</td>
                        <td>{{$getname -> date_fin}}</td>
                        <td> <a href = "{{route('seance.suppForm',['id'=>$getname->id])}}">supprimer </a></td>
                        <td> <a href = "{{route('modFormseance',['id'=>$getname->id])}}">modifier </a></td>
                    </tr>
                @endforeach
        </tbody>
    </table>
    {{$nom ->links()}}
@endsection