<?php

namespace App\Http\Controllers;

use App\Http\Requests\EnregistrementEcomRequest;
use App\Commandes\StoreEcomCommande;

use App\Http\Requests\MiseAjourEcomRequest;
use App\Commandes\UpdateEcomCommande;

use App\Commandes\DestroyEcomCommande;


use Illuminate\Http\Request;


use App\Http\Requests;
use App\Ecom;
use App\Commandes;
use Auth;

class EcomController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('auth',['except'=>['index','show','search']]);

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ecom= Ecom::all();
        //return view('index',['ecom'=>$ecom]);
        return view('index',compact('ecom'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creation');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EnregistrementEcomRequest $request)
    {
        $titre= $request->input('titre');
        $categorie_id= $request->input('categorie_id');
        $description= $request->input('description');
        $prix= $request->input('prix');
        $etat= $request->input('etat');
        $image= $request->file('image');
        $adresse= $request->input('adresse');
        $email= $request->input('email');
        $tel= $request->input('tel');
        //$proprietaire_id= Auth::user()->id;
        $proprietaire_id=Auth::user()->id;

        // Verifier si l'image a été uploadée

        if ($image){
            // On doit d'abord recup le nom du fichier et l'envoyer en bdd
            // et Prendre l'image uploadée et la placer dans un dossier

            //Recupere le nom de fichier
            $image_nom_du_fichier =$image->getClientOriginalName();
            //Si un fichier a ete envoyé on move -- dans bootstrap/app.php on bind un basepath
            $image->move(public_path('images'),$image_nom_du_fichier);
        }else{
            $image_nom_du_fichier='pas_image.jpg';
        }

        //Commande de création


        $commande = new StoreEcomCommande($titre,$categorie_id,$description,$prix,$etat,$image_nom_du_fichier,$adresse,$email,$tel,$proprietaire_id);
        $this->dispatch($commande);

        return redirect(route('ecom.index'))->with('message','Liste cree');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $produit=Ecom::find($id);
        return view('voir',compact('produit'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $produit = Ecom::find($id);
        return view('editer',compact('produit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MiseAjourEcomRequest $request, $id)
    {
        $titre= $request->input('titre');
        $categorie_id= $request->input('categorie_id');
        $description= $request->input('description');
        $prix= $request->input('prix');
        $etat= $request->input('etat');
        $image= $request->file('image');
        $adresse= $request->input('adresse');
        $email= $request->input('email');
        $tel= $request->input('tel');
        //$proprietaire_id= Auth::user()->id;

        //Il faut savoir le nom actuel de l'image en BDD
        $NomDuFichierImageCourant= Ecom::find($id)->image;


        // Verifier si l'image a été uploadée
        if ($image){
            // On doit d'abord recup le nom du fichier et l'envoyer en bdd
            // et Prendre l'image uploadée et la placer dans un dossier

            //Recupere le nom de fichier
            $image_nom_du_fichier =$image->getClientOriginalName();
            //Si un fichier a ete envoyé on move -- dans bootstrap/app.php on bind un basepath
            $image->move(public_path('images'),$image_nom_du_fichier);
        }else{
            $image_nom_du_fichier=$NomDuFichierImageCourant;
        }

        //Commande de mise à jour
        $commande = new UpdateEcomCommande($id,$titre,$categorie_id,$description,$prix,$etat,$image_nom_du_fichier,$adresse,$email,$tel);
        $this->dispatch($commande);

        return redirect(route('ecom.index'))->with('message','Produit mis à jour');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $commande = new DestroyEcomCommande($id);
            $this->dispatch($commande);
        return redirect(route('ecom.index'))->with('message','Produit supprimé');

    }
}
