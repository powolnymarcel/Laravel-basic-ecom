<?php

namespace App\Http\Controllers;

use App\Commandes\StoreEcomCommande;
use Illuminate\Http\Request;

use App\Http\Requests\EnregistrementEcomRequest;

use App\Http\Requests;
use App\Ecom;
use App\Commandes;
class EcomController extends Controller
{
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
        //$utilisateur_id= Auth::user()->id;
        $utilisateur_id= 1;

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


        $commande = new StoreEcomCommande($titre,$categorie_id,$description,$prix,$etat,$image_nom_du_fichier,$adresse,$email,$tel,$utilisateur_id);
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
        return view('editer');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
