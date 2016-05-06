<?php
namespace App\Commandes;
use App\Commandes\Commande;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Ecom;


class DestroyEcomCommande extends Commande implements SelfHandling{

        public $id;




    //Crée une nouvelle instance de commande
    public function __construct($id)
    {
        $this->id=$id;
    }

    public function handle()
    {
        return Ecom::where('id',$this->id)->delete();
    }

}







?>