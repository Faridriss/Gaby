@extends('modele')
@section('title', 'Liste des Cours')
@section('contenu')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <h1>Liste des cours associés </h1>
    <table class = "center">
        <thead>
            <tr>
                <th>intitulé</th>

            </tr>
        </thead>
        <tbody>
                @foreach($cours as $getname)
                    <tr>
                        <td>{{$getname -> intitule}}</td>
                    </tr>
                
                @endforeach
        </tbody>
    </table>
@endsection