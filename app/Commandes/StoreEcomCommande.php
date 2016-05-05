<?php
namespace App\Commandes;
use App\Commandes\Commande;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Ecom;


class StoreEcomCommande extends Commande implements SelfHandling{

        public $titre;
        public $categorie_id;
        public $description;
        public $prix;
        public $etat;
        public $image;
        public $adresse;
        public $email;
        public $tel;
        public $utilisateur_id;




    //Crée une nouvelle instance de commande
    public function __construct($titre,$categorie_id,$description,$prix,$etat,$image,$adresse,$email,$tel,$utilisateur_id)
    {
        $this->titre=$titre;
        $this->categorie_id=$categorie_id;
        $this->description=$description;
        $this->prix=$prix;
        $this->etat=$etat;
        $this->image=$image;
        $this->adresse=$adresse;
        $this->email=$email;
        $this->tel=$tel;
        $this->utilisateur_id=$utilisateur_id;
    }

    public function handle()
    {
        return Ecom::create([
         'titre'=>$this->titre,
         'categorie_id'=>$this->categorie_id,
         'description'=>$this->description,
         'prix'=>$this->prix,
         'etat'=>$this->etat,
         'image'=>$this->image,
         'adresse'=>$this->adresse,
         'email'=>$this->email,
         'tel'=>$this->tel,
         'utilisateur_id'=>$this->utilisateur_id
        ]);
    }

}







?>