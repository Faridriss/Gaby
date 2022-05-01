@extends('modele')
@section('title', 'Liste des utilisateurs')
@section('contenu')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <h1>Liste des utilisateurs </h1>
    <table class = "center">
        <thead>
            <tr>
                <th>id</th>
                <th>login</th>
                <th>type</th>
            </tr>
        </thead>
        <tbody>
                @foreach($login as $getname)
                    <tr>
                        <td>{{$getname -> id}}</td>
                        <td>{{$getname -> login}}</td>
                        <td>{{$getname -> type}}</td>
                         <td> <a href = "{{route('suppuser',['id'=>$getname->id])}}">supprimer</a></td>
                    </tr>
                
                @endforeach
        </tbody>
    </table>
    <a href = "{{route('adminregister')}}">ajouter un admin</a>
    <a href = "{{route('gestionnaireregister')}}">ajouter un gestionnaire</a>
    <a href = "{{route('enseignantregister')}}">ajouter un enseignant</a>
    
    {{$login ->links()}}
@endsection