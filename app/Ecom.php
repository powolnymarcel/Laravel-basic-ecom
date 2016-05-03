<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ecom extends Model
{
    protected $table ='ecom';
    protected $fillable=['titre','categorie_id','description','prix','image','etat','adresse','email','tel'];
    protected $hidden=[];

    public function categorie(){
        return $this->belongsTo('App\Categorie');
    }








}
