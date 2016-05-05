

@extends('layouts.principal')


@section('titre','Inscription')





@section('contenu')
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="panel-title">
                Inscription
            </div>
        </div>
        <div class="panel-body">
            <form action="{{url('/auth/register')}}" method="post">

                {!! csrf_field() !!}
                <div class="form-group">
                    <label for="nom">Nom</label>
                    <input type="text" id="nom" class="form-control" value="{{old('nom')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" class="form-control" value="{{old('email')}}">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" id="password" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="password_confirm">Confirmation du mot de passe</label>
                    <input type="password" id="password_confirm" class="form-control" >


                    <button class="btn btn-primary" type="submit">Envoyer</button>
            </form>

        </div>
    </div>

@stop


