@extends('layouts.principal')


@section('titre','Edition')





@section('contenu')
    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Edition d'un produit</h3>
        </div>
        <div class="panel-body">
            {!! Form::open(array('action' => ['EcomController@update',$produit->id],'method'=>'put','enctype'=>'multipart/form-data')) !!}
            <div class="form-group">
                {{Form::label('titre', 'Titre')}}
                {{Form::text('titre',$value=$produit->titre,$attributes =['class'=>'form-control','name'=>'titre'])}}

            </div>
            <div class="form-group">
                {{Form::label('catergorie_id', 'Categorie')}}
                <select name="categorie_id" class="form-control" id="">
                    <option value="1">Ordinateur</option>
                </select>

            </div>
            <div class="form-group">
                {{Form::label('description', 'Description')}}
                {{Form::textarea('description',$value=$produit->description,$attributes =['class'=>'form-control','name'=>'description'])}}

            </div>
            <div class="form-group">
                {{Form::label('prix', 'Prix')}}
                {{Form::text('titre',$value=$produit->prix,$attributes =['class'=>'form-control','name'=>'prix'])}}

            </div>
            <div class="form-group">
                {{Form::label('etat', 'Etat')}}
                {{Form::select('etat',array(
                '0'=>'Choisir',
                'Nouveau'=>'Nouveau',
                'Comme neuf'=>'Comme neuf',
                'accasion'=>'accasion',
                'cassé'=>'cassé',
                'panne'=>'panne',
                ),$produit->etat,$attributes =['class'=>'form-control','name'=>'etat'])}}

            </div>
            <div class="form-group">
                {{Form::label('image', 'image')}}
                {{Form::file('image',$value=null,$attributes =['class'=>'btn btn-default','name'=>'prix'])}}

            </div>

            <H4>Informations vendeur</H4>
            <div class="form-group">
                {{Form::label('adresse', 'adresse')}}
                {{Form::text('adresse',$value=$value=$produit->adresse,$attributes =['class'=>'form-control','name'=>'adresse'])}}

            </div>
            <div class="form-group">
                {{Form::label('email', 'email')}}
                {{Form::text('email',$value=$value=$produit->email,$attributes =['class'=>'form-control','name'=>'email'])}}

            </div>

            <div class="form-group">
                {{Form::label('tel', 'tel')}}
                {{Form::text('tel',$value=$value=$produit->tel,$attributes =['class'=>'form-control','name'=>'tel'])}}

            </div>
            {{Form::submit('Envoyer',$attributes=['class'=>'btn btn-primary'])}}

            {!! Form::close() !!}
        </div>
    </div>
@stop


