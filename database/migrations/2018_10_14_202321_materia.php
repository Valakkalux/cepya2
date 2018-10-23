<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Materia extends Migration
{

    public function up()
    {
    Schema::create('materias',function (Blueprint $table){
            $table->increments('id_ma');
            $table->string('nombre',40);

            $table->integer('id_usu')->unsigned();
            $table->foreign('id_usu')->references('id_usu')->on('usuarios');

            $table->integer('id_gru')->unsigned();
            $table->foreign('id_gru')->references('id_gru')->on('grupos');
     
            $table->rememberToken();       
            $table->timestamps();
            
    });
    }

    public function down()
    {
        Schema::drop('materias');
    }
}
