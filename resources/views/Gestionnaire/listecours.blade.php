@extends('modele')
@section('title', 'Liste des Cours')
@section('contenu')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <h1>Liste des cours </h1>
    <table class = "center">
        <thead>
            <tr>
                <th>intitulé</th>
                <th>créé à</th>
                <th>mis à jour le</th>
            </tr>
        </thead>
        <tbody>
                @foreach($intitule as $getname)
                    <tr>
                        <td>{{$getname -> intitule}}</td>
                        <td>{{$getname -> created_at}}</td>
                        <td>{{$getname -> updated_at}}</td>
                        <td> <a href = "{{route('gest.etuasso',['id'=>$getname->id])}}">Liste des étudiants associés </a></td>
                        <td> <a href = "{{route('gest.profasso',['id'=>$getname->id])}}">Liste des enseignants associés </a></td>
                        <td> <a href = "{{route('gest.seanceasso',['id'=>$getname->id])}}">Liste des séances associés </a></td>
                        
                    </tr>
                
                @endforeach
        </tbody>
    </table>
    {{$intitule ->links()}}
@endsection