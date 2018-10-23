<?php

//use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Alumnos extends Migration
{

    public function up()
    {
    Schema::create('alumnos',function (Blueprint $table){
            $table->increments('id_a');
            $table->string('nombre',40);
            $table->string('ap_a',40);
            $table->string('ap_m',40);
            //llaves foràneas
            $table->integer('id_usu')->unsigned();
            $table->foreign('id_usu')->references('id_usu')->on('usuarios');

            $table->integer('id_n')->unsigned();
            $table->foreign('id_n')->references('id_n')->on('niveles');

            $table->integer('id_gru')->unsigned();
            $table->foreign('id_gru')->references('id_gru')->on('grupos');

            $table->integer('id_gra')->unsigned();
            $table->foreign('id_gra')->references('id_gra')->on('grados');

            $table->integer('id_ma')->unsigned();
            $table->foreign('id_ma')->references('id_ma')->on('materias');

            //$table->integer('id_cal')->unsigned();
            //$table->foreign('id_cal')->references('id_cal')->on('calificaciones');

            $table->integer('id_ciclo')->unsigned();
            $table->foreign('id_ciclo')->references('id_ciclo')->on('ciclosescolares');
            $table->rememberToken();
            $table->timestamps();
        });       
    }


    public function down()
    {
        Schema::drop('alumnos');
    }
}
