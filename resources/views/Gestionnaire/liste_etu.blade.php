@extends('modele')
@section('title', 'Liste des étudiants')
@section('contenu')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <h1>Liste des Etudiants </h1>
    <table class = "center">
        <thead>
            <tr>
                <th>nom</th>
                <th>prénom</th>
                <th>numéro étudiant</th>
            </tr>
        </thead>
        <tbody>
                @foreach($nom as $getname)
                    <tr>
                        <td>{{$getname -> nom}}</td>
                        <td>{{$getname -> prenom}}</td>
                        <td>{{$getname -> noet}}</td>
                        <td> <a href = "{{route('gest.modForm',['id'=>$getname->id])}}">Modifier </a></td>
                        <td> <a href = "{{route('gest.associateetu',['id'=>$getname->id])}}">Associer à un cours</a></td>
                        <td> <a href = "{{route('gest.detacheetu',['id'=>$getname->id])}}">Détacher d'un cours</a></td>
                    </tr>
                @endforeach
        </tbody>
    </table>
    {{$nom ->links()}}
@endsection