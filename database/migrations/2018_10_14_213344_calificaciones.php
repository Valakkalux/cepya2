<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Calificaciones extends Migration
{

    public function up()
    {
    Schema::create('calificaciones',function (Blueprint $table){
            $table->increments('id_cal');
            $table->string('calificacion',40);

            $table->integer('id_ma')->unsigned();
            $table->foreign('id_ma')->references('id_ma')->on('materias');

            $table->integer('id_a')->unsigned();
            $table->foreign('id_a')->references('id_a')->on('alumnos');
     
            $table->string('estatus',40);
            $table->rememberToken();
            $table->timestamps();
            
    });          
    }


    public function down()
    {
    Schema::drop('calificaciones'); 
    }
}
