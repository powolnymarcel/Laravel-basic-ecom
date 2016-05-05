

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
                    <input type="text" id="nom" name="nom" class="form-control" value="{{old('nom')}}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{old('email')}}">
                </div>

                <div class="form-group">
                    <label for="password">Mot de passe</label>
                    <input type="password" name="password" id="password" class="form-control" >
                </div>

                <div class="form-group">
                    <label for="password_confirmation">Confirmation du mot de passe</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" >
                </div>


                    <button class="btn btn-primary" type="submit">Envoyer</button>
            </form>

        </div>
    </div>

@stop


