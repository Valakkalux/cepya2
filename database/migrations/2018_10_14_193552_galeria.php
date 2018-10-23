<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Galeria extends Migration
{
    
    public function up()
    {
    Schema::create('galerias',function (Blueprint $table){
            $table->increments('id_g');
            $table->string('nombre',50);
            $table->string('ruta',50);
            $table->string('descripcion',50);
            $table->rememberToken();
            $table->timestamps();
    }); 
    }

    
    public function down()
    {
    Schema::drop('galerias');
    }
}
