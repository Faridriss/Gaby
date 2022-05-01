@extends('modele')
@section('title', 'Liste des étudiants associés au cours')
@section('contenu')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <h1>Liste des Enseignants</h1>
    <table class = "center">
        <thead>
            <tr>
                <th>nom</th>
                <th>prénom</th>
            </tr>
        </thead>
        <tbody>
                @if(is_object($professeur)|| is_array($professeur))
                @foreach($professeur as $getname)
                    <tr>
                        <td>{{$getname -> nom}}</td>
                        <td>{{$getname -> prenom}}</td>
                    </tr>
                @endforeach
                @endif
        </tbody>
    </table>
@endsection