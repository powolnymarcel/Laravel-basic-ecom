<?php

namespace App\Http\Requests;
use App\Http\Requests\Request;

class MiseAjourEcomRequest extends Request
{
    //determine si l'user peut faire la requete, ici tout le monde
    public function authorize(){
        return true;
    }

    public function rules()
    {

        return [
            'titre'=>'required',
            'categorie_id'=>'required',
            'prix'=>'required',
            'email'=>'required'
        ];
    }






}



?>