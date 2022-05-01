@extends('modele')
@section('title', 'Liste des utilisateurs à valider')
@section('contenu')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <h1>Liste des utilisateurs à valider </h1>
    <table class = "center">
        <thead>
            <tr>
                <th>prenom</th>
                <th>nom</th>
            </tr>
        </thead>
        <tbody>
                @foreach($nom as $getname)
                    <tr>
                        <td>{{$getname -> prenom}}</td>
                        <td>{{$getname -> nom}}</td>
                        <td> <a href = "{{route('suppuser',['id'=>$getname->id])}}">supprimer</a></td>
                    </tr>
                
                @endforeach
        </tbody>
    </table>
@endsection