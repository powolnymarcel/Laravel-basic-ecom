@extends('layouts.principal')


@section('titre','Voir')





@section('contenu')

    <div class="panel panel-default">
        <div class="panel-heading">
            <h3 class="panel-title">{{$produit->titre}}</h3>
        </div>
        <div class="panel-body">
            <div class="col-md-4">
                <img src="../images/{{$produit->image}}" alt="" class="img-responsive">
            </div>
            <div class="col-md-8">
                <h4>Description: </h4>
                <p>{{$produit->description}}</p>
                <h4>Details:</h4>
                <ul class="list-group">
                    <li class="list-group-item">
                        Etat du produit: <strong>{{$produit->prix}}</strong>
                        Prix: <strong>{{$produit->etat}}</strong>
                    </li>
                </ul>
                <h4>Vendeur: </h4>
                <ul class="list-group">
                    <li class="list-group-item">
                       Adresse: <strong>{{$produit->adresse}}</strong>
                        Contact: <strong>{{$produit->email}}</strong>
                        Contact: <strong>{{$produit->tel}}</strong>
                    </li>
                </ul>
            </div>

            <div class="pull-right ecomControle">
                <a href="{{url('ecom/'.$produit->id.'/edit')}}" class="btn btn-default">Editer</a>
            </div>
        </div>
    </div>
@stop


