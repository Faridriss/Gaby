@extends('modele')
@section('title', 'Liste des enseignants')
@section('contenu')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <h1>Liste des professeurs </h1>
    <table class = "center">
        <thead>
            <tr>
                <th>prenom</th>
                <th>nom</th>
                <th>type</th>
            </tr>
        </thead>
        <tbody>
                @foreach($nom as $getname)
                    <tr>
                        <td>{{$getname -> prenom}}</td>
                        <td>{{$getname -> nom}}</td>
                        <td>{{$getname -> type}}</td>
                        <td> <a href = "{{route('gest.associateprof',['id'=>$getname->id])}}">associer à un cours</a></td>
                        <td> <a href = "{{route('gest.detacheprof',['id'=>$getname->id])}}">détacher d'un cours</a></td>
                    </tr>
                
                @endforeach
        </tbody>
    </table>
@endsection