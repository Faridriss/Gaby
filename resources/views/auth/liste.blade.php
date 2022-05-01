@extends('modele')
@section('title', 'Liste des pizzas')
@section('contenu')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl"
    crossorigin="anonymous">
    <h1>Liste des pizzas </h1>
    <table class = "center">
        <thead>
            <tr>
                <th>nom</th>
                <th>description</th>
                <th>prix</th>
            </tr>
        </thead>
        <tbody>
                @foreach($nom as $getname)
                    <tr>
                        <td>{{$getname -> nom}}</td>
                        <td>{{$getname -> description}}</td>
                        <td>{{$getname -> prix}}</td>
                        <td><a href = "{{route('cart',['id'=>$getname->id])}}">ajouter au panier</td>
                    </tr>
                
                @endforeach
        </tbody>
    </table>
    <a href = "{{route('admin.modForm',['id'=>$getname->id])}}">panier</td>
    {{$nom ->links()}}
@endsection