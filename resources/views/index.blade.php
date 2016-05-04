@extends('layouts.principal')


@section('titre','Accueil')





@section('contenu')


    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">Liste de tous les produits</h3>
        </div>
        <div class="panel-body">
            @foreach($ecom as  $produit)
            <div class="col-md-4"><img src="images/{{$produit->image}}" alt="" class="img-responsive">
            <h4><a href="ecom/{{$produit->id}}">{{$produit->titre}}</a></h4>
             <p>{{$produit->description}}</p>
            </div>
            @endforeach

        </div>
    </div>
    @stop


