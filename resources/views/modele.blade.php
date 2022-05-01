<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>@yield('title')</title>
</head>

<body>
    @section('menu')
    @if( session()->has('etat'))
    <div class="alert alert-info alert-dismissible fade show" role="alert">
        {{session()->get('etat')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif

        <a href="{{route('home')}}">Home</a>
    
    @guest()
    <a href="{{route('login')}}">Se connecter</a>
    <a href="{{route('register')}}">Créer un compte</a>
    @endguest

    @auth
    <a href="{{route('mdp_change')}}">Modification du compte</a>
    <a href="{{route('logout')}}">Deconnexion</a>
    @endauth
    @auth
    <a href="{{route('admin.home')}}">Acceuil admin</a>
    <a href="{{route('gest.home')}}">Acceuil Gestionnaire</a>
    <a href="{{route('prof.home')}}">Acceuil enseignant</a>

    @endauth

    @show

    @if ($errors->any())
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif


    @yield('contenu')
</body>

</html>