

@extends('layouts.principal')


@section('titre','Inscription')





@section('contenu')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Connexion
            </div>
        </div>
        <div class="panel-body">
            <form action="{{url('/auth/login')}}" method="post">

                {!! csrf_field() !!}

                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control" value="{{old('email')}}">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password"  name="password" id="password" class="form-control" >
                </div>



                    <button class="btn btn-primary" type="submit">Login</button>
            </form>

        </div>
    </div>

@stop


