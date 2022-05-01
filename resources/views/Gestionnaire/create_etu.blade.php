@extends('modele')
@section('title', 'Ajout étudiant')
@section('contenu')
    <style>
            input[type=text], select {
                width: 100%;
                padding: 12px 20px;
                margin: 8px 0;
                display: inline-block;
                border: 1px solid #ccc;
                border-radius: 4px;
                box-sizing: border-box;
            }

        input[type=submit] {
            width: 100%;
            background-color: #4CAF50;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type=submit]:hover {
            background-color: #45a049;
        }

        div {
            border-radius: 5px;
            background-color: #f2f2f2;
            padding: 20px;
        }
    </style>
    @if( session()->has('status'))
        <p class="etat">{{session()->get('status')}}</p>
    @endif

    <form action="" method="post">
        Nom: <input type="text" name="nom" value="{{old('nom')}}">
        Prénom: <input type="text" name="prenom" value="{{old('prenom')}}">
        Numéro étudiant: <input type="text" name="noet" value="{{old('noet')}}">
        <input type="submit" value="Envoyer">
        @csrf
    </form>
@endsection