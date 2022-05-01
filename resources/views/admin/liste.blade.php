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
                        <td> <a href = "{{route('admin.modForm',['id'=>$getname->id])}}">Modifier </a></td>
                        <td> <a href = "{{route('courssupForm',['id'=>$getname->id])}}">supprimer </a></td>
                    </tr>
                
                @endforeach
        </tbody>
    </table>
    {{$intitule ->links()}}
@endsection