<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AjouterCategorieidAEcomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ecom',function(Blueprint $table){
        $table->integer('categorie_id')->unsigned();
        $table->foreign('categorie_id')->references('id')->on('categories');
    });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ecom',function(Blueprint $table){
        $table->dropForeign('ecom_categorie_id_foreign');
    });
    }
}
