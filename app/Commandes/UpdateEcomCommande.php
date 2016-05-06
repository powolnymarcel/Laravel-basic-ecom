<?php
namespace App\Commandes;
use App\Commandes\Commande;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Ecom;


class UpdateEcomCommande extends Commande implements SelfHandling{

        public $id;
        public $categorie_id;
        public $description;
        public $prix;
        public $etat;
        public $image;
        public $adresse;
        public $email;
        public $tel;




    //Crée une nouvelle instance de commande
    public function __construct($id,$titre,$categorie_id,$description,$prix,$etat,$image,$adresse,$email,$tel)
    {
        $this->id=$id;
        $this->titre=$titre;
        $this->categorie_id=$categorie_id;
        $this->description=$description;
        $this->prix=$prix;
        $this->etat=$etat;
        $this->image=$image;
        $this->adresse=$adresse;
        $this->email=$email;
        $this->tel=$tel;
    }

    public function handle()
    {
        return Ecom::where('id',$this->id)->update(array(

                'titre'=>$this->titre,
                'categorie_id'=>$this->categorie_id,
                'description'=>$this->description,
                'prix'=>$this->prix,
                'etat'=>$this->etat,
                'image'=>$this->image,
                'adresse'=>$this->adresse,
                'email'=>$this->email,
                'tel'=>$this->tel
        ));
    }

}







?>