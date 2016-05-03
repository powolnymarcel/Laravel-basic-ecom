<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    protected $table ='categories';
    protected $fillable=['nom'];
    protected $hidden=[];

    public function ecom(){
        return $this->hasMany('App\Ecom');
    }
}
