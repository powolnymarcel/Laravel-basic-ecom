<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield(('titre'))</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-2.2.3.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="{{url('css/style.css')}}">

</head>

<body>

<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Ecom</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class=""><a href="{{url('/')}}">Accueil</a></li>
                <li><a href="{{url('creation')}}">Ajouter</a></li>
            </ul>


            <ul class="nav navbar-nav navbar-right">
                @if(Auth::guest())
                <li class=""><a href="{{url('/auth/login')}}">Connexion</a></li>
                <li><a href="{{url('/auth/register')}}">Inscription</a></li>
                @else
                <li><a href="{{url('/auth/logout')}}">Deconnexion</a></li>
                @endif
            </ul>


        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    <div class="row">
        <div class="col-md-3">
            @section('sidebar')
                sidebar
            @show
        </div>
        <div class="col-md-9">
           @if(Session::has('message'))
               <div class="alert alert-info">
                   {{Session::get('message')}}
               </div>
               @endif
            @foreach($errors->all() as $erreur)
                <div class="alert alert-danger">
                    {{$erreur}}
                </div>
                @endforeach
            @yield('contenu')
        </div>
    </div>

</div>

</body>
</html>
